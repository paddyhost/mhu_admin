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
        if(!empty($dob)){
            $dob = date('Y-m-d',  strtotime($dob));
        }
        $dor = $this->input->post('dor'); 
        $unique_id = $this->input->post('unique_id'); 
        $arrdata = array(
            'fname' => $this->input->get_post('fname'),
            'lanme' => $this->input->get_post('lname'),
            'dob' => $dob,
            'regitrationdate'=> date('Y-m-d',  strtotime($dor)),
            'gender' => $this->input->get_post('gender'),
            'mobile' => $this->input->get_post('mobile'),
            'address' => $this->input->get_post('address'),
            'state' => $this->input->get_post('state'),
            'district' => $this->input->get_post('district'),
            'city' => $this->input->get_post('city'),
            'area' => $this->input->get_post('area'),
            'location' => $this->input->get_post('location'),
            'state_id' => $this->input->get_post('state_id'),
            'district_id' => $this->input->get_post('district_id'),
            'city_id' => $this->input->get_post('city_id'),
            'area_id' => $this->input->get_post('area_id'),
            'location_id' => $this->input->get_post('location_id'),
            'patient_category' => $this->input->get_post('patient_category'),
            'created_by' => $this->session_data[0]->id,
        );

        if(isset($_POST['age']) and !empty($_POST['age'])){
            $arrdata['age'] = $this->input->get_post('age');
        }else {
            if(isset($_POST['dob']) and !empty($_POST['dob'])){
                $dob = date('Y-m-d',  strtotime($dob));
                $arrdata['age'] = date_diff(date_create($dob), date_create('today'))->y;
            }
        }

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
            /*'chiefcomplaints3' => $this->input->get_post('chiefcomplaints3'),
            'briefHistory1' => $this->input->get_post('briefHistory1'),
            'briefHistory2' => $this->input->get_post('briefHistory2'),
            'briefHistory3' => $this->input->get_post('briefHistory3'),
            'investigation' => $this->input->get_post('investigation'),
            'tratementtaken' => $this->input->get_post('tratementtaken'),
            'anyimprovement' => $this->input->get_post('anyimprovement'),
            'diagnosys' => $this->input->get_post('diagnosys'),*/
            'diseases_master_id' => $this->input->get_post('diseases_master_id'),
            'disease' => $this->input->get_post('disease'),
            /*'prev_hospital' => $this->input->get_post('prev_hospital'),
            'prev_doc1' => $this->input->get_post('prev_doc1'),
            'prev_doc2' => $this->input->get_post('prev_doc2'),
            'prev_doc3' => $this->input->get_post('prev_doc3'),  */          
            'patient_id' => $this->input->get_post('pid'),
            'registrationid' => $this->input->get_post('registration_no'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );
