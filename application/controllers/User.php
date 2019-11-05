<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Auth_Model", "auth");
		$this->load->model("User_Model", "user");
	}

	public function index()
	{
		$data['title'] = "Daftar User";
		$data['user_data'] = getUserData();

		$data['users'] = $this->user->getUsers();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('users/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function create()
	{ }

	public function edit()
	{ }

	public function delete()
	{ }
}
