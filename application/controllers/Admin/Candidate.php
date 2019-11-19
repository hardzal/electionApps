<?php

class Candidate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Candidate_Model", "candidates");
	}

	public function index()
	{
		$data['title'] = "Daftar Kandidat";
		$data['title_header'] = "Manajemen Kandidat";
		$data['user_data'] = getUserData();
		$data['candidate_data'] = $this->candidates->getCandidates();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('candidates/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function getCandidateByNim()
	{
		if ($this->input->get('term')) {
			$nim = $this->input->get('term', true);

			$result = $this->candidates->findCandidateByNim($nim);

			if (count($result)) {
				foreach ($result as $hasil) {
					$result_arr[] = array(
						'id' => $hasil['id'],
						'label' => $hasil['nim'],
						'nama' => $hasil['name'],
					);
				}

				echo json_encode($result_arr);
			} else {
				echo json_encode(array(
					"message" => "No data"
				));
			}
		}
	}

	public function create()
	{
		$data['title'] = "Menambahkan Kandidat";
		$data['title_header'] = "Manajemen Kandidat";
		$data['user_data'] = getUserData();
		$data['elections'] = $this->election->getElections();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('user_id', 'User ID', 'required|trim|is_numeric');
		$this->form_validation->set_rules('visi', 'visi', 'required|trim');
		$this->form_validation->set_rules('misi', 'misi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('candidates/create', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->_create()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil menambahkan data</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan data</div>');
			}

			redirect('admin/candidates');
		}
	}

	protected function _create()
	{
		$election_id = $this->input->post('election_id', true);
		$user_id = $this->input->post('user_id', true);
		$visi = $this->input->post('visi', true);
		$misi = $this->input->post('misi', true);

		$img_name = doUploadImage('candidates');

		$candidate = [
			'election_id' => $election_id,
			'user_id' => $user_id,
			'image' => $img_name,
			'visi' => $visi,
			'misi' => $misi
		];

		if (!$img_name) {
			return false;
		}

		return $this->candidates->create($candidate);
	}

	public function edit($id)
	{
		$data['title'] = "Memperbaharui Kandidat";
		$data['title_header'] = "Manajemen Kandidat";
		$data['user_data'] = getUserData();
		$data['candidate'] = $this->candidates->getCandidates($id);
		$data['elections'] = $this->election->getElections();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('election_id', 'Election', 'required');
		$this->form_validation->set_rules('user_id', 'User ID', 'required|trim|is_numeric');
		$this->form_validation->set_rules('image', 'Image', 'required');
		$this->form_validation->set_rules('visi', 'visi', 'required|trim');
		$this->form_validation->set_rules('misi', 'misi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('candidates/edit', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->_update()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil memperbaharui data</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menghapus data</div>');
			}

			redirect('admin/candidates');
		}
	}

	protected function _update()
	{
		$candidate_id = $this->input->post('candidate_id', true);
		$election_id = $this->input->post('election_id', true);
		$user_id = $this->input->post('user_id', true);
		$visi = $this->input->post('visi', true);
		$misi = $this->input->post('misi', true);

		if (!empty($_SESSION['img']['tmp_name'])) {
			$img_name = doUploadImage('candidates');
		} else {
			$img_name = $this->input->post("image_hidden", true);
		}

		$candidate = [
			'election_id' => $election_id,
			'user_id' => $user_id,
			'image' => $img_name,
			'visi' => $visi,
			'misi' => $misi,
			'updated_at' => date('d-m-Y H:i:s', time())
		];

		if (!$img_name) {
			return false;
		}

		return $this->candidates->update($candidate, $candidate_id);
	}

	public function delete($id = null)
	{
		$candidate_id = $this->input->post('id');
		$candidate = $this->candidates->getCandidate($candidate_id);

		$delete_image = deleteImage(FCPATH . "storage\candidates\\", $candidate->image);
		$delete = $this->candidates->delete($candidate_id);

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
