<?php

class UserDetail_Model extends CI_Model
{
	private const TABLE_NAME = 'user_details';

	public function create($data)
	{
		$this->db->insert($this::TABLE_NAME, $data);
		return $this->db->affected_rows();
	}

	public function getUserDetail($data)
	{
		return $this->db->get_where($this::TABLE_NAME, $data)->row_object();
	}

	public function update($data, $user_id)
	{
		$this->db->update($this::TABLE_NAME, $data, ['user_id' => $user_id]);
		return $this->db->affected_rows();
	}
}
