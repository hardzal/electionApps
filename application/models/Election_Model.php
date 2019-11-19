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

	public function create($data) {
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
