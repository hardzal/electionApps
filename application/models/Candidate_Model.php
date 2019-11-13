<?php

class Candidate_Model extends CI_Model
{
	private const TABLE_NAME = 'candidates';

	public function __construct()
	{
		// $this->load->model('Election_Model', 'election');
	}

	public function getCandidates()
	{
		$query = "SELECT 
				candidates.*,
				user_details.name,
				users.nim,
				elections.title
			FROM candidates 
				LEFT JOIN users
			ON candidates.user_id = users.id
				JOIN user_details
			ON users.id = user_details.user_id
				JOIN elections 
			ON elections.id = candidates.election_id";

		return $this->db->query($query)->result_object();
	}

	public function getCandidate()
	{ }

	public function update()
	{ }

	public function delete()
	{ }
}
