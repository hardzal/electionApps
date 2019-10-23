<?php

class Home extends CI_Controller
{
	public function __construct()
	{ }
	public function index()
	{
		echo "Hello, this is homepage!";
		echo "<a href='" . base_url('auth/logout') . "'>Logout</a>";
	}
}
