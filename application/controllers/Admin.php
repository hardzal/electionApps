<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "Hello, Admin?";
		echo "<a href='" . base_url('auth/logout') . "'>Logout</a>";
	}
}
