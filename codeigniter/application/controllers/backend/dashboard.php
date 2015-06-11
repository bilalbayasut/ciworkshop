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
		$data['title']="Manage User";
		$this->data['content']=$this->load->view('backend/manage_user',$data,TRUE);
		$this->load->view('backend/dashboard',$this->data);
	}

}
