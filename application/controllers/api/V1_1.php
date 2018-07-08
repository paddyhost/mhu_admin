<?php

class V1_1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('user_model');
        $this->load->model('patient_model');


        // Your own constructor code
    }

    public function index() {
        $data = array();
        $this->load->view('webservices/clientindex_v1_1', $data);
    }

    public function login() {
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');
        if ($data['key'] == TRUE) {
            $result = $this->user_model->isUserExist($mobile, $password);

            if (count($result) > 0) {
                $status = 'Success';
                $type = 'login';
                $message = 'Login successfully';
                $count = count($result);
            } else {
                $status = 'failed';
                $type = 'login';
                $message = 'client Not exist';
                $count = count($result);
            }
        } else {
            $status = 'failed';
            $type = 'login';
            $message = 'Invalid Api Key';
            $count = 0;
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addPatient() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');

        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            $unique_id = $this->input->get_post('unique_id');
            if (count($client) == 1) {
                $arrdata = array(
                    // 'unique_id' => $this->input->get_post('unique_id'),
                    // 'registration_no' => $this->input->get_post('registration_no'),
                    'fname' => $this->input->get_post('fname'),
                    'lanme' => $this->input->get_post('lanme'),
                    'dob' => $this->input->get_post('dob'),
                    'gender' => $this->input->get_post('gender'),
                    'mobile' => $this->input->get_post('pmobile'),
                    'address' => $this->input->get_post('address'),
                    'state' => $this->input->get_post('state'),
                    'district' => $this->input->get_post('district'),
                    'city' => $this->input->get_post('city'),
                    'area' => $this->input->get_post('area'),
                    'location' => $this->input->get_post('location'),
                    'patient_category' => $this->input->get_post('patient_category'),
                    'created_by' => $this->input->get_post('created_by'),
                    
                );

                if(!empty($unique_id)){
                    $arrdata['unique_id'] = $unique_id;
                }

                $id = $this->patient_model->addPatient($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getPatient($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'Patient added successfully';
                } else {
                    $status = 'failed';
                    $message = 'Patient Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'getPatient';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addVital() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');

        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
                $arrdata = array(
                    'pid' => $this->input->get_post('pid'),
                    'registrationno' => $this->input->get_post('registrationno'),
                    'height' => $this->input->get_post('height'),
                    'weight' => $this->input->get_post('weight'),
                    'bpto' => $this->input->get_post('bpto'),
                    'bloodpresure' => $this->input->get_post('bloodpresure'),
                    'tempreture' => $this->input->get_post('tempreture'),
                    'respiration' => $this->input->get_post('respiration'),
                    'visit_master_id' => $this->input->get_post('visit_master_id'),
                );

                $id = $this->patient_model->addVital($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getVital($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'Vital added successfully';
                } else {
                    $status = 'failed';
                    $message = 'Vital Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'addVital';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addMedicalcondition() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');



        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
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
                    'registrationid' => $this->input->get_post('registrationid'),
                    'visit_master_id' => $this->input->get_post('visit_master_id'),
                );

                $id = $this->patient_model->addMedicalcondition($arrdata);
                if ($id > 0) {

                    $ridedetails = $this->patient_model->getMedicalcondition($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'Medicalcondition added successfully';
                } else {
                    $status = 'failed';
                    $message = 'Medicalcondition Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'addMedicalcondition';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addvaccination() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');



        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
                $arrdata = array(
                    'dpt' => $this->input->get_post('dpt'),
                    'bcg' => $this->input->get_post('bcg'),
                    'measles' => $this->input->get_post('measles'),
                    'opv' => $this->input->get_post('opv'),
                    'ttt' => $this->input->get_post('ttt'),
                    'hepatitis' => $this->input->get_post('hepatitis'),
                    'other' => $this->input->get_post('other'),
                    'patient_id' => $this->input->get_post('patient_id'),
                    'registration_no' => $this->input->get_post('registration_no'),
                    'visit_master_id' => $this->input->get_post('visit_master_id'),
                );

                $id = $this->patient_model->addvaccination($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getvaccination($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'vaccinationmaster added successfully';
                } else {
                    $status = 'failed';
                    $message = 'vaccinationmaster Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'vaccinationmaster';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addPatientHistory() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');



        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
                $arrdata = array(
                    'patient_id' => $this->input->get_post('patient_id'),
                    'registrationno' => $this->input->get_post('registrationno'),
                    'drname1' => $this->input->get_post('drname1'),
                    'drname2' => $this->input->get_post('drname2'),
                    'drname3' => $this->input->get_post('drname3'),
                    'hospitalname' => $this->input->get_post('hospitalname'),
                    'visit_master_id' => $this->input->get_post('visit_master_id'),
                );




                $id = $this->patient_model->addPatientHistory($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getPatientHistory($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'PatientHistory added successfully';
                } else {
                    $status = 'failed';
                    $message = 'PatientHistory Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'addPatientHistory';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addMHUTest() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');



        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
                $arrdata = array(
                    'bloodglucose' => $this->input->get_post('bloodglucose'),
                    'heamogram' => $this->input->get_post('heamogram'),
                    'creatine' => $this->input->get_post('creatine'),
                    'urea' => $this->input->get_post('urea'),
                    'sgot' => $this->input->get_post('sgot'),
                    'sgpt' => $this->input->get_post('sgpt'),
                    'adviced' => $this->input->get_post('adviced'),
                    'ferered' => $this->input->get_post('ferered'),
                    'remark' => $this->input->get_post('remark'),
                    'visit_master_id'=>$this->input->get_post('visit_master_id'),
                                    );




                $id = $this->patient_model->addMHUTest($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getMHUTest($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'MHUTest added successfully';
                } else {
                    $status = 'failed';
                    $message = 'MHUTest Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'addMHUTest';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }

    public function addPriscribeDose() {

        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $mobile = $this->input->get_post('mobile');
        $password = $this->input->get_post('password');



        if ($data['key'] == TRUE) {
            // $password = random_string('alnum', 8);
            $client = $this->user_model->isUserExist($mobile, $password);
            if (count($client) == 1) {
                $arrdata = array(
                    'name' => $this->input->get_post('name'),
                    'frequency' => $this->input->get_post('frequency'),
                    'days' => $this->input->get_post('days'),
                    'medicalconditionid' => $this->input->get_post('medicalconditionid'),
                    'time' => $this->input->get_post('time'),
                );


                $id = $this->patient_model->addPriscribeDose($arrdata);
                if ($id > 0) {
                    $ridedetails = $this->patient_model->getPriscribeDose($id);
                    $count = count($ridedetails);
                    $status = 'success';
                    $result = $ridedetails;
                    $message = 'PriscribeDose added successfully';
                } else {
                    $status = 'failed';
                    $message = 'PriscribeDose Not added';
                }
            } else {

                $count = 0;
                $status = 'error';
                //        $result = [];
                $message = 'autontication failed';
            }

            $type = 'addPriscribeDose';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }
    
    public function gettestmasterattribute($all = ''){
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        $all = $this->input->get_post('all');
        if($data['key']){
            $query = $this->db->get('test_master');
            $testResult = $query->result();
            if($all == 'Y'){
                foreach ($testResult as $key => $value) {
                    $this->db->select('id,attribute_name');
                    $attrResult = $this->db->get_where('map_test_attribute', array('test_master_id'=>$value->id));
                    $testResult[$key]->attributes = array();
                    if($attrResult->num_rows()>=1){
                        $testResult[$key]->attributes = $attrResult->result();
                    }
                }
            }
            $count = count($testResult);
            $type = $status = 'success';
            $message = 'RECORDS_FOUND';
            $result = $testResult;
            
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
    }
    
    public function addPatientVisit(){
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        
        if($data['key']){
            $unique_id = $this->input->get_post('unique_id');
            $user_id = $this->input->get_post('user_id');
            $isPatientExist = array();
            $patient_query = $this->db->get_where('patient_master',['unique_id'=>$unique_id]);      
            if($patient_query->num_rows()>=1){
                $isPatientExist = $patient_query->first_row();
            }
            
            if(!empty($isPatientExist)){
                $visit_arr = ['patient_master_id'=>$isPatientExist->id, 'user_id'=>$user_id];
                $this->db->insert('visit_master',$visit_arr);
                if($this->db->insert_id() >=1 ){
                    $isPatientExist->visit_id = $this->db->insert_id();
                    $message = 'VISIT_GENERATED';
                }else {
                    $message = 'VISIT_NOT_GENERATED';
                }
                $status = 'success';
            }else {
                $status = 'failure';
            }
            $result = $isPatientExist;
            $count = count((array) $isPatientExist);
            $type = 'addPatientVisit';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_singlerecord', $data);
        
    }
    
    public function isPatientExists(){
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        if($data['key']){
            $unique_id = $this->input->get_post('unique_id');
            $isPatientExist = array();
            $patient_query = $this->db->get_where('patient_master',['unique_id'=>$unique_id]);      
            
            if($patient_query->num_rows()>=1){
                $isPatientExist = $patient_query->first_row();
            }
            
            if(!empty($isPatientExist)){
                $message = 'PATIENT_EXISTS';
            }else {
                $message = 'PATIENT_NOT_EXISTS';
            }
            $status = 'success';
            $result = $isPatientExist;
            $count = count( (array)$isPatientExist );
            $type = 'isPatientExists';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_singlerecord', $data);
        
    }

    public function addTestAttributeValues(){
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        if($data['key']){
            $patient_id = $this->input->get_post('patient_id');
            $registeration_id = $this->input->get_post('registeration_id');
            $visit_master_id = $this->input->get_post('visit_master_id');
            $post_data = $this->input->get_post('testobj');
            // $post_data = '[{"1":[{"map_test_attribute_id":"1","reference_value":"abc","reading":"123"},{"map_test_attribute_id":"2","reference_value":"Hb ","reading":"1"}]},{"2":[{"map_test_attribute_id":"11","reference_value":"abc","reading":"123"},{"map_test_attribute_id":"12","reference_value":"Hb ","reading":"1"}]}]';
            $post_data = json_decode($post_data);
                       
           $temp_arr = array('patient_id'=>$patient_id, 'registeration_id'=>$registeration_id, 'visit_master_id'=>$visit_master_id);
//            print_r($temp_arr); die();
            $temp_post_arr = array();
            if(!empty($post_data)){
                
                foreach ($post_data as $key => $test_attr) {
                    $key_arr = array_keys((array)$test_attr);
                    $test_id = $key_arr[0];
                    $temp_arr = array_merge($temp_arr, array('test_master_id' => $test_id));              
                    foreach ($test_attr as $attr_key => $attr_value) {
                        foreach ($attr_value as $tkey=>$tvalue){
                            $temp_post_arr[] = (object) array_merge((array) $tvalue , $temp_arr);
                        }
                    }
                }
//                var_dump(json_encode($temp_post_arr)); die();
                $this->db->insert_batch('map_test_attribute_values',  $temp_post_arr);
                if($this->db->affected_rows() == count($temp_post_arr) ){
                    $message = 'VALUES_ADDED';
                }else {
                    $message = 'FAILED_TO_ADD_VALUES';
                }
                $status = 'success';
            }else {
                $status = 'failure';
            }
            $result = $temp_post_arr;
            $count = count($temp_post_arr);
            $type = 'addTestAttributeValues';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_newclient', $data);
        
    }
    
    public function getSinglePatientRecord(){
        
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        if($data['key']){
            $visit_master_id = $this->input->get_post('visit_master_id');
            $patient_record = array();
            
           // $sql = "SELECT p.*, v.id as visit_master_id, v.created_at FROM visit_master v, patient_master p where v.id =".$visit_master_id;
            $sql = "SELECT p . * , v.id AS visit_master_id, v.created_at FROM visit_master v LEFT JOIN patient_master p ON ( patient_master_id = p.id ) WHERE v.id =".$visit_master_id;
            
            $query = $this->db->query($sql);
            if($query->num_rows()>=1){
                $patient_record = $query->row_array();
                
                $patient_record['vital'] = $this->patient_model->getOneByTable('vital_master', ['visit_master_id'=>$visit_master_id]);
                $patient_record['medical'] = $this->patient_model->getOneByTable('medicalconditionmaster', ['visit_master_id'=>$visit_master_id]);
                if(!empty($patient_record['medical'])){
                    $id = $patient_record['medical']->id;
                    $dose = $this->patient_model-> getManyByTable('priscribedose', ['medicalconditionid'=> $id]);
                    $patient_record['medical']->prescribe_dose = $dose;
                }
                $patient_record['vaccination'] = $this->patient_model->getOneByTable('vaccinationmaster', ['visit_master_id'=>$visit_master_id]);
              $patient_record['mhutestmaster'] = $this->patient_model->getOneByTable('mhutestmaster', ['visit_master_id'=>$visit_master_id]);
              $patient_record['patient_history'] = $this->patient_model->getOneByTable('patient_history', ['visit_master_id'=>$visit_master_id]);
                $patient_record['test'] = $this->patient_model->gettestvalues($visit_master_id);
                $result = $patient_record;
                
            }
            
            $count = 1;
            $result = (object)$result;
            $status = $message = 'success';
            $type = 'getSinglePatientRecord';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_singlerecord', $data);
    }
    
     public function getVisitPatientRecord(){
        
        $data = $result = array();
        $status = $type = $message = '';
        $count = 0;
        // $data['key'] = $this->isValidKey($this->input->get_post('key'));
        $data['key'] = TRUE;
        $data['format'] = $this->input->get_post('format');
        if($data['key']){
            $visit_master_id = $this->input->get_post('uid');
            $patient_record = array();
            
           // $sql = "SELECT p.*, v.id as visit_master_id, v.created_at FROM visit_master v, patient_master p where v.id =".$visit_master_id;
            $sql = "SELECT patient_master . * ,GROUP_CONCAT(visit_master.id,'') AS visitids
FROM patient_master LEFT JOIN visit_master ON ( patient_master_id = patient_master.id ) 
WHERE unique_id ='".$visit_master_id."'";
            
            $query = $this->db->query($sql);
            //echo $this->db->last_query();
            if($query->num_rows()>=1){
                $patient_record = $query->row_array();
                $result = $patient_record;
                
            }
            
            $count = 1;
            $result = (object)$result;
            $status = $message = 'success';
            $type = 'getVisitPatientRecord';
        } else {
            $status = $type = 'error';
            $message = 'Invalid key';
        }
        $data['status'] = $status;
        $data['count'] = $count;
        $data['type'] = $type;
        $data['result'] = $result;
        $data['message'] = $message;
        $this->load->view('webservices/webservice_singlerecord', $data);
    }

    

}