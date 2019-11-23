<?php

class Election_Model extends CI_Model
{
	private const TABLE_NAME = 'elections';

	public function __construct()
	{
		$this->load->model('Candidate_Model', 'candidates');
	}

	public function getElections()
	{
		return $this->db->get($this::TABLE_NAME)->result_object();
	}

	public function getElection($id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['id' => $id])->row_object();
	}

	public function getCandidatesElection($id)
	{
		return $this->db
			->select("candidates.*, user_details.name, elections.title, elections.start_at, elections.end_at")
			->from($this::TABLE_NAME)
			->join('candidates', 'elections.id = candidates.election_id')
			->join('users', 'candidates.user_id = users.id')
			->join('user_details', 'user_details.user_id = users.id')
			->where('elections.id', $id)
			->get()
			->result_object();
	}

	public function create($data)
	{
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this::TABLE_NAME, $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this::TABLE_NAME, ['id' => $id]);
	}
}
