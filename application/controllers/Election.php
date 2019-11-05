<?php

class Election extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Election_Model", "elections");
	}

	public function index()
	{
		echo "elections pages";
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
