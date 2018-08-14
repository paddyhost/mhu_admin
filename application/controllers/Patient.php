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

        if(!empty($unique_id)){
            $arrdata['unique_id'] = $unique_id;
        }

        $id = $this->patient_model->addPatient($arrdata);
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getPatient($id);
            
            $visit_arr = ['patient_master_id'=>$id, 'user_id'=> $this->session_data[0]->id];
            $this->db->insert('visit_master',$visit_arr);
            $result->visit_master_id = $this->db->insert_id();
            
            // $count = count($ridedetails);
            $code = 201; //created
            $data = $result;
            $message = 'Patient added successfully';
        } else {
            $code = '401';
            $message = 'Patient Not added';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
        
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
            'patient_id' => $this->input->get_post('patient_id'),
            'registrationid' => $this->input->get_post('registration_no'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );

        $id = $this->patient_model->addMedicalcondition($arrdata);
        
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getMedicalcondition($id);
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
    
    public function add_prescribe_dose() {
        $arrdata = array(
            'name' => $this->input->get_post('name'),
            'frequency' => $this->input->get_post('frequency'),
            'days' => $this->input->get_post('days'),
            'medicalconditionid' => $this->input->get_post('medicalconditionid'),
            'aftermeal' => $this->input->get_post('aftermeal'),
        );

        $id = $this->patient_model->addPriscribeDose($arrdata);
    }
    
    
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
}
