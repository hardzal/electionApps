<?php

class User_Model extends CI_Model
{
	private const TABLE_NAME = 'users';

	public function getUsers()
	{
		return $this->db
			->select('users.*, user_details.name, user_details.hp')
			->from($this::TABLE_NAME)
			->join('user_details', 'users.id = user_details.user_id', 'left')
			->get()
			->result_object();
	}

	public function getUser($data)
	{
		return $this->db->get_where($this::TABLE_NAME, $data)->row_object();
	}

	public function getUserRole($role_id)
	{
		return $this->db->get_where('roles', ['id' => $role_id])->row_object();
	}
}
