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
            'unique_id' => random_string('numeric',20),
            'patient_category'=>'',
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
            'unique_id' => $unique_id,
            'patient_category'=> $patient_category,
        );


        $this->db->insert('patient_master', $data1);
        $newid = $this->db->insert_id();

        // echo $this->db->last_query();   
        return $newid;
    }

    public function getPatient($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('patient_master');
        $result = $query->result();
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }


     public function getPatientallList() {

    
        $query = $this->db->get('patient_master');
        $result = $query->result();
       

        return $result;
    }

    public function addVital($insertArray){
        $data = array(
       
                'pid' =>'' ,
                'registrationno' =>'',
                'height' => '',
                'weight' => '',
               'bpto' => '',

               
                'bloodpresure' =>'',
                'tempreture' =>'',
               
                'respiration' =>'',
               
                
         );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
                'pid' => $pid,
                'registrationno' =>$registrationno,
                'height' => $height,
                'bpto' => $bpto,

                'weight' => $weight,              
                'bloodpresure' =>$bloodpresure,
                'tempreture' =>$tempreture,
                'respiration' =>$respiration,           
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
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }



   public function addMedicalcondition($insertArray){



        $data = array(
                'chiefcomplaints1' =>'' ,
                'chiefcomplaints2' =>'',
                'chiefcomplaints3' => '',
                'briefHistory1' => '',
                'briefHistory2' => '',              
                'briefHistory3' =>'',
                'investigation' =>'',               
                'tratementtaken' =>'',
                'anyimprovement' => '',              
                'diagnosys' =>'',
                'patient_id' =>'',               
                'registrationid' =>'',
               
                
         );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
                 'chiefcomplaints1' =>$chiefcomplaints1 ,
                'chiefcomplaints2' =>$chiefcomplaints2,
                'chiefcomplaints3' => $chiefcomplaints3,
                'briefHistory1' => $briefHistory1,
                'briefHistory2' =>$briefHistory2,              
                'briefHistory3' =>$briefHistory3,
                'investigation' =>$investigation,               
                'tratementtaken' =>$tratementtaken,
                'anyimprovement' => $anyimprovement,              
                'diagnosys' =>$diagnosys,
                'patient_id' =>$patient_id,               
                'registrationid' =>$registrationid,           
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
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }



   public function addPriscribeDose($insertArray){
        $data = array(
                'name' =>'' ,
                'frequency' =>'',
                'days' => '',
                'medicalconditionid' => '',
                );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
                'name' =>$name ,
                'frequency' =>$frequency,
                'days' => $days,
                'medicalconditionid' => $medicalconditionid,         
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


   public function addvaccination($insertArray){
    
        $data = array(
                'dpt' =>'' ,
                'bcg' =>'',
                'measles' => '',
                'opv' => '',
                'ttt' =>'',
                'hepatitis' => '',
                'other' => '',
                'patient_id'=>'',
                'registration_no'=>'',
                );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
                  'dpt' =>$dpt ,
                'bcg' =>$bcg,
                'measles' => $measles,
                'opv' => $opv,
                'ttt' =>$ttt,
                'hepatitis' => $hepatitis,
                'other' => $other,   
                   'patient_id'=>$patient_id,
                'registration_no'=>$registration_no,   
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
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }

  public function addPatientHistory($insertArray){

    
        $data = array(
                'patient_id' =>'' ,
                'registrationno' =>'',
                'drname1' => '',
                'drname2' => '',
                'drname3' =>'',
                'hospitalname' => '',
               
                );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
              'patient_id' =>$patient_id ,
                'registrationno' =>$registrationno,
                'drname1' => $drname1,
                'drname2' => $drname2,
                'drname3' =>$drname3,
                'hospitalname' =>$hospitalname, 
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
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }

public function addMHUTest($insertArray){


        $data = array(
                'bloodglucose' =>'' ,
                'heamogram' =>'',
                'creatine' => '',
                'urea' => '',
                'sgot' =>'',
                'sgpt' => '',
                 'adviced' => '',
                'ferered' =>'',
                'remark' => '',
               
                );
        $data = array_merge($data, $insertArray);
        extract($data);
        $data1 = array(
               'bloodglucose' =>$bloodglucose ,
                'heamogram' =>$heamogram,
                'creatine' => $creatine,
                'urea' => $urea,
                'sgot' =>$sgot,
                'sgpt' => $sgpt,
                 'adviced' => $adviced,
                'ferered' =>$ferered,
                'remark' => $remark, 
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
        if($query->num_rows()>=1)
        {
                $result = $query->first_row();
        }

        return $result;
    }
    
    
    public function getPatientList($rowCount,$sort,$current,$searchPhrase='') {
     

        $start=($current * $rowCount) - ($rowCount);
        $limit=$start + $rowCount ;
        
        $this->db->select('id,registration_no, CONCAT(fname, " ",lanme) fname,dob, gender, mobile,regitrationdate,address');

        $this->db->limit($limit, $start);
        if($searchPhrase!='')
        {
            $this->db->where("fname LIKE '%".$searchPhrase."%' OR lanme LIKE '%".$searchPhrase."%' OR mobile LIKE '%".$searchPhrase."%'");
        }
        if(isset($sort))
        {
            foreach ($sort as $key => $value) 
            {
                $this->db->order_by($key, $value);
            }
        }

        $query = $this->db->get('patient_master');
        $result = $query->result();

        return $result;
    }
}
        