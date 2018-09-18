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
            ['Sr.no', 'date', 'Name', 'DOB', 'age', 'gender', 'category', 'mobile', 'city', 'area', 'district', 'state', 'location']
        );
        
        
        $this->db->select('patient_master.id, regitrationdate, fname, dob, age, gender, patient_category, mobile, city, area, district, state, location');
        $this->db->join('visit_master', 'visit_master.patient_master_id = patient_master.id', 'left');
        $records = $this->db->get_where('patient_master', ['phase'=>$phase])->result_array();
        
        //print_r($records);
            
        if(!empty($records)){
            foreach ($records as $key => $value) {
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
            ['Sr.no', 'date', 'Name', 'DOB', 'age', 'gender', 'category', 'mobile', 'city', 'area', 'district', 'state', 'location', 'problem','remarks']
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