<?php

class Patient_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function addPatient($insertArray) {
        $data = array(
            'registration_no' => uniqid("rpm-"),
//            'registration_no' => '',
            'fname' => '',
            'lanme' => '',
            'dob' => '',
            'gender' => '',
            'mobile' => '',
            'address' => '',
            'state' => '',
            'district' => '',
            'city' => '',
            'area' => '',
            'location' => '',
            // 'unique_id' => random_string('numeric', 20),
            'patient_category' => '',
            'created_by' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'registration_no' => $registration_no,
            'fname' => $fname,
            'lanme' => $lanme,
            'dob' => $dob,
            'gender' => $gender,
            'mobile' => $mobile,
            'address' => $address,
            'state' => $state,
            'district' => $district,
            'city' => $city,
            'area' => $area,
            'location' => $location,
            // 'unique_id' => $unique_id,
            'patient_category' => $patient_category,
            'created_by' => $created_by,
        );


        $this->db->insert('patient_master', $data1);
        $newid = $this->db->insert_id();
        
        $unique_id = str_pad($newid, 6, 0, STR_PAD_LEFT);
        // $unique_id = strtoupper(substr($state, 0, 3)).'-'.str_pad($newid, 6, 0, STR_PAD_LEFT);
        $this->db->update('patient_master',['unique_id'=>$unique_id],['id'=>$newid]); 

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getPatient($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('patient_master');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function getPatientallList() {


        $query = $this->db->get('patient_master');
        $result = $query->result();


        return $result;
    }

    public function addVital($insertArray) {
        $data = array(
            'pid' => '',
            'registrationno' => '',
            'height' => '',
            'weight' => '',
            'bpto' => '',
            'bloodpresure' => '',
            'tempreture' => '',
            'respiration' => '',
            'visit_master_id' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'pid' => $pid,
            'registrationno' => $registrationno,
            'height' => $height,
            'bpto' => $bpto,
            'weight' => $weight,
            'bloodpresure' => $bloodpresure,
            'tempreture' => $tempreture,
            'respiration' => $respiration,
            'visit_master_id' => $visit_master_id,
        );


        $this->db->insert('vital_master', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getVital($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('vital_master');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function addMedicalcondition($insertArray) {



        $data = array(
            'chiefcomplaints1' => '',
            'chiefcomplaints2' => '',
            'chiefcomplaints3' => '',
            'briefHistory1' => '',
            'briefHistory2' => '',
            'briefHistory3' => '',
            'investigation' => '',
            'tratementtaken' => '',
            'anyimprovement' => '',
            'diagnosys' => '',
            'patient_id' => '',
            'registrationid' => '',
            'visit_master_id' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'chiefcomplaints1' => $chiefcomplaints1,
            'chiefcomplaints2' => $chiefcomplaints2,
            'chiefcomplaints3' => $chiefcomplaints3,
            'briefHistory1' => $briefHistory1,
            'briefHistory2' => $briefHistory2,
            'briefHistory3' => $briefHistory3,
            'investigation' => $investigation,
            'tratementtaken' => $tratementtaken,
            'anyimprovement' => $anyimprovement,
            'diagnosys' => $diagnosys,
            'patient_id' => $patient_id,
            'registrationid' => $registrationid,
            'visit_master_id' => $visit_master_id,
        );


        $this->db->insert('medicalconditionmaster', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getMedicalcondition($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('medicalconditionmaster');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function addPriscribeDose($insertArray) {
        $data = array(
            'name' => '',
            'frequency' => '',
            'days' => '',
            'medicalconditionid' => '',
            'time' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'name' => $name,
            'frequency' => $frequency,
            'days' => $days,
            'medicalconditionid' => $medicalconditionid,
            'time' => $time,
        );


        $this->db->insert('priscribedose', $data1);
        $newid = $this->db->insert_id();

        return $newid;
    }

    public function getPriscribeDose($medicalconditionid) {

        $this->db->where('id', $medicalconditionid);
        $query = $this->db->get('priscribedose');
        $result = $query->result();


        return $result;
    }

    public function addvaccination($insertArray) {

        $data = array(
            'dpt' => '',
            'bcg' => '',
            'measles' => '',
            'opv' => '',
            'ttt' => '',
            'hepatitis' => '',
            'other' => '',
            'patient_id' => '',
            'registration_no' => '',
            'visit_master_id' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'dpt' => $dpt,
            'bcg' => $bcg,
            'measles' => $measles,
            'opv' => $opv,
            'ttt' => $ttt,
            'hepatitis' => $hepatitis,
            'other' => $other,
            'patient_id' => $patient_id,
            'registration_no' => $registration_no,
            'visit_master_id' => $visit_master_id,
        );


        $this->db->insert('vaccinationmaster', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getvaccination($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('vaccinationmaster');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function addPatientHistory($insertArray) {


        $data = array(
            'patient_id' => '',
            'registrationno' => '',
            'drname1' => '',
            'drname2' => '',
            'drname3' => '',
            'hospitalname' => '',
            'visit_master_id' => '',
        );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'patient_id' => $patient_id,
            'registrationno' => $registrationno,
            'drname1' => $drname1,
            'drname2' => $drname2,
            'drname3' => $drname3,
            'hospitalname' => $hospitalname,
            'visit_master_id' => $visit_master_id,
        );


        $this->db->insert('patient_history', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getPatientHistory($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('patient_history');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function addMHUTest($insertArray) {


        $data = array(
            'bloodglucose' => '',
            'heamogram' => '',
            'creatine' => '',
            'urea' => '',
            'sgot' => '',
            'sgpt' => '',
            'adviced' => '',
            'ferered' => '',
            'remark' => '',
            'visit_master_id'=>'',
               );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
            'bloodglucose' => $bloodglucose,
            'heamogram' => $heamogram,
            'creatine' => $creatine,
            'urea' => $urea,
            'sgot' => $sgot,
            'sgpt' => $sgpt,
            'adviced' => $adviced,
            'ferered' => $ferered,
            'remark' => $remark,
            'visit_master_id'=>$visit_master_id,
            
            );


        $this->db->insert('mhutestmaster', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getMHUTest($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('mhutestmaster');
        $result = $query->result();
        if ($query->num_rows() >= 1) {
            $result = $query->first_row();
        }

        return $result;
    }

    public function getPatientList($rowCount, $sort, $current, $searchPhrase = '') {


        $start = ($current * $rowCount) - ($rowCount);
        $limit = $start + $rowCount;

        $this->db->select('id,registration_no, CONCAT(fname, " ",lanme) fname,dob, gender, mobile,regitrationdate,address');

        $this->db->limit($limit, $start);
        if ($searchPhrase != '') {
            $this->db->where("fname LIKE '%" . $searchPhrase . "%' OR lanme LIKE '%" . $searchPhrase . "%' OR mobile LIKE '%" . $searchPhrase . "%'");
        }
        if (isset($sort)) {
            foreach ($sort as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }

        $query = $this->db->get('patient_master');
        $result = $query->result();

        return $result;
    }

    /*
     * author arshad.m
     */

    public function gettestvalues($visit_master_id = 0) {
        $result = FALSE;
        if ($visit_master_id >= 1) {
            $sql1 = "SELECT GROUP_CONCAT( CONCAT( mta.attribute_name , ' = ' , IF(mtav.reading = '','NA',mtav.reading), ' - ' , IF(mtav.reference_value = '','NA',mtav.reference_value)) ORDER BY mtav.test_master_id SEPARATOR '--') as attribute_values,"
                    . " GROUP_CONCAT(DISTINCT tm.test_name ORDER BY mtav.test_master_id) as test_name"
                    . " FROM map_test_attribute_values mtav "
                    . " LEFT JOIN map_test_attribute mta ON (mta.id = mtav.map_test_attribute_id) "
                    . " LEFT JOIN test_master tm ON (tm.id = mtav.test_master_id) "
                    . " WHERE mtav.visit_master_id = " . $visit_master_id . " GROUP BY mtav.test_master_id";
            $query1 = $this->db->query($sql1);
            if ($query1->num_rows() >= 1) {
                $result = $query1->result();
                $temp = array();
                foreach ($result as $key => $value) {
                    $temp[$value->test_name] = explode('--', $value->attribute_values);
                }
                $result = $temp;
            }
        }
        return $result;
    }

    public function getOneByTable($table, $whereArr) {
        $result = FALSE;
        if (!empty($whereArr)) {
            $query = $this->db->get_where($table, $whereArr);
            if ($query->num_rows() >= 1) {
                $result = $query->first_row();
            }
        }

        return $result;
    }
    
    public function getManyByTable($table, $whereArr) {
        $result = FALSE;
        if (!empty($whereArr)) {
            $query = $this->db->get_where($table, $whereArr);
            if ($query->num_rows() >= 1) {
                $result = $query->result();
            }
        }

        return $result;
    }

    public function getPatientList2() {
        $response = array();
        $where_order = '';
        $where_and = '';
        $rows = 10;
        $current = 1;
        $limit_l = ($current * $rows) - ($rows);
        $limit_h = $limit_l + $rows;
        
        //Handles determines where in the paging count this result set falls in
        if (isset($_REQUEST['rowCount']))
            $rows = $_REQUEST['rowCount'];
        //calculate the low and high limits for the SQL LIMIT x,y clause
        if (isset($_REQUEST['current'])) {
            $current = intval($_REQUEST['current']);
            $limit_l = ($current * $rows) - ($rows);
            $limit_h = $rows;
        }
        if ($rows == -1)
            $limit = "0,18446744073709551615"; // 18446744073709551615 is max value of big int
        else
            $limit = " $limit_l,$limit_h ";
        
        if (!empty($_POST['searchPhrase'])) {
        	$where_and .=" AND ( fname LIKE '%" . $_POST['searchPhrase'] . "%' OR lanme LIKE '%" . $_POST['searchPhrase'] . "%'  ) ";
        }
        
        /** Sorting * */
        if (isset($_POST['sort'])) {
        	$arrSort = $_POST['sort'];
        	$sortkey = key($arrSort);
        	$sortval = $_POST['sort'][$sortkey];
        	$where_order .=" ORDER BY " . $sortkey . ' ' . $sortval;

        } else {
        	$where_order .=" ORDER BY id DESC ";
        }  

        $sql = "SELECT SQL_CALC_FOUND_ROWS *,CONCAT(fname, ' ',lanme) fname FROM patient_master
                WHERE 1 " .$where_and . $where_order . " 
                LIMIT " . $limit;
        
//        id, registration_no, CONCAT(fname, ' ',lanme) fname ,
//                dob, gender, mobile,regitrationdate,address 
        
        $query1 = $this->db->query($sql);

        $query2 = $this->db->query('SELECT FOUND_ROWS() as howmany');
        $result2 = $query2->first_row();

        $response['totalRecords'] = $result2->howmany;
        $response['records'] = $query1->result();
        $response['postdata'] = $_POST;

        return $response;
        
    }
    
    
    public function getTotalPatientCounts() {

        
        $query = $this->db->query("SELECT count(DISTINCT id) as total,patient_category FROM `patient_master` GROUp By patient_category");

        return $query->result_array();
        
        $sqlmonthlycount='SELECT count( DISTINCT patient_master_id) as count ,MONTH(created_at) as monthno FROM visit_master GROUP by MONTH(created_at) ORDER By MONTH(created_at)';
        
    }
      
    public function getTotalMonthlyPatientCounts($category) {

        $sqlmonthlycount='SELECT count( DISTINCT patient_master_id) as count ,MONTH(created_at) as monthno FROM visit_master LEFT JOIN patient_master ON(patient_master.id=visit_master.patient_master_id) WHERE patient_master.patient_category="'.$category.'"GROUP by MONTH(created_at) ORDER By MONTH(created_at)';
        
        $query = $this->db->query($sqlmonthlycount);

        $monthlycount= $query->result_array();
        
         $data2=array();
         foreach ($monthlycount as $key => $value) {
            
                $arrdata=array();
                array_push($arrdata,intval($value["monthno"])-1);
                array_push($arrdata,intval($value["count"]));
                array_push($data2,$arrdata);
            
        }
        return $data2;
        
        
    }

     public function getTotalpatientCount() {

        $sqlmonthlycount='SELECT `patient_master`.`patient_category`,`patient_category`.name ,COUNT(`patient_master`.`patient_category`) AS count FROM `patient_master` LEFT JOIN `patient_category` ON(`patient_category`.`code` =`patient_category`) GROUP BY `patient_master`.`patient_category`';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
    
     public function getTotalpatientCountBy($month,$aria) {

        $sqlmonthlycount='SELECT  `patient_master`.`patient_category`,`patient_category`.name ,COUNT(`patient_master`.`patient_category`) AS count FROM `patient_master` LEFT JOIN `patient_category` ON(`patient_category`.`code` =`patient_category`)  WHERE month(STR_TO_DATE(regitrationdate, "%d-%m-%Y"))='.$month.' AND `patient_master`.`area`="'.$aria.'"
GROUP BY `patient_master`.`patient_category`';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
    
      public function getComplentCountBy($cat) {

        $sqlmonthlycount='SELECT `medicalconditionmaster`.`chiefcomplaints1`,count(`medicalconditionmaster`.`chiefcomplaints1`) as count  FROM `medicalconditionmaster` LEFT JOIN `patient_master` ON(`patient_master`.id=`medicalconditionmaster`.`patient_id`) WHERE `patient_master`.`patient_category`="'.$cat.'" GROUP BY `medicalconditionmaster`.`chiefcomplaints1` ORDER BY count DESC';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
      public function getAria() {

        $sqlmonthlycount='SELECT area FROM `patient_master` GROUP BY area';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
     public function getTestList() {

        $sqlmonthlycount='SELECT  * FROM `test_master`';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
    
       public function getTestCountBY($testid) {

        $sqlmonthlycount='SELECT COUNT(`patient_master`.`patient_category`) ,`patient_category`.`name` FROM   `patient_master` LEFT JOIN `map_test_attribute_values` ON `patient_master`.`id`=`map_test_attribute_values`.`patient_id` LEFT JOIN `patient_category` ON `patient_category`.`code`=`patient_master`.`patient_category` 
WHERE `map_test_attribute_values`.`test_master_id`='.$testid.'
GROUP BY `patient_master`.`patient_category`';
        
        $query = $this->db->query($sqlmonthlycount);

        $data2= $query->result_array();
      
         
  
        return $data2;
        
        
    }
}
   
    

