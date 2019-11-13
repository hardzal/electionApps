<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('nim')) {
			redirect('/dashboard');
		}
		$this->load->library('form_validation');
	}

	public function index()
	{
		// Validation
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		// login form
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Halaman Masuk";
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth_footer');
			print_r($this->input->post);
		} else {
			// login process
			$this->_login();
		}
	}

	public function login()
	{
		redirect('auth');
	}

	private function _login()
	{
		$nim = $this->input->post('nim', true);
		$password = $this->input->post('password', true);

		$user = $this->auth->getUser(['nim' => $nim]);

		if ($user) {
			if ($user->is_active) {
				if (password_verify($password, $user->password)) {
					$data = [
						'id' => $user->id,
						'nim' => $user->nim,
						'role_id' => $user->role_id
					];

					// set session
					$this->session->set_userdata($data);

					// check role
					if ($user->role_id == 1) {
						redirect('admin');
					} else if ($user->role_id == 2) {
						redirect('candidate');
					} else if ($user->role_id == 3) {
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

		$data['title'] = "Halaman Pendaftaran";

		// validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('hp', 'No HP', 'required|trim|max_length[15]|min_length[12]');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|max_length[9]|is_unique[users.nim]|min_length[9]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => "Email sudah terdaftar!",
			'valid_email' => "Email tidak valid!",
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]', [
			'matches' => "Password tidak sama!",
		]);
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]', [
			'matches' => "Password tidak sama!",
		]);

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
		$email = $this->input->post('email', true);
		$user = [
			'user' => [
				'role_id' => 3,
				'nim' => $this->input->post('nim', true),
				'email' => $email,
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'is_active' => 0,
			],
			'detail' => [
				'name' => $this->input->post('nama', true),
				'hp' => $this->input->post('hp', true),
			],
		];
		$user_token = $this->userToken($email, $this->getToken());
		$this->auth->insertToken($user_token);

		if ($this->auth->signupUser($user)) {
			if ($this->_sendEmail($user_token['token'], 'verify')) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! your account has been created. Please activate your account!</div>');
				redirect('auth/login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Failed send email accound. Please contact admin!</div>');
				redirect('auth/signup');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Failed registered accound. Please contact admin!</div>');
			redirect('auth/signup');
		}
	}
	private function userToken($email, $token)
	{
		$user_token = [
			'email' => $email,
			'token' => $token,
			'created_at' => date('Y-m-d H:i:s', time())
		];

		return $user_token;
	}

	private function getToken()
	{
		return base64_encode(random_bytes(32));
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'langkahkita01@gmail.com',
			'smtp_pass' => 'qwerty1070',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('langkahkita01@gmail.com', 'Himatif Admin');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification | Himatif Admin');
			$this->email->message('Click this link to verify your account : <a href="' . base_url('auth/verify?email=') . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password | Himatif Admin');
			$this->email->message('Click this link to reset your password account : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			return false;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->auth->getUser(['email' => $email]);

		if ($user) {
			$user_token = $this->auth->getToken($token);

			if ($user_token) {
				if (time() - strtotime($user_token->created_at) < (60 * 60 * 24)) {
					$this->auth->activatedUser($email);
					$this->auth->deleteToken($email);

					$this->session->set_userdata('verified_email', $email);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! your account has been created ' . $email . ' has been activated</div>');
					redirect('auth/login');
				} else {
					$this->auth->deleteUser($email);
					$this->auth->deleteToken($email);

					$this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Token Expired!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Token failed!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Email not registered!</div>');
			redirect('auth');
		}
	}

	public function forgotPassword()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$data['title'] = "Forgot Password";

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('layouts/auth_footer');
		} else {
			$email = $this->input->post('email', true);

			if ($this->auth->checkActiveEmail($email)) {
				$user_token = $this->userToken($email, $this->getToken());
				$this->auth->insertToken($user_token);

				$this->_sendEmail($user_token['token'], 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success">Please check your email to reset your password.</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Email is not registered or activated</div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->auth->getUser(['email' => $email]);

		if ($user) {
			$user_token = $this->auth->getToken($token);

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Reset password failed! Token invalid.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Reset password failed!. Wrong email.');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$data['title'] = "Change Password";
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() ==  FALSE) {
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('layouts/auth_footer');
		} else {
			$password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			if ($this->auth->changePassword($password, $email)) {
				$this->session->unset_userdata('reset_email');
				$this->session->set_flashdata('message', '<div class="alert alert-success">Password has been changed!. Please login</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Failed change password!. Please contact admin</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-primary">You\'ve been logout.</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = "403 Access Blocked";
		$this->load->view('layouts/header', $data);
		$this->load->view('auth/blocked', $data);
		$this->load->view('layouts/footer');
	}
}
