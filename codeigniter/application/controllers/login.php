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
		$this->load->model('login_model');
		
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
				
				//fetch the user data
				$result=array();
				$result=$this->login_model->get($data,'user');
			
				//create session for the logged in user
				$session_user = array(
					'user_id'  => $result[0]->user_id,
					'user_email'     => $result[0]->user_email,
					'user_firstname' => $result[0]->user_firstname,
					'user_lastname' =>$result[0]->user_lastname
					);

				$this->session->set_userdata($session_user);

				$this->session->set_flashdata('login_success', 'You are logged in');
				redirect('backend/dashboard');
			}
			else
			{
				//login is fail
				$this->session->set_flashdata('login_fail', 'Sorry, Login is failed');
				redirect('login/index');
			}

			
		}

	}

	public function doLogout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
