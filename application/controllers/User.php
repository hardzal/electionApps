<?php

class User extends CI_Controller
{
	public function __construct()
	{ }

	public function index()
	{
		echo "Hello, User!";
		echo "<a href='" . base_url('auth/logout') . "'>Logout</a>";
	}
}