//        print_r($arrdata);
//        $medicalconditionid = 1;
        $medicalconditionid = $this->patient_model->addMedicalcondition($arrdata);
        
        if(!empty($id)){
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
        if(!empty($vaccination))
        $vaccination_arr = array_keys($vaccination);
        
        $arrdata = array(
            'other' => $this->input->get_post('other'),
            'patient_id' => $this->input->get_post('pid'),
            'registration_no' => $this->input->get_post('registration_no'),
            'visit_master_id' => $this->input->get_post('visit_master_id'),
        );
        
        if(!empty($vaccination)){
            foreach ($vaccination as  $value) {
                $arrdata[$value] = 'Y';
            }
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
            $filtered_arr = array_filter($attributes);
            if(!empty($filtered_arr)){
            // foreach ($attributes as $attr_key => $attr_val) {
                foreach ($filtered_arr as $attr_key => $attr_val) {
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
            if(empty($map_test_attr)){
                $code = '201';
                $message = 'Empty records';
            }else{
                $code = '401';
                $message = 'Oops Please try again';
            }
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
    
    
    public function postHealthCamp() {
        // print_r($_POST); die();
        
        $dob = $this->input->post('dob'); 
        if(!empty($dob)){
            $dob = date('Y-m-d',  strtotime($dob));
        }
        $dor = $this->input->post('dor'); 
        $arrdata = array(
            'fname' => $this->input->get_post('fname'),
            'lanme' => $this->input->get_post('lname'),
            'dob' => $dob,
            'regitrationdate'=> date('Y-m-d',  strtotime($dor)),
            'gender' => $this->input->get_post('gender'),
            'mobile' => $this->input->get_post('mobile'),
            //'address' => $this->input->get_post('location'),
            'state' => $this->input->get_post('state'),
            'district' => $this->input->get_post('district'),
            'city' => $this->input->get_post('city'),
            'area' => $this->input->get_post('area'),
            'location' => $this->input->get_post('location'),
            'state_id' => $this->input->get_post('state_id'),
            'district_id' => $this->input->get_post('district_id'),
            'city_id' => $this->input->get_post('city_id'),
            'area_id' => $this->input->get_post('area_id'),
            'location_id' => $this->input->get_post('location_id'),
            'patient_category' => $this->input->get_post('patient_category'),
            'problem'=> $this->input->get_post('problem'),
            'remarks'=> $this->input->get_post('remarks'),
            'phase'=>$this->input->get_post('phase'),
            'created_by' => $this->session_data[0]->id,
        );
        
        if(isset($_POST['age']) and !empty($_POST['age'])){
            $arrdata['age'] = $this->input->get_post('age');
        }else {
            if(isset($_POST['dob']) and !empty($_POST['dob'])){
                $dob = date('Y-m-d',  strtotime($dob));
                $arrdata['age'] = date_diff(date_create($dob), date_create('today'))->y;
            }
        }
        
        if(!empty($arrdata)){
            $this->db->insert('camp_patient_master', $arrdata);
            $id = $this->db->insert_id();
        }
        
        $data = array();
        if ($id > 0) {
            // $count = count($ridedetails);
            $code = 201; //created
            $data = $arrdata;
            $message = 'Patient added successfully';
        } else {
            $code = '401';
            $message = 'Patient Not added';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
        
    }
    
    function ajax_get_diseases($type = '') {
        $opt = '';
        $opt_other = '<option value=""> Other </option>';
        if($type != ''){
            $diseases_query = $this->db->get_where('diseases_master',['type'=>$type]);
            $diseases_rs = $diseases_query->result();

            if(!empty($diseases_rs)){
                foreach ($diseases_rs as $key => $value) {
                    $opt .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }            
        }
        $opt .= $opt_other; 
        echo json_encode($opt);
    }


    #import functionality 
    /*
    @use: to check format of csv  
    @param:
    @return: redirect to addmultiplestaff function if csv data if csv in proper format  
    */
    public function upload_csv() {
        $fileName = time() . "-" . $_FILES['upload_csv']['name'];
        move_uploaded_file($_FILES['upload_csv']['tmp_name'], "./assets/patient_csv/" . $fileName);

        if ($fileName != "") {
            $csv = array_map('str_getcsv', file("./assets/patient_csv/" . $fileName));
            // echo "<pre>";print_r($csv); die();
            $col1 = (isset($csv[0][0]) ? $csv[0][0] : "");
            $col2 = (isset($csv[0][1]) ? $csv[0][1] : "");
            $col3 = (isset($csv[0][2]) ? $csv[0][2] : "");
            $col4 = (isset($csv[0][3]) ? $csv[0][3] : "");
            $col5 = (isset($csv[0][4]) ? $csv[0][4] : "");
            $col6 = (isset($csv[0][5]) ? $csv[0][5] : "");
            $col7 = (isset($csv[0][6]) ? $csv[0][6] : "");
            $col8 = (isset($csv[0][7]) ? $csv[0][7] : "");
            $col9 = (isset($csv[0][8]) ? $csv[0][8] : "");
            $col10 = (isset($csv[0][9]) ? $csv[0][9] : "");
            $col11 = (isset($csv[0][10]) ? $csv[0][10] : "");
            $col12 = (isset($csv[0][11]) ? $csv[0][11] : "");
            $col13 = (isset($csv[0][12]) ? $csv[0][12] : "");
            $col14 = (isset($csv[0][13]) ? $csv[0][13] : "");
            $col15 = (isset($csv[0][14]) ? $csv[0][14] : ""); 
            $col16 = (isset($csv[0][15]) ? $csv[0][15] : ""); 
            $col17 = (isset($csv[0][16]) ? $csv[0][16] : ""); 
            $col18 = (isset($csv[0][17]) ? $csv[0][17] : ""); 
            
            if ($col1 == "Sr.no" && $col2 == "Registration Date" && $col3 == "Patient Name" && $col4 == "DOB" 
            && $col5 == "Age" && $col6 == "Gender" && $col7 == "Patient Category" && $col8 == "Conatct no."
            && $col9 == "State" && $col10 == "District" && $col11 == "City" && $col12 == "Area" && $col13 == "Location" 
            && $col14 == "Symptom 1" && $col15 == "Symptom 2" && $col16 == "Disease Diagnosed" && $col17 == "Patient ID"
            && $col18 == 'Phase') {
                //echo "<pre>";print_r($csv);die("....csv.......");
                redirect(site_url('patient/addmultiplepatient/' . $fileName), 'refresh');
            } else {
                    $csv_session_data = array(
                        'csv_error_msg' => "Please update your selected CSV file according to given format."
                    );
                $this->session->set_userdata($csv_session_data);
                redirect(site_url('patient/csv_error'));
            }
        }
    }

    /*
    @use: to download csv file  
    @param:
    @return: downloaded csv file
    */
    public function download_User_csv() {
        if (isset($this->data['has_right']['User View'])) {
            $this->load->helper('download');
            $data = file_get_contents(base_url("assets/user_csv") . "/user_sample.csv"); // Read the file's contents
            $name = 'user_sample.csv';
            force_download($name, $data);
        } else {
            $this->load->view('access_denied');
        }
    }
    
    /*
     @use: to display csv data
     @param: csv filename
     @return: view of user_add_multiple
     */
    public function addmultiplepatient($fileName = "") {
        $data = array();
        $data['csv_upload'] = $fileName;
        $this->db->select('id,name,type');
        $query = $this->db->get('diseases_master');
        $data['diseases_arr'] = $query->result();

        $query_state = $this->db->get('state_master');
        $data['state_arr'] = $query_state->result();

        $query_district = $this->db->get('district_master');
        $data['district_arr'] = $query_district->result();

        $query_city = $this->db->get('city_master');
        $data['city_arr'] = $query_city->result();

                
        // $query= array('table' => 'dieases_master',
        //         'attributes' => 'distinct id,name,type',
        //         'order_by' => 'id asc');
        // $data['diseases_rs'] = $this->common_lib->get_specific($query);

        // $query = array('attributes' => 'distinct id, user_type_title','table' => 'user_type');
        // $data['type_rs'] = $this->common_lib->get_specific($query);
        // echo "<pre>";print_r($data);die();
        
        $this->load->view('patient_multiple_view', $data);
        
    }
    
    /*
     @use: to insert multiple user at a time in database
     @param:
     @return: 
     */
    public function insert_multiple() {

        $dob = $this->input->post('dob'); 
        if(!empty($dob)){
            $date = DateTime::createFromFormat('m/d/Y', $dob);
            $dob = $date->format('Y-m-d');
        }
        
        $regitrationdate = $this->input->post('regitrationdate'); 
        $date = DateTime::createFromFormat('m/d/Y', $regitrationdate);
        $regitrationdate = $date->format('Y-m-d');


        $unique_id = $this->input->post('unique_id'); 


        $arrdata = array(
            'fname' => $this->input->get_post('fname'),
            'lanme' => $this->input->get_post('lname'),
            'dob' => $dob,
            'regitrationdate'=> $regitrationdate,
            'gender' => $this->input->get_post('gender'),
            'mobile' => $this->input->get_post('mobile'),
            'address' => $this->input->get_post('address'),
            'state' => $this->input->get_post('state'),
            'district' => $this->input->get_post('district'),
            'city' => $this->input->get_post('city'),
            'area' => $this->input->get_post('area'),
            'location' => $this->input->get_post('location'),
            'state_id' => $this->input->get_post('state_id'),
            'district_id' => $this->input->get_post('district_id'),
            'city_id' => $this->input->get_post('city_id'),
            'area_id' => $this->input->get_post('area_id'),
            'location_id' => $this->input->get_post('location_id'),
            'patient_category' => $this->input->get_post('patient_category'),
            'created_by' => $this->session_data[0]->id,
        );

        if(isset($_POST['age']) and !empty($_POST['age'])){
            $arrdata['age'] = $this->input->get_post('age');
        }else {
            if(isset($_POST['dob']) and !empty($_POST['dob'])){
                // $dob = date('Y-m-d',  strtotime($dob));
                $arrdata['age'] = date_diff(date_create($dob), date_create('today'))->y;
            }
        }

        // print_r($arrdata); exit;

        $pid = $this->input->get_post('pid');
        if(empty($pid)){
            $id = $this->patient_model->addPatient($arrdata);
        }else {
            $id = $this->input->get_post('pid');
            // $registration_no = $this->input->get_post('registration_no');
            $query_patient = $this->db->get_where('patient_master',['id'=>$id]);
            $patient_rs = $query_patient->first_row();
            if($query_patient->num_rows() == 1 && !empty($id) ){
            // if (!empty($id) && !empty($registration_no)) {
                $this->db->update('patient_master', $arrdata, 
                ['id' => $id, 'registration_no' => $patient_rs->registration_no]);
            }
        }
        
        $data = array();
        if ($id > 0) {
            $result = $this->patient_model->getPatient($id);
            $phase = $this->input->get_post('phase');
            $visit_arr = ['patient_master_id'=>$id, 'user_id'=> $this->session_data[0]->id, 'phase'=>$phase];
            $this->db->insert('visit_master',$visit_arr);
            $visit_master_id = $this->db->insert_id();
            
            // insert medical connditon data
            $diseases_diagnosed = $this->input->post('disease_diagnosed');
            $patient_category = $this->input->get_post('patient_category');
            $query_disease = $this->db->get_where('diseases_master', 
            ['name'=>$diseases_diagnosed, 'type'=>$patient_category]);

            $diseases_diagnosed_rs = $query_disease->first_row();
            
            $diseases_master_id = 0;
            if($query_disease->num_rows() == 1){
                $diseases_master_id = $diseases_diagnosed_rs->id;
            }

            $data1 = array(
                'chiefcomplaints1' => $this->input->post('symptom1'),
                'chiefcomplaints2' => $this->input->post('symptom2'),
                'diseases_master_id' => $diseases_master_id,
                'disease' => $diseases_diagnosed,
                'patient_id' => $id,
                'registrationid' => $result->registration_no,
                'visit_master_id' => $visit_master_id,
            );
            // print_r($data1); exit;
            $medicalcondition_query = $this->db->insert('medicalconditionmaster', $data1);
    
            $code = 201; 
            $data = $result;
            // $message = ($insert == 1?'Patient added successfully':'Patient updated');
        } 

        echo json_encode($data);    
    }
    
    /*
     @use: to append gigen number of rows while adding multiple user 
     @param: total number of rows
     @return: view of ajax_add_multiple_staff
     */
    public function ajax_add_multiple_patient($total_rows, $phase) {
        $data = array();
        $this->db->select('id,name,type');
        $query = $this->db->get('diseases_master');
        $data['diseases_arr'] = $query->result();

        $query_state = $this->db->get('state_master');
        $data['state_arr'] = $query_state->result();

        $query_district = $this->db->get('district_master');
        $data['district_arr'] = $query_district->result();

        $query_city = $this->db->get('city_master');
        $data['city_arr'] = $query_city->result();

        $data['total_rows'] = $total_rows;
        $data['phase'] = $phase;
        $this->load->view('ajax_add_multiple_patient', $data);
    }

    public function csv_error(){
        $this->load->view('csv_error');
    }

}
