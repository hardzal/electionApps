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
			->order_by('users.is_active', 'DESC')
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

	public function create($data)
	{ }

	public function update($data)
	{ }

	public function delete($id)
	{
		$this->db->delete($this::TABLE_NAME, ['id' => $id]);
		return $this->db->affected_rows();
	}
}
