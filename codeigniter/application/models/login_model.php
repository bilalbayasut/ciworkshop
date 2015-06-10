<?php

class Login_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //param 1 is data, param 2 is table name
    function get($data=array(),$tablename=''){

        $this->db->select('*');
        $this->db->from($tablename);

        if(!empty($data))
        {
            //select with where
            $this->db->where($data); 

        }
        else
        {
            //select all
        }

        $query = $this->db->get();

        print_r($this->db->queries); die();

        return $query->result();

    }
}