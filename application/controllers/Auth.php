<?php

class Auth extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page Himatif Election';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/index', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$nim = $this->input->post('nim');
			$password = $this->input->post('password');

			$where = [
				'nim' => $nim
			];

			$user = $this->auth_model->getUserbyNim('users', $where);
			//jika user ada
			if ($user) {
				//jika user aktif
				if ($user['is_active'] == 1) {
					//cek password
					if (password_verify($password, $user['password'])) {
						//password benar
						$data = [
							'nim' => $user['nim'],
							'role_id' => $user['role_id']
						];

						$this->session->set_userdata($data);
						//cek role id
						if ($user['role_id'] == 1) {
							redirect('admin');
						} else {
							redirect('user');
						}
					} else {
						//password salah
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
						redirect('auth');
					}
				} else {
					//user tidak aktif
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Your account is not active!!! please wait admin active it! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You dont have account,please register! </div>');
				redirect('auth');
			}
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('angkatan', 'Majors', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password-confirm]');
		$this->form_validation->set_rules('password-confirm', 'Password', 'required|trim|min_length[8]|matches[password]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration Page Himatif Election';
			$data['user'] = $this->auth_model->getGenerations();
			$data['major'] = $this->auth_model->getMajors();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$data = [
				'role_id' => 2,
				'nim' => htmlspecialchars($this->input->post('nim'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_active' => 1,
				'created_at' => time()
			];
			$data2 = [
				'name' => htmlspecialchars($this->input->post('name'), true),
				'email' => htmlspecialchars($this->input->post('email'), true),
				'generation_id' => htmlspecialchars($this->input->post('angkatan'), true),
				'major_id' => 1,
				'image' => 'default.jpg',
				'hp'    => htmlspecialchars($this->input->post('no_telp'), true),
				'address'   => htmlspecialchars($this->input->post('alamat'), true),
				'created_at' => time(),
				//'update_at' => time(),
			];

			$this->auth_model->insertDB('users', $data);
			$this->auth_model->insertDB('user_details', $data2);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Registration Success!!! Please Login!!!</div>');
			redirect('auth');
		}
	}
}
