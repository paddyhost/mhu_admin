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
	
  
  




  public function dashboard()
    {
    
        $this->load->view('dashboard');
        
                
    }

      public function getPatientList()
    {
     

     $current=  $this->input->get_post('current');
     $rowCount = $this->input->get_post('rowCount');
     $sort = $this->input->get_post('sort');
     $searchPhrase=  $this->input->get_post('searchPhrase');

        $data = $result = array();
        $Patient=$this->patient_model->getPatientList($rowCount,$sort,$current,$searchPhrase);


        $data["current"]=$current;
        $data["rowCount"]=$rowCount;
        $data["rows"]=$Patient;
        $data["total"]=count($this->patient_model->getPatientallList());
        print_r(json_encode($data));
    }
    public function patientcard()
    {
        $this->load->view('patient_card');   
    }
}
