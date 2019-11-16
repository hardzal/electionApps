<?php

class Candidate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Candidate_Model", "candidates");
		$this->load->helper('election');
	}

	public function index()
	{
		$data['title'] = "Daftar Kandidat";
		$data['title_header'] = "Manajemen Kandidat";
		$data['user_data'] = getUserData();
		$data['candidate_data'] = $this->candidates->getCandidates();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('candidates/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function create()
	{
		$data['title'] = "Menambahkan Kandidat";
		$data['title_header'] = "Manajemen Kandidat";
		$data['user_data'] = getUserData();
		$data['candidate_data'] = $this->candidates->getCandidates();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('candidates/create', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function edit()
	{ }

	public function delete()
	{ }
}
