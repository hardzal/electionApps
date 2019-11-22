<?php

class User_Model extends CI_Model
{
	private const TABLE_NAME = 'users';

	public function __construct()
	{
		$this->load->model('UserDetail_Model', 'userDetail');
	}

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
		return $this->db
			->select('users.*, user_details.name, user_details.hp, roles.role')
			->from($this::TABLE_NAME)
			->join('user_details', 'users.id = user_details.user_id', 'left')
			->join('roles', 'users.role_id = roles.id', 'left')
			->where($data)
			->get()
			->row_object();
	}

	public function getUserRole($role_id)
	{
		return $this->db->get_where('roles', ['id' => $role_id])->row_object();
	}

	public function create($data)
	{
		$this->db->trans_start();

		// user insert
		$this->db->insert($this::TABLE_NAME, $data['user']);
		$user_id = $this->db->insert_id();
		$data['userdetail']['user_id'] = $user_id;

		// user_detail insert
		$this->userDetail->create($data['userdetail']);

		$this->db->trans_complete();

		if ($this->db->trans_status() == false) {
			$this->db->trans_rollback();
			return false;
		}

		$this->db->trans_commit();
		return true;
	}

	public function update($data, $user_id)
	{
		$this->db->trans_start();

		$this->db->update($this::TABLE_NAME, $data['user'], ['id' => $user_id]);
		$this->userDetail->update($data['userdetail'], $user_id);

		$this->db->trans_complete();

		if ($this->db->trans_status() == false) {
			$this->db->trans_rollback();
			return false;
		}

		$this->db->trans_commit();
		return true;
	}

	public function delete($id)
	{
		$this->db->delete($this::TABLE_NAME, ['id' => $id]);
		return $this->db->affected_rows();
	}
}
