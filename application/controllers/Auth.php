<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_Model', 'auth');
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('email')) {
			redirect('home');
		}

		// Validation
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		// login form
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Halaman Masuk";
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth_footer');
		} else {
			// login process
			$this->_login();
		}
	}

	private function _login()
	{
		$nim = $this->input->post('nim', true);
		$password = $this->input->post('password', true);

		$user = $this->auth->checkUser($nim);

		if ($user) {
			if ($user['is_active']) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'nim' => $user['nim'],
						'role_id' => $user['role_id']
					];

					// set session
					$this->session->set_userdata($data);

					// check role
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						redirect('candidate');
					} else if ($user['role_id'] == 3) {
						redirect('member');
					} else {
						$this->session->unset_userdata('nim');
						$this->session->unset_userdata('role_id');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong password!</div>');
					redirect('auth');
				}
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">This email not registered!</div>');
			redirect('auth');
		}
	}

	public function signup()
	{
		if ($this->session->userdata('nim')) {
			redirect('home');
		}

		$data['title'] = "Halamana Pendaftaran";
		// 0878-0850-5477

		// validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('hp', 'No HP', 'required|trim|max_length[15]|min_length[12]');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|max_length[9]|min_length[9]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/signup');
			$this->load->view('layouts/auth_footer');
		} else {
			$this->_signup();
		}
	}

	private function _signup()
	{
		$user = [
			'user' => [
				'role_id' => 3,
				'nim' => $this->input->post('nim', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'is_active' => 0,
			],
			'detail' => [
				'name' => $this->input->post('nama', true),
				'hp' => $this->input->post('hp', true),
			],
		];

		if ($this->auth->signupUser($user)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! your account has been created. Please activate your account!</div>');
			redirect('auth/login');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Failed registered accound. Please contact admin!</div>');
			redirect('auth/signup');
		}
	}

	private function _sendEmail()
	{ }

	public function verify()
	{ }

	public function forgotPassword()
	{ }

	public function resetPassword()
	{ }

	public function changePassword()
	{ }

	public function logout()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-primary">You\'ve been logout.</div>');
		redirect('auth');
	}

	public function blocked()
	{ }
}
