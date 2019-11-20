<?php

class Election extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Election_Model", "elections");
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

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('mulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('akhir', 'Waktu Berakhir', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi' ,'required|min_length[10]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('elections/create', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->_create()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil menambahkan data</div>');
			 } else { 
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan data</div>');
			 }

			 redirect('admin/elections');
		}
	}

	protected function _create()
	{ 
		$title = $this->input->post('judul', true);
		$start = $this->input->post('mulai', true);
		$end = $this->input->post('akhir', true);
		$image = doUploadImage('elections');
		$description = $this->input->post('deskripsi', true);

		# candidates
		$num = $this->input->post('num_candidates', true);
		$candidates = $this->input->post('nim_candidate');

		$election = [
			'title' => $title,
			'description' => $description,
			'image' => $image,
			'start_at' => $start,
			'end_at' => $end,
			'status' => 0,
		];
	
		return $this->elections->create($election);
	}

	public function edit($id)
	{
		$data['title'] = "Menambahkan Pemilihan";
		$data['title_header'] = "Manajemen Pemilihan";

		$data['user_data'] = getUserData();
		$data['election'] = $this->elections->getElection($id);

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('mulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('akhir', 'Waktu Berakhir', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi' ,'required|min_length[10]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('elections/edit', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if($this->_update()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil memperbaharui data</div>');
				redirect('admin/elections');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbaharui data</div>');
				redirect('admin/election/'.$id.'/edit');
			}
		}
	}

	protected function _update() {
		$id = $this->input->post('election_id', true);
		$title = $this->input->post('judul', true);
		$start = $this->input->post('mulai', true);
		$end = $this->input->post('akhir', true);
		$description = $this->input->post('deskripsi', true);
				
		if(!empty($_FILES['image']['tmp_name'])) {
			$img_name = doUploadImage('elections');
		} else {
			$img_name = $this->input->post('image_hidden', true);
		}

		$election = [
			'title' => $title,
			'start_at' => $start,
			'end_at' => $end,
			'image' => $img_name,
			'description' => $description,
			'updated_at' => date('Y-m-d H:i:s', time()),
		];

		return $this->elections->update($election, $id);
	}

	public function delete($id)
	{
		$election_id = $this->input->post('id');
		$election = $this->elections->getElection($election_id);

		deleteImage("elections", $election->image);
		$this->elections->delete($election_id);

		if ($id == null) {
			$data['title'] = "404 Error Not Found";
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('errors/pages/404');
			$this->load->view('layouts/dashboard_footer');
			return;
		}

		redirect(base_url('admin/candidates'));
	}
}
