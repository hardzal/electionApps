<?php

class Election extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Election_Model", "elections");
		$this->load->helper('election');
	}

	public function index()
	{
		$data['title'] = "Daftar Pemilihan";
		$data['title_header'] = "Manajemen Pemilihan";

		$data['user_data'] = getUserData();
		$data['elections_data'] = $this->elections->getElections();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('elections/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function detail()
	{
		$data['title'] = "Detail Pemilihan";
	}

	public function create()
	{
		$data['title'] = "Menambahkan Pemilihan";
		$data['title_header'] = "Manajemen Pemilihan";

		$data['user_data'] = getUserData();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('elections/create', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->_create()) {

			 } else { 
				 
			 }
		}
	}

	protected function _create()
	{ 

	}

	public function edit()
	{
		$data['title'] = "Menambahkan Pemilihan";
		$data['title_header'] = "Manajemen Pemilihan";

		$data['user_data'] = getUserData();
	}

	public function delete($id)
	{
		$election_id = $this->input->post('id');
		$election = $this->candidates->getCandidate($election_id);

		$delete_image = deleteImage(FCPATH . "storage\elections\\", $election->image);

		$delete = $this->elections->delete($election_id);

		if ($id == null) {
			$data['title'] = "404 Error Not Found";
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('errors/pages/404');
			$this->load->view('layouts/dashboard_footer');
			return;
		} else if (!$delete_image) {
			$this->session->set_flashdata('message', '<script>swal("Failed", "Failed delete image data", "error")</script>');
		} else if (!$delete) {
			$this->session->set_flashdata('message', '<script>swal("Error", "Can\'t delete data", "error")</script>');
		} else {
			$this->session->set_flashdata('message', '<script>swal("Good Job", "Success deleted data", "success")</script>');
		}

		redirect(base_url('admin/candidates'));
	}
}
