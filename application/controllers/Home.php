<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Election_model', 'election');
		$this->load->model('Candidate_model', 'candidate');
		$this->load->model('Vote_model', 'vote');
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function elections()
	{
		$data['title'] = "Elections";
		$data['title_page'] = "Election List";

		$data['user_data'] = getUserData();

		$data['elections'] = $this->election->getElections();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('pages/elections/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function election($id)
	{
		$data['title'] = "Detail Election";
		$data['user_data'] = getUserData();

		$data['election'] = $this->election->getCandidatesElection($id);

		$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('candidate_id', 'Candidate', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/dashboard_header', $data);
			$this->load->view('layouts/dashboard_sidebar', $data);
			$this->load->view('pages/elections/detail', $data);
			$this->load->view('layouts/dashboard_footer');
		} else {
			if ($this->_vote($id)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Success create data</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Success create data</div>');
			}

			redirect('elections');
		}
	}

	private function _vote($election_id)
	{
		$user_id = $this->input->post('user_id', true);
		$candidate_id = $this->input->post('candidate_id', true);
		$election_id = filter_var($election_id, FILTER_SANITIZE_NUMBER_INT);

		$data = [
			'user_id' => $user_id,
			'candidate_id' => $candidate_id,
			'election_id' => $election_id,
			'created_at' => date("Y-m-d H:i:s", time())
		];

		return $this->vote->create($data);
	}

	public function candidates()
	{
		$data['title'] = "Candidates";
		$data['title_page'] = "Candidate List";
		$data['user_data'] = getUserData();

		$data['candidates'] = $this->candidate->getCandidates();

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('pages/candidates/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function candidate($id)
	{
		$data['title'] = "Detail Candidate";
		$data['user_data'] = getUserData();

		$data['candidate'] = $this->candidate->getCandidate($id);

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('pages/pages/index', $data);
		$this->load->view('layouts/dashboard_footer');
	}

	public function votes($election_id)
	{
		$data['title'] = "Vote Result";
		$data['user_data'] = getUserData();

		$data['votes'] = $this->vote->getElection($election_id);
		$data['candidates'] = $this->election->getCandidatesElection($election_id);

		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_sidebar', $data);
		$this->load->view('pages/elections/votes', $data);
		$this->load->view('layouts/dashboard_footer');
	}
}
