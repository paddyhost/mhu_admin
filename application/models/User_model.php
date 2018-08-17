<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client_Model
 *
 * @author Geneka Technologies2
 */
class User_model extends CI_Model {

    public function __construct() 
    {
        $this->load->database();
    }


    public function isUserExist($mobile, $password)
    {

       $this->db->where('mobile', $mobile);
       $this->db->where('password', $password);
       $query = $this->db->get('user_table');
       $result = $query->result();
        //Free Memory for resource id
       

        $query->free_result();

        return $result;
    }


}
        