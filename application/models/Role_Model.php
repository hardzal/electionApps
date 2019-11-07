<?php

class Role_Model extends CI_Model
{
	private const TABLE_NAME = 'roles';

	public function getRoles()
	{
		return $this->db->get($this::TABLE_NAME)->result();
	}
}
