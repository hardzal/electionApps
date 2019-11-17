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
		$query = "SELECT 
			elections.*, 
			COUNT(candidates.user_id) as total
		FROM 
			elections 
			LEFT JOIN candidates 
			ON elections.id = candidates.election_id
			LEFT JOIN user_details
			ON candidates.user_id = user_details.user_id";

		return $this->db->query($query)->result_object();
	}

	public function getElection()
	{
		$query = "";

		// return $this->db->query($query)->result_object();
	}

	public function update($data)
	{ }

	public function delete()
	{ }
}
