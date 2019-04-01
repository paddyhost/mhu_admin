<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class patient_edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('patient_model');
    }

    public function testByMhu($patient_id = 0, $visit_id = 0){
        // collect test fields
        $sql1 = "SELECT GROUP_CONCAT( mta.attribute_name, '|', mta.id ORDER BY mta.id SEPARATOR '--') as attribute_values,"
                . " GROUP_CONCAT(DISTINCT tm.test_name ORDER BY tm.id) as test_name, tm.id"
                . " FROM map_test_attribute mta "
                . " LEFT JOIN test_master tm ON (tm.id = mta.test_master_id) "
                . " GROUP BY tm.id";
        $query1 = $this->db->query($sql1);
        $data['mhu_test'] = $query1->result();
        // actual record
        $data['test'] = $this->patient_model->gettestvaluesForEdit($visit_id);
        // print_r($data); exit;

        $this->load->view('edit_modal/testbymhu', $data);
        
    }

    public function udpateTestValues(){
        extract($_POST);
        $map_test_attr = [];
        foreach ($test as $test_id => $attributes) {
            $filtered_arr = array_filter($attributes);
            if(!empty($filtered_arr)){
                foreach ( $filtered_arr as $attr_key => $attr_val) {
                    $map_test_attr[] = array(
                        'test_master_id'=>$test_id,
                        'map_test_attribute_id'=>$attr_key,
                        'reading'=>(!(empty($attr_val)) ? $attr_val : NULL),
                        'patient_id'=>$pid,
                        'registeration_id'=>$registration_id,
                        'visit_master_id'=>$visit_master_id,                    
                    );
                }
            }
        }

        // print_r($map_test_attr); exit;
        if(!empty($map_test_attr)){
            $this->db->delete('map_test_attribute_values', 
            ['visit_master_id'=> $visit_master_id, 'patient_id'=> $pid]);
            $affected_row = 0;

            $this->db->insert_batch('map_test_attribute_values', $map_test_attr);
            $affected_row = $this->db->affected_rows();
        }
        
        $data = array();
        if ($affected_row > 1) {
            $result = $map_test_attr;
            $code = 201; //created
            $data = $result;
            $message = 'Tests Updates successful';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }

    public function medicalCondition($patient_id = 0, $visit_id = 0){
        // collect test fields 
        $this->db->select('patient_category');
        $patientQuery = $this->db->get_where('patient_master', ['id' => $patient_id]);
        if ($patientQuery->num_rows() == 1) {
            $patient_arr = $patientQuery->first_row();
            $patient_category = $patient_arr->patient_category;
        }
        $diseases_query = $this->db->get_where('diseases_master',['type'=>$patient_category]);
        $data['diseases'] = $diseases_query->result();
        $data['medical'] = $this->patient_model->getOneByTable('medicalconditionmaster', ['visit_master_id' => $visit_id]);
        // echo '<pre>'; print_r($data); exit;
        $this->load->view('edit_modal/medical_condition', $data);
        
    }

    public function updateMedical(){
        extract($_POST);
        $update_array = array(
            'chiefcomplaints1' => $symptom1,
            'chiefcomplaints2' => $symptom2,
            'diseases_master_id' => $diseases_master_id,
            'disease' => $disease);
            // print_r($update_array); exit;
        $where_array = array(
            'patient_id' => $pid,
            'visit_master_id' => $visit_master_id
        // 'registration_id' => registration_id
        );
        
        $affected_row = 0;
        if(!empty(array_filter($update_array)) and !empty(array_filter($where_array))){
            $this->db->update('medicalconditionmaster', $update_array, $where_array);
            $affected_row = $this->db->affected_rows();
        }
        
        $data = array();
        if ($affected_row >= 1) {
            $result = $_POST;
            $code = 204; //created
            $data = $result;
            $message = 'Medical Updates successful';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }

    public function generalInfo($patient_id = 0){
        // collect test fields 
        $patientQuery = $this->db->get_where('patient_master', ['id' => $patient_id]);
        if ($patientQuery->num_rows() == 1) {
            $data['patient'] = $patientQuery->first_row();
            $query_visit = $this->db->get_where("visit_master",['patient_master_id'=>$patient_id]);
            $visit = $query_visit->first_row();

            $data['phase'] = $visit->phase;
        }
        $query_state = $this->db->get('state_master');
        $data['state_arr'] = $query_state->result();

        $query_district = $this->db->get('district_master');
        $data['district_arr'] = $query_district->result();

        $query_city = $this->db->get('city_master');
        $data['city_arr'] = $query_city->result();

        // $query_area = $this->db->get_where('area_master', ['phase_id'=>$visit->phase]);
        // $data['area_arr'] = $query_area->result();

        $query_area = $this->db->select('am.name, map.area_id as id')->from('map_area_phase map')
            ->where(['map.phase_id' => $visit->phase])
            ->join('area_master as am', 'am.id = map.area_id', 'left')->get();
        $data['area_arr'] = $query_area->result();

        $query_locations = $this->db->get_where('locations_master', ['phase_id'=> $visit->phase, 'aria_id'=> $data['patient']->area_id]);
        $data['locations_arr'] = $query_locations->result();



        // print_r($data['locations_arr']); exit;
        $this->load->view('edit_modal/general_info', $data);
        
    }

    public function updateGeneralInfo(){
        extract($_POST);
        // $update_array = $_POST;
        $update_array = array(
            'fname' => $fname,
            'lanme' => $lname,
            'dob' => date('Y-m-d',  strtotime($dob)),
            'regitrationdate' => date('Y-m-d',  strtotime($regitrationdate)),
            'gender' => $gender,
            'mobile' => $mobile,
            'state' => $state,
            'district' => $district,
            'city' => $city,
            'area' => $area,
            'location' => $location,
            'state_id' => $state_id,
            'district_id' => $district_id,
            'city_id' => $city_id,
            'area_id' => $area_id,
            'location_id' => $location_id,
            'patient_category' => $patient_category,
            'age' => $age,
        );

        $where_array = array(
            'id' => $pid,
        );

        if(!empty(array_filter($update_array)) and !empty(array_filter($where_array))){

            $this->db->update('patient_master', $update_array, $where_array);
            $affected_row = $this->db->affected_rows();
        }
        
        $data = array();
        if ($affected_row >= 1) {
            $result = $_POST;
            $code = 204; //created
            $data = $result;
            $message = 'General info Updates successful';
        } else {
            $code = '401';
            $message = 'Oops Please try again';
        }
        
        $response = array('code'=>$code, 'data'=>$data, 'message'=>$message);
        echo json_encode($response);
    }


}