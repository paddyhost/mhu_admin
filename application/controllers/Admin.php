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
        $data["aria"]= $this->patient_model->getAria();;
     
        $this->load->view('dashboard',$data);
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

    public function api($api) {
        
       $user= $this->session->has_userdata('user');
        $_POST["format"] = "JSON";
        $_POST["mobile"] = $this->session->user[0]->mobile;
        $_POST["password"] = $this->session->user[0]->password;
         $data_string = json_encode($_POST);
        
        $url = 'http://localhost/api/v1_1/'.$api;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

//execute post
        $result = curl_exec($ch);

//close connection
        curl_close($ch);



        echo $result;
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


            $data[$value["patient_category"]] = $value["total"];
        }

        //print_r($data2);die;
        // $Datat='[[1,60],[2,30],[3,50],[4,100],[5,10],[6,90]]';
        $data['barPW'] = $this->patient_model->getTotalMonthlyPatientCounts("PW");
        $data['baLW'] = $this->patient_model->getTotalMonthlyPatientCounts("LW");
        $data['barS'] = $this->patient_model->getTotalMonthlyPatientCounts("S");
        $data['barC'] = $this->patient_model->getTotalMonthlyPatientCounts("C");
        echo json_encode($data);
    }
    
    public function ajax_getTotalpatientCount() {
        $records = $this->patient_model->getTotalpatientCount();

      
      $data=array();
  
        foreach ($records as $key => $value) {
                 $data[$value["name"]]=$value["count"];
                 
                 
        }
        
        echo json_encode($data);
    }
    
      public function ajax_getTotalpatientCountby() {
          
          $month = $this->input->get('month');
          $aria = $this->input->get('aria');
        $records = $this->patient_model->getTotalpatientCountBy($month,$aria);

      
      $data=array();
  
        foreach ($records as $key => $value) {
                 $data[$value["name"]]=intval($value["count"]);
                 
                 
        }
        
        echo json_encode($data);
    }
 public function ajax_getComplentCountBy() {
          
          $cat = $this->input->get('cat');
        $records = $this->patient_model->getComplentCountBy($cat);

      
      $data=array();
  $i=0;
        foreach ($records as $key => $value) {
                 $data[$value["chiefcomplaints1"]]=intval($value["count"]);
                 
                 if($i==4)
                 {
                     break;
                 }
                     
                     $i++;
        }
        
        echo json_encode($data);
    }
 public function ajax_getpatient_complaint() {
          
          //$cat = $this->input->get('cat');
        $LW = $this->patient_model->getComplentCountBy("LW");
        $PW = $this->patient_model->getComplentCountBy("PW");
        $S = $this->patient_model->getComplentCountBy("S");
        $C = $this->patient_model->getComplentCountBy("C");
        $O = $this->patient_model->getComplentCountBy("O");

      
    
        
        
         $i=1;
        $x[0]="x";
        foreach ($C as $key => $value) {
                 $x[$i]=($value["chiefcomplaints1"]);
                 $i++;
        }
        
        
         $i=1;
        $datachild[0]="Child Under-5 Year of Age";
        foreach ($C as $key => $value) {
                 $datachild[$i]=intval($value["count"]);
                 $i++;
        }
        $i=1;
        $datapw[0]="Pregnant Women";
        foreach ($PW as $key => $value) {
                 $datapw[$i]=intval($value["count"]);
                 $i++;
        }
         $i=1;
        $dataLW[0]="Lactating Women";
        foreach ($LW as $key => $value) {
                 $dataLW[$i]=intval($value["count"]);
                 $i++;
        }
          $i=1;
        $dataS[0]="Senior Citizen-above 60 year of age";
        foreach ($S as $key => $value) {
                 $dataS[$i]=intval($value["count"]);
                 $i++;
        }
        
        
       
        
        $data=array(
             0=>$x,
  1 => $dataS,
  2=>$dataLW,
  3=>$datapw,
  4=>$datachild
 
);


        echo json_encode($data);
    }


public function ajax_getTestList() {
          
       
        $tests = $this->patient_model->getTestList();
        $data=array();
        foreach ($tests as $key => $value) {
                 $testdata=$this->patient_model->getTestCountBY($value["id"]);
                 $arrayrow=array();
                 $i=0;
                  foreach ($testdata as $key1 => $value1) {
                    $arrayrow[$i]=$value1["COUNT(`patient_master`.`patient_category`)"];
                    $i++;
                  }
                 
                 $data[$value["test_name"]]=$arrayrow;
                 
        }
        
       echo json_encode($data);
}
}




/*
 * 
 * 
 *   columns: [
                    ['x', 'Child', 'Lactating Women', 'Pregnant Women', 'Senior citizen'],
                    ['data1', 30, 200, 100, 400],
                    ['data2', 130, 300, 200, 300],
                    ['data3', 80, 150, 100, 180],
                    ['data4', 20, 100, 50, 150],
                    ['data5', 20, 100, 50, 150],
                    ['data6', 20, 100, 50, 150],
                    ['data7', 20, 100, 50, 150],
                    ['data8', 20, 100, 50, 150],
                    ['data9', 20, 100, 50, 150],
                    ['data10', 20, 100, 50, 150]
                ]
 *             }*/