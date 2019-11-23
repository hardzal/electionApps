<?php

class Vote_Model extends CI_Model
{
	private const TABLE_NAME = 'votes';

	public function find($data)
	{
		return $this->db->get_where($this::TABLE_NAME, $data);
	}

	public function create($data)
	{
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function getElection($election_id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['election_id' => $election_id]);
	}
}
