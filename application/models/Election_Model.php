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

	public function getElection()
	{
		$query = "";

		// return $this->db->query($query)->result_object();
	}

	public function create($data) {
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function update($data)
	{ }

	public function delete($id)
	{ }
}
