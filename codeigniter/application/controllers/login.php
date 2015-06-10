<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $data=array();

	public function __construct()
	{
		parent::__construct();
            // Your own constructor code
		$this->data['header']=$this->load->view('template/header','',TRUE);
		$this->data['footer']=$this->load->view('template/footer','',TRUE);
		
	}

	public function index()
	{
		//$this->data['variable']=$variableDariDatabase;


		$this->load->view('login',$this->data);
	}

	public function doLogin(){


		$this->load->library('form_validation');

		$config = array(
			array(
				'field'   => 'email', 
				'label'   => 'Email', 
				'rules'   => 'required|valid_email'
				),
			array(
				'field'   => 'password', 
				'label'   => 'Password', 
				'rules'   => 'required'
				)
			);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() != TRUE)
		{
			//if validation fails
			$this->load->view('login',$this->data);
		}
		else
		{

			//load auth library
			$this->load->library('auth');

			// if validation success
			$data=array(
				'user_email'=>$this->input->post('email'),
				'user_password'=>md5($this->input->post('password'))
				);

			if($this->auth->authenticate($data))
			{
				//login is success

				$this->session->set_flashdata('login_success', 'You are logged in');
				redirect('login/index');
			}
			else
			{
				//login is fail
				$this->session->set_flashdata('login_fail', 'Sorry, Login is failed');
				redirect('login/index');
			}

			
		}

	}

	public function test(){

	}

}
