<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
		checkAccess(1);

		$data['title'] = "Admin Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('admin/index');
		$this->load->view('layouts/dashboard_footer');
	}

	public function candidate()
	{
		checkAccess(2);

		$data['title'] = "Candidate Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('candidate/index');
		$this->load->view('layouts/dashboard_footer');
	}

	public function member()
	{
		checkAccess(3);

		$data['title'] = "Member Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('member/index');
		$this->load->view('layouts/dashboard_footer');
	}
}
