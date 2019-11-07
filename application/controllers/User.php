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
		$this->load->model('Role_Model', 'role');

		$data['title'] = "Menambahkan User";
		$data['user_data'] = getUserData();
		$data['roles'] = $this->role->getRoles();

		$this->form_validation->set_rules('nama', 'required|trim|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric');
		$this->form_validation->set_rules('hp', 'No Hp', 'numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('role_id', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('users/create', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->addUser()) {
				$this->session->set_flashdata('message', "<script>alert('Berhasil menambahkan user!');</script>");
			} else {
				$this->session->set_flashdata('message', "<script>alert('Gagal menambahkan user!!!');</script>");
			}

			redirect('users');
		}
	}

	private function addUser()
	{
		$nama = $this->input->post('nama', true);
		$email = $this->input->post('email', true);
		$nim = $this->input->post('nim', true);
		$hp = $this->input->post('hp', true);
		$password = $this->input->post('password', true);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$role_id = $this->input->post('role_id', true);

		$user = array(
			'user' => [
				'role_id' => $role_id,
				'nim' => $nim,
				'email' => $email,
				'password' => $password,
				'is_active' => 0
			],
			'userdetail' => [
				'name' => $nama,
				'hp' => $hp,
			]
		);

		if ($this->user->create($user)) {
			return true;
		}

		return false;
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
