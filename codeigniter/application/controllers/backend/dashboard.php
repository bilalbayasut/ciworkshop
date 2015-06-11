<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	private $data=array();

	public function __construct()
	{
		parent::__construct();
            // Your own constructor code
		$this->data['header']=$this->load->view('template/dashboard_header','',TRUE);
		$this->data['footer']=$this->load->view('template/dashboard_footer','',TRUE);
		
	}

	public function index()
	{
		$data['title']="Dashboard";
		$this->data['content']=$this->load->view('backend/dashboard_status',$data,TRUE);
		$this->load->view('backend/dashboard',$this->data);
	}

	public function manage_user(){
		$result=array();

		$this->load->model('login_model');

		$result=$this->login_model->get('','user');

		$data['users'] = $result;
		$data['title']="Manage User";
		$this->data['content']=$this->load->view('backend/manage_user',$data,TRUE);
		$this->load->view('backend/dashboard',$this->data);
	}

	public function deleteUser($user_id=0)
	{
		//print_r($this->uri->segment(4)); die();
		$this->load->model('login_model');

		$data=array('user_id'=>$user_id);

		$result=$this->login_model->delete($data,'user');
		if($result)
		{
			$this->session->set_flashdata('operation_success', 'Operation is success');
			redirect('backend/dashboard/manage_user');
		}
		else
		{

			$this->session->set_flashdata('operation_fail', 'Operation is failed');
			redirect('backend/dashboard/manage_user');
		}
	}

	public function editUserForm($user_id=0)
	{
		$data['title']="Edit User";

		$this->load->model('login_model');

		$where=array('user_id'=>$user_id);
		$user=$this->login_model->getBy($where,'user');
		$data['user']=$user[0];
		$this->data['content']=$this->load->view('backend/edit_user',$data,TRUE);
		$this->load->view('backend/dashboard',$this->data);

	}

	public function editUser(){
		$data=array(
			'user_email'=>$this->input->post('user_email'),
			'user_password'=>md5($this->input->post('user_password')),
			'user_firstname'=>$this->input->post('user_firstname'),
			'user_lastname'=>$this->input->post('user_lastname')
			);

		//check password
		if(empty($data['user_password']))
			unset($data['user_password']);

		$user_id=$this->input->post('user_id');
		$this->load->model('login_model');
		
		if($this->login_model->updateUser($data,$user_id))
		{
			$this->session->set_flashdata('operation_success', 'Operation is success');
			redirect('backend/dashboard/manage_user');
		}
		else
		{

			$this->session->set_flashdata('operation_fail', 'Operation is failed');
			redirect('backend/dashboard/manage_user');
		}
	}

}
