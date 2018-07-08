<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 public function __construct() {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->model('patient_model');

     
        // Your own constructor code
    }
	
	public function index(){
		 $this->load->view('index');
	
	}

		public function login()
	{

			$password= $this->input->get_post('password');
			$username= $this->input->get_post('username');
			//$password = 'user@123'; $username = '9975294782';
			$client = $this->user_model->isUserExist($username, $password);
			if (count($client) == 1) 
            {
            	$this->session->set_userdata("user" ,$client );
				redirect(base_url('admin/dashboard'), 'refresh');
            }
            else 
             {
 	  			 redirect(base_url('Welcome/index'));
             }


	}
		public function logout()
	{

			$this->session->unset_userdata('user');
         
 	  			 redirect(base_url('Welcome/index'));

           


	}

	

}
