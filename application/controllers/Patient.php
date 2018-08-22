<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    public $session_data;

    public function __construct() {
        parent::__construct();
        $this->load->model('patient_model');
        $this->session_data = $this->session->userdata('user');       
    }
    
    public function postGeneralInfo() {
        // print_r($_POST); die();
        
        $dob = $this->input->post('dob'); 
        $dor = $this->input->post('dor'); 
        $unique_id = $this->input->post('unique_id'); 
        $arrdata = array(
            'fname' => $this->input->get_post('fname'),
            'lanme' => $this->input->get_post('lname'),
            'dob' => date('Y-m-d',  strtotime($dob)),
            'regitrationdate'=> date('Y-m-d',  strtotime($dor)),
            'gender' => $this->input->get_post('gender'),
            'mobile' => $this->input->get_post('mobile'),
            'address' => $this->input->get_post('address'),
            'state' => $this->input->get_post('state'),
            'district' => $this->input->get_post('district'),
            'city' => $this->input->get_post('city'),
            'area' => $this->input->get_post('area'),
            'location' => $this->input->get_post('location'),
            'patient_category' => $this->input->get_post('patient_category'),
            'created_by' => $this->session_data[0]->id,
        );

        $insert = $this->input->get_post('insert');
        if($insert){
//            if(!empty($unique_id)){
//                $arrdata['unique_id'] = $unique_id;
//            }

            $id = $this->patient_model->addPatient($arrdata);
        }else {
            $id = $this->input->get_post('pid');
            $registration_no = $this->input->get_post('registration_no');
            if (!empty($id) && !empty($registration_no)) {
                $this->db->update('patient_master', $arrdata, ['id' => $id, 'registration_no' => $registration_no]);
            }
        }
        
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getPatient($id);
            $phase = $this->input->get_post('phase');
            $visit_arr = ['patient_master_id'=>$id, 'user_id'=> $this->session_data[0]->id, 'phase'=>$phase];
            $this->db->insert('visit_master',$visit_arr);
            $result->visit_master_id = $this->db->insert_id();
            
            // $count = count($ridedetails);
            $code = 201; //created
            $data = $result;
            $message = ($insert == 1?'Patient added successfully':'Patient updated');
        } else {
            $code = '401';
            $message = 'Patient Not added';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
        
    }
    
    public function addVisit($pid) {
        $visit_arr = ['patient_master_id'=>$pid, 'user_id'=> $this->session_data[0]->id];
        $this->db->insert('visit_master',$visit_arr);
        
        $result = FALSE;
        if($this->db->insert_id() > 0){
            $result = $this->db->insert_id();
        }
        return $result;
    }
    
    public function postVitalInfo() {

        $arrdata = array(
            'pid' => $this->input->get_post('pid'),
            'registrationno' => $this->input->get_post('registration_no'),
            'height' => $this->input->get_post('height'),
            'weight' => $this->input->get_post('weight'),
            'bpto' => $this->input->get_post('bpto'),
            'bloodpresure' => $this->input->get_post('bloodpresure'),
            'tempreture' => $this->input->get_post('tempreture'),
            'respiration' => $this->input->get_post('respiration'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );
        
        $id = $this->patient_model->addVital($arrdata);
        
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getVital($id);
            // $count = count($ridedetails);
            $code = 201; //created
            $data = $result;
            $message = 'Vital Info added successfully';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }
    
    public function postMedical() {
        extract($_POST);
        $arrdata = array(
            'chiefcomplaints1' => $this->input->get_post('chiefcomplaints1'),
            'chiefcomplaints2' => $this->input->get_post('chiefcomplaints2'),
            'chiefcomplaints3' => $this->input->get_post('chiefcomplaints3'),
            'briefHistory1' => $this->input->get_post('briefHistory1'),
            'briefHistory2' => $this->input->get_post('briefHistory2'),
            'briefHistory3' => $this->input->get_post('briefHistory3'),
            'investigation' => $this->input->get_post('investigation'),
            'tratementtaken' => $this->input->get_post('tratementtaken'),
            'anyimprovement' => $this->input->get_post('anyimprovement'),
            'diagnosys' => $this->input->get_post('diagnosys'),
            'patient_id' => $this->input->get_post('pid'),
            'registrationid' => $this->input->get_post('registration_no'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );
//        print_r($arrdata);
//        $medicalconditionid = 1;
        $medicalconditionid = $this->patient_model->addMedicalcondition($arrdata);
        
        foreach ($id as $iterator => $medicine_id) {
            $prescribe_dose[] = array(
                'name'=>$name[$iterator],
                'medicine_id'=>$medicine_id,
                'frequency'=>$frequency[$iterator],
                'days'=>$days[$iterator],
                'aftermeal'=>$aftermeal[$iterator],
                'medicalconditionid'=>$medicalconditionid
                );
        }
        
        $data = array();
        if ($medicalconditionid > 0) {
            if(!empty($prescribe_dose)){
                $this->db->insert_batch('priscribedose',$prescribe_dose);
            }
            
            $result = $this->patient_model->getMedicalcondition($medicalconditionid);
            // $count = count($ridedetails);
            $code = 201; //created
            $data = $result;
            $message = 'Medical data added successfully';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }
    
//    public function add_prescribe_dose() {
//        $arrdata = array(
//            'name' => $this->input->get_post('name'),
//            'frequency' => $this->input->get_post('frequency'),
//            'days' => $this->input->get_post('days'),
//            'medicalconditionid' => $this->input->get_post('medicalconditionid'),
//            'aftermeal' => $this->input->get_post('aftermeal'),
//        );
//
//        $id = $this->patient_model->addPriscribeDose($arrdata);
//    }
    
    
    public function add_prescribe_struct() {
        extract($_POST);
        $medicine = explode('_', $name);
        $tr['data'] = array('id'=>$medicine[0],
                'name'=>$medicine[1],
                'days'=>$days,
                'frequency'=>$frequency,
                'aftermeal'=>$aftermeal,
            );
        $tr['frequency'] = [1=>'Once a day', 2=>'Twice a day',3=>'Thrice a day',4=>'Four times a day'];
        $tr['aftermeal'] = ['Yes'=>'After meal', 'No'=>'Before meal'];
        $view = $this->load->view('tr_prescribe_dose', $tr, TRUE);
        
        $response = ['code'=>200, 'data'=>$view];
        echo json_encode($response);
        
    }
    
    public function postVaccination() {
        extract($_POST);
        $vaccination_arr = array_keys($vaccination);
        
        $arrdata = array(
            'other' => $this->input->get_post('other'),
            'patient_id' => $this->input->get_post('pid'),
            'registration_no' => $this->input->get_post('registration_no'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );
        
        foreach ($vaccination as  $value) {
            $arrdata[$value] = 'Y';
        }

        $id = $this->patient_model->addvaccination($arrdata);
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getvaccination($id);
            $code = 201; //created
            $data = $result;
            $message = 'Vaccination added successfully';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }
    
    public function postTest() {
        extract($_POST);
        $map_test_attr = [];
        foreach ($test as $test_id => $attributes) {
            foreach ($attributes as $attr_key => $attr_val) {
                $map_test_attr[] = array(
                    'test_master_id'=>$test_id,
                    'map_test_attribute_id'=>$attr_key,
                    'reading'=>(!(empty($attr_val)) ? $attr_val : NULL),
                    'patient_id'=>$pid,
                    'registeration_id'=>$registration_no,
                    'visit_master_id'=>$visit_master_id,                    
                );
            }
        }
        
        $affected_row = 0;
        if(!empty($map_test_attr)){
            $this->db->insert_batch('map_test_attribute_values', $map_test_attr);
            $affected_row = $this->db->affected_rows();
        }
        
        $data = array();
        if ($affected_row > 1) {
            $result = $test;
            $code = 201; //created
            $data = $result;
            $message = 'Tests added successfully';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
        
    }
    
    public function postTestAdvice() {
        extract($_POST);
        
        $data_insert = array(
            'test_name'=>$test_name,
            'referred'=>$referred,
            'remarks'=> $remarks,
            'patient_id'=>$pid,
            'registration_id'=>$registration_no,
            'visit_master_id'=>$visit_master_id,               
        );

        $id = 0;
        if(!empty($data_insert)){
            $this->db->insert('test_advice', $data_insert);
            $id = $this->db->insert_id();
        }
        
        $data = array();
        if ($id > 0) {
            $result = $data_insert;
            $code = 201; //created
            $data = $result;
            $message = 'Tests advice added successfully';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
        
    }
    
    public function getPatientInfo() {
        $unique_id = $this->input->get_post('unique_id');
        if(strlen($unique_id) <= 6){
            $unique_id = str_pad($unique_id, 6, 0, STR_PAD_LEFT);
        }
        $isPatientExist = array();
        $patient_query = $this->db->get_where('patient_master',['unique_id'=>$unique_id]); 

        if($patient_query->num_rows()>=1){
            $isPatientExist = $patient_query->first_row();
            
            $isPatientExist->dob = date('d-m-Y', strtotime($isPatientExist->dob));
            $isPatientExist->regitrationdate = date('d-m-Y', strtotime($isPatientExist->regitrationdate));
        }

        if(!empty($isPatientExist)){
            $code = 200;
            $message = 'Patient Ino found';
        }else {
            $code = 401;
            $message = 'Patient Info not found ';
        }

        $data = $isPatientExist;
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }
}
