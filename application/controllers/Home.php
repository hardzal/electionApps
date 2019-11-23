<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function elections()
	{ }

	public function election()
	{ }

	public function candidates()
	{ }

	public function candidate()
	{ }
}
