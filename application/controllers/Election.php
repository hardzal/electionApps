<?php

class Election extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Election_Model", "elections");
		$this->load->helper('election');
	}

	public function index()
	{
		$data['title'] = "Daftar Pemilihan";
		$data['title_header'] = "Manajemen Pemilihan";

		$data['user_data'] = getUserData();
		$data['elections_data'] = $this->elections->getElections();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('elections/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function detail()
	{ }

	public function create()
	{ }

	public function edit()
	{ }

	public function delete()
	{ }
}
