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


}