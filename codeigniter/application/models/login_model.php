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

        //TO PRINT QUERY SYNTAX FOR DEBUGGING
        //print_r($this->db->queries); die();

        return $query->result();

    }


    public function delete($data=array(),$tablename=""){

        foreach($data as $key=>$value)
        {   

            $this->db->where($key, $value);
        }
        
        if($this->db->delete($tablename))
            return true;
        else
            return false;
    }

//sama dengan atas
    public function deleteUser($user_id){
        $this->db->where('user_id', $user_id);
        if($this->db->delete('user'))
            return true;
        else
            return false;
    }

    public function getBy($data=array(),$tablename="")
    {
      $this->db->select('*');
      $this->db->from($tablename);

      if(!empty($data))
      {
       foreach($data as $key=>$value)
       {   

        $this->db->where($key, $value);
    }

}


$query = $this->db->get();

        //TO PRINT QUERY SYNTAX FOR DEBUGGING
        //print_r($this->db->queries); die();

return $query->result();

} 

public function updateUser($data,$user_id)
{

    $this->db->where('user_id', $user_id);
    if($this->db->update('user', $data))
        return true;
    else
        return false;
}
}