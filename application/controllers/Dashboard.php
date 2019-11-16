<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Auth_Model', 'auth');
	}

	public function index()
	{
		$data['title'] = "Admin Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('admin/index');
		$this->load->view('layouts/dashboard_footer');
	}

	public function settings()
	{ }

	public function logs()
	{ }
}
