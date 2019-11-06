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
	{
		$data['title'] = "Menambahkan User";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('users/create', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function edit($id)
	{
		$data['title'] = "Menambahkan User";
		$data['user_data'] = getUserData();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('users/create', $data);
		$this->load->view('layouts/dashboard_footer', $data);
	}

	public function delete($id = null)
	{
		$user_id = $this->input->post('id');
		$delete = $this->user->delete($user_id);

		if ($id == null || !$delete) {
			$data['title'] = "404 Error Not Found";
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('errors/pages/404');
			$this->load->view('layouts/dashboard_footer');
			return;
		}

		$this->session->set_flashdata('message', '<script>swal("Good Job", "You clicked the button!", "success")</script>');
		redirect(base_url('users'));
	}

	public function logs($id = null)
	{ }

	public function feedbacks()
	{ }
}
