<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		//check the user authentication

         //if the user is not logged, then redirect them to login page
		if(!$this->auth->is_logged_in())
		{
			$this->session->set_flashdata('login_fail', 'Sorry, you are not authrozied to access this page');
				
			redirect('login');
		
		 }
	}

}
