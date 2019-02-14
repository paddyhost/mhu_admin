<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    public $session_data;

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('export');
    }
    
    public function export_csv(){
        $table = $this->input->post('table');
        $phase = $this->input->post('phase');
        $data = ['table'=>$table, 'phase'=>$phase];
//        print_r($data); die();
        
        if($table == 'patient'){
            $this->download_patient($data);
        }else {
            $this->download_camp_patient($data);
        }
    }
    
    public function download_patient($data = []) {
        
        extract($data);
        //$phase = 1;
        $filename = 'Patient_report_'.date('YmdH_i_s').'.csv'; 
              
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Content-Control: no-store, no-cache, must-revalidate');
        header('Content-Control: post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Expires:0');
        
        $handle = fopen('php://output','w');
        
        fputcsv($handle,
            //['Sr.no', 'date', 'Name', 'DOB', 'age', 'gender', 'category', 'mobile', 'city', 'area', 'district', 'state', 'location']
            [
                'Sr.no', 'Registration Date', 'Patient Name', 'dob', 'Age', 'Gender', 'Patient Category', 'Conatct no.', 'Area', 'City', 'District', 'State', 'Location',
                'Chief Complaint 1', 'Chief Complaint 2', 'Diagnosis', 'Disease Diagnosed' ,'Previous Investigations', 'Previous Treatment', 'Brief History 1','Brief History 2',
                //prescribe dose & vaccination remains
                'DPT', 'BCG', 'MEASLES', 'OPV', 'Hepatitis', 'TT', 'Others',
            ]
        );
        
        $this->db->select('patient_master.id, regitrationdate, fname, dob, age, gender, patient_category, mobile, area, city, district, state, location, '
                . 'chiefcomplaints1, chiefcomplaints2, diagnosys, disease, investigation, tratementtaken, briefHistory1, briefHistory2,'
                . 'dpt, bcg, measles, opv, hepatitis, ttt, other'
                . '');
        
        $this->db->join('visit_master', 'visit_master.patient_master_id = patient_master.id', 'right');
        $this->db->join('medicalconditionmaster as m','m.visit_master_id = visit_master.id','left');
        $this->db->join('vaccinationmaster as v','v.visit_master_id = visit_master.id','left');
        
//        $this->db->limit(100);
        $records = $this->db->get_where('patient_master', ['phase'=>$phase])->result_array();
        
        //print_r($records);
        
        $gender = ['M'=>'Male','F'=>'Female',''=>'Other'];
        $status = ['Y'=>'Yes','N'=>'No','DN'=>'Dont`t Know', ''=>'Dont`t Know'];
        $vacc = ['Y'=>'Yes','N'=>'No',''=>''];
        $cat = ['LW'=>'Lactating Woman','C'=>'Child Under 19 Years of age','S'=>'Senior Citizen above 60 years of age',
            'O'=>'Others', 'PW'=>'Pregnant Woman'];
        
        if(!empty($records)){
            foreach ($records as $key => $value) {
//                $value['gender'] = $gender[$value['gender']];
//                $value['patient_category'] = $cat[$value['patient_category']];
//                $value['diagnosys'] = $status[$value['diagnosys']];
                $value['investigation'] = $status[$value['investigation']]; 
                $value['tratementtaken'] = $status[$value['tratementtaken']];
//                $value['dpt'] = $vacc[$value['dpt']];
//                $value['bcg'] = $vacc[$value['bcg']];
//                $value['measles'] = $vacc[$value['measles']];
//                $value['opv'] = $vacc[$value['opv']];
//                $value['hepatitis'] = $vacc[$value['hepatitis']];
//                $value['ttt'] = $vacc[$value['ttt']];
                fputcsv($handle, $value);
            }
            fclose($handle);
        }
    }
    
    public function download_camp_patient($data = []) {
        
        extract($data);
        
        $filename = 'Patient_report_'.date('YmdH_i_s').'.csv'; 
                
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Content-Control: no-store, no-cache, must-revalidate');
        header('Content-Control: post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Expires:0');
        
        $handle = fopen('php://output','w');
        
        fputcsv($handle,
            ['Sr.no', 'Registration Date', 'Patient Name', 'dob', 'Age', 'Gender', 'Patient Category', 'Conatct no.', 'Area', 'City', 'District', 'State', 'Location', 'Problem','Remarks']
        );
        
        $this->db->select('id, regitrationdate, fname, dob, age, gender, patient_category, mobile, city, area, district, state, location, problem, remarks');
        $records = $this->db->get_where('camp_patient_master', ['phase'=>$phase])->result_array();
            
        if(!empty($records)){
            foreach ($records as $key => $value) {
                fputcsv($handle, $value);
            }
            fclose($handle);
        }
    }
}

/*
 *sql for export 
SELECT     `patient_master`.`id`,     `regitrationdate`,     `fname`,     `dob`,     `age`,     `gender`,     `patient_category`,     `mobile`,     `area`,     `city`,     `district`,     `state`,     `location`,     `chiefcomplaints1`,     `chiefcomplaints2`,     `diagnosys`,     `disease`,     `investigation`,     `tratementtaken`,     `briefHistory1`,     `briefHistory2`,     `dpt`,     `bcg`,     `measles`,     `opv`,     `hepatitis`,     `ttt`,     `other`, 	COALESCE(`disease`,`d`.`name`) as specific FROM
`patient_master`
RIGHT JOIN `visit_master` ON `visit_master`.`patient_master_id` = `patient_master`.`id`
LEFT JOIN `medicalconditionmaster` AS `m` ON `m`.`visit_master_id` = `visit_master`.`id`
LEFT JOIN `diseases_master` AS `d` ON `d`.`id` = `m`.`disease_master_id`
LEFT JOIN `vaccinationmaster` AS `v` ON `v`.`visit_master_id` = `visit_master`.`id`
WHERE `visit_master`.`created_at` BETWEEN '2018-09-01 00:00:00.000000' AND '2018-12-12 00:00:00.000000'
 * 
 */
