<?php

class Candidate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{ }

	public function create()
	{ }

	public function edit()
	{ }

	public function delete()
	{ }
}
