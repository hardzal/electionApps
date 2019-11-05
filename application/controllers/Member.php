<?php

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		echo "Hello, Member!";
		echo "<a href='" . base_url('auth/logout') . "'>Logout</a>";
	}
}
