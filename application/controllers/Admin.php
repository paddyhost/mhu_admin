<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->model('patient_model');
        // Your own constructor code
    }

    public function dashboard() {

        $this->load->view('dashboard');
    }

    public function newregistration() {

        $data = array();
        $medicine_query = $this->db->get('medicine_master');
        $data['medicine'] = $medicine_query->result();
             
        $sql1 = "SELECT GROUP_CONCAT( mta.attribute_name, '|', mta.id ORDER BY mta.id SEPARATOR '--') as attribute_values,"
                . " GROUP_CONCAT(DISTINCT tm.test_name ORDER BY tm.id) as test_name, tm.id"
                . " FROM map_test_attribute mta "
                . " LEFT JOIN test_master tm ON (tm.id = mta.test_master_id) "
                . " GROUP BY tm.id";
        $query1 = $this->db->query($sql1);
        
        $data_view['mhu_test'] = $query1->result();
        $data['test_view'] = $this->load->view('tpl_mhu_tests', $data_view, TRUE);
        
        $this->load->view('new_registration', $data);
    }

    public function patientlist() {
        
        $this->load->view('patient_list');
    }

    public function getPatientList() {
        $records = $this->patient_model->getPatientList2();

        if (!isset($_POST['current'])) {
            $current = 1;
        } else {
            $current = intval($_POST['current']);
        }
        $json_data = array(
            "current" => $current,
            "rowCount" => 10,
            "total" => intval($records['totalRecords']),
            "rows" => $records['records'], // total data array
            "requestpost" => $_POST
        );

        die(json_encode($json_data));  // send data as json format
    }

    /* public function getPatientList() {


      $current = $this->input->get_post('current');
      $rowCount = $this->input->get_post('rowCount');
      $sort = $this->input->get_post('sort');
      $searchPhrase = $this->input->get_post('searchPhrase');

      $data = $result = array();
      $Patient = $this->patient_model->getPatientList($rowCount, $sort, $current, $searchPhrase);


      $data["current"] = $current;
      $data["rowCount"] = $rowCount;
      $data["rows"] = $Patient;
      $data["total"] = count($this->patient_model->getPatientallList());
      print_r(json_encode($data));
      } */

    public function patientcard($patient_id) {
        if ($patient_id) {
//            $this->db->order('created_at');
            $patient_arr = $visit_arr = array();
            $patientQuery = $this->db->get_where('patient_master', ['id' => $patient_id]);

            if ($patientQuery->num_rows() == 1) {
                $patient_arr = $patientQuery->first_row();
            }

            if (!empty($patient_arr)) {
                $query = $this->db->get_where('visit_master', ['patient_master_id' => $patient_id]);
                if ($query->num_rows() >= 1) {
                    $visit_arr = $query->result();
                }
            }

            $data['visit'] = $visit_arr;
            $data['patient'] = $patient_arr;
//            print_r($data); die();
        }
        $this->load->view('patient_card', $data);
    }

    public function getpatientbyvisit() {
        $visit_master_id = $this->input->post('id');
        $patient_record = array();
        if ($visit_master_id >= 1) {
            $patient_record['vital'] = $this->patient_model->getOneByTable('vital_master', ['visit_master_id' => $visit_master_id]);
            $patient_record['medical'] = $this->patient_model->getOneByTable('medicalconditionmaster', ['visit_master_id' => $visit_master_id]);
            if (!empty($patient_record['medical'])) {
                $id = $patient_record['medical']->id;
                $dose = $this->patient_model->getManyByTable('priscribedose', ['medicalconditionid' => $id]);
                $patient_record['medical']->prescribe_dose = $dose;
            }
            $patient_record['vaccination'] = $this->patient_model->getOneByTable('vaccinationmaster', ['visit_master_id' => $visit_master_id]);
//            $patient_record['history'] = $this->patient_model->getOneByTable('patient_history', ['visit_master_id'=>$visit_master_id]);
            $patient_record['test'] = $this->patient_model->gettestvalues($visit_master_id);
        }
        $data['view'] = $this->load->view('patientinfo', ['patient_record' => $patient_record], TRUE);
        $data['message'] = 1;
        echo json_encode($data);
    }

    public function ajax_getDashBoardData() {
        $records = $this->patient_model->getTotalPatientCounts();

        foreach ($records as $key => $value) {
            
                
        $data[$value["patient_category"]]=$value["total"];
            
        }
       
        //print_r($data2);die;
      // $Datat='[[1,60],[2,30],[3,50],[4,100],[5,10],[6,90]]';
$data['barPW']= $this->patient_model->getTotalMonthlyPatientCounts("PW");
$data['baLW']= $this->patient_model->getTotalMonthlyPatientCounts("LW");
$data['barS']= $this->patient_model->getTotalMonthlyPatientCounts("S");
$data['barC']= $this->patient_model->getTotalMonthlyPatientCounts("C");
                        echo json_encode($data);

    }

}
