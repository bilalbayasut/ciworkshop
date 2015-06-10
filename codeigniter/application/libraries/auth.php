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
		print_r($result); die();
	}
}
