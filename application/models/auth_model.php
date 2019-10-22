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
		$this->db->insert('users', $data['user']);
		$this->db->insert('user_details', $data['user_detail']);

		return $this->db->affected_rows();
	}
}
