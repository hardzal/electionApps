<?php

class Auth_Model extends CI_Model
{
	public function checkUser($nim)
	{
		$user = $this->db->get_where('users', ['nim' => $nim])->row_array();

		return $user;
	}

	public function signupUser($data)
	{
		$this->db->trans_start();
		$this->db->insert('users', $data['user']);

		$last_user_id = $this->db->insert_id();

		$user_detail = [
			'user_id' => $last_user_id,
			'name' => $data['detail']['name'],
			'hp' => $data['detail']['hp'],
		];

		$this->db->insert('user_details', $user_detail);

		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
		}
		return $this->db->trans_complete();;
	}

	public function insertToken($user_token)
	{
		$this->db->insert('user_token', $user_token);

		return $this->db->affected_rows();
	}
}
