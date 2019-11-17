<?php

class Candidate_Model extends CI_Model
{
	private const TABLE_NAME = 'candidates';

	public function __construct()
	{
		$this->load->model('Election_Model', 'election');
	}

	public function getCandidates($id = null)
	{
		$where = "";

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

		if ($id != null) {
			$where = " WHERE candidates.id = '" . $id . "'";

			$query .= $where;

			return $this->db->query($query)->row_object();
		}

		return $this->db->query($query)->result_object();
	}

	public function getCandidate($id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['id' => $id])->row_object();
	}

	public function findCandidateByNim($nim)
	{
		$query = "SELECT users.id, users.nim, user_details.name
					FROM users 
						INNER JOIN user_details
					ON users.id = user_details.user_id
						WHERE users.nim LIKE '%$nim%'
						AND users.id NOT IN (SELECT user_id FROM candidates)
					ORDER BY users.nim ASC
					LIMIT 10";

		return $this->db->query($query)->result_array();
	}

	public function create($data)
	{
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this::TABLE_NAME, $data, ['id' => $id]);
	}

	public function delete($candidate_id)
	{
		return $this->db->delete($this::TABLE_NAME, ['id' => $candidate_id]);
	}
}
