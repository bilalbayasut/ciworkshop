<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	private $CI;

	public function __construct()
	{
		$this->CI=& get_instance();
		$this->CI->load->model('login_model');
	}

	public function authenticate($data=array())
	{

		$tablename="user";
		$result=array();

		$result=$this->CI->login_model->get($data,$tablename);
		
		/*
		print_r($result);
		echo "<br/>";
		echo "size of array is ";
		print_r(sizeof($result));
		die();
		*/

		if(sizeof($result)>0)
		{
			//user exist
			return true;
		}
		else
		{
			//user not exist
			return false;
		}
		
	}

	public function is_logged_in(){
		$user_info=array();
		$user_info=$this->CI->session->all_userdata();
		if($user_info['user_email'])
			return true;
		else
			return false;
	}
}
