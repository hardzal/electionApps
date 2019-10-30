<?php

class Auth_Model extends CI_Model
{
	public function checkUser($nim)
	{
		return $this->db->get_where('users', ['nim' => $nim])->row_object();
	}

	public function getUser($data)
	{
		return $this->db->get_where('users', $data)->row_object();
	}

	public function deleteUser($email)
	{
		$this->db->delete('users', ['email' => $email]);
		return $this->db->affected_rows();
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

	public function activatedUser($email)
	{
		$this->db->set('is_active', 1);
		$this->db->where('email', $email);
		$this->db->update('users');

		return $this->db->affected_rows();
	}

	public function checkActiveEmail($email)
	{
		$user = $this->db->get_where('users', [
			'email' => $email,
			'is_active' => 1
		])->row_array();

		return $user;
	}

	public function insertToken($user_token)
	{
		$this->db->insert('user_token', $user_token);

		return $this->db->affected_rows();
	}

	public function getToken($token)
	{
		return $this->db->get_where('user_token', ['token' => $token])->row_object();
	}

	public function deleteToken($email)
	{
		$this->db->delete('user_token', ['email' => $email]);
		return $this->db->affected_rows();
	}
}
