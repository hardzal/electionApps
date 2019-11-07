<?php

class UserDetail_Model extends CI_Model
{
	private const TABLE_NAME = 'user_details';

	public function create($data)
	{
		$this->db->insert($this::TABLE_NAME, $data);
		return $this->db->affected_rows();
	}
}
