<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Admin Dashboard";
		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('admin/index');
		$this->load->view('layouts/dashboard_footer');
	}
}
