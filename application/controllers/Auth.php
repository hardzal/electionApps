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
		echo "Hello!";
		echo "<br><a href='" . base_url() . "auth/login'>Login</a> || <a href='" . base_url() . "auth/signup'>Signup</a>";
	}

	public function login()
	{
		if ($this->session->userdata('email')) {
			redirect('home');
		}

		// Validation
		$this->form_validation->set_rules('email', 'Email', 'required|trim|email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		// login form
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login Page";
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

		$data['title'] = "Sign Up Page";

		// validation
		$this->form_validation->required('nim', 'NIM', 'required|trim|max_length[10]|min_length[10]');
		$this->form_validation->required('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->required('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]');
		$this->form_validation->required('confirm_password', 'Confirm Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/signup');
			$this->load->view('layouts/auth_footer');
		} else {
			$user = [
				'user' => [
					'nim' => $this->input->post('nim', true),
					'password' => $this->input->post('password', true)
				],
				'user_detail' => [
					
				],
			];

			if ($this->auth->signupUser($user)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! your account has been created. Please activate your account!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Failed registered accound. Please contact admin!</div>');
			}

			redirect('auth');
		}
	}

	private function _signup()
	{ }

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
	{ }

	public function blocked()
	{ }
}
