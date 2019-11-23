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
		if ($this->session->userdata('role_id') != 1) {
			redirect('dashboard/candidate');
		}

		$data['title'] = "Admin Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('admin/index');
		$this->load->view('layouts/dashboard_footer');
	}

	public function candidate()
	{
		if ($this->session->userdata('role_id') != 2) {
			redirect('member');
		}

		$data['title'] = "Candidate Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('candidate/index');
		$this->load->view('layouts/dashboard_footer');
	}

	public function member()
	{
		if ($this->session->userdata('role_id') != 3) {
			redirect('auth');
		}

		$data['title'] = "Member Dashboard";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('member/index');
		$this->load->view('layouts/dashboard_footer');
	}
}
