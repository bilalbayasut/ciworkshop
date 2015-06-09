<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
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
			$this->load->view('login');
		}
		else
		{
			// if validation success
				$data=array(
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password'))
			);

				//check if email and password is exist

				if($data['email']=='admin@admin.com' AND $data['password']==md5('admin')){

					$this->session->set_flashdata('login_success', 'You are logged in');
					redirect('login/index');
				}

		}

	


	}

}
