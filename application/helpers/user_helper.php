<?php

function getUserData()
{
	$ci = &get_instance();
	$data['users'] = $ci->auth->getUser(['id' => $ci->session->userdata('id')]);
	$data['user_details'] = $ci->auth->getUserDetails(['user_id' => $ci->session->userdata('id')]);

	return $data;
}

function getUserRole($role_id)
{
	$ci = &get_instance();
	$data = $ci->user->getUserRole($role_id);

	return $data->role;
}

function isUserActive($user_id, $is_active)
{
	$ci = &get_instance();
	$user = $ci->user->getUser([
		'users.id' => $user_id,
		'users.is_active' => $is_active
	]);

	if ($user->is_active) {
		return "<span class='badge badge-success'>Aktif</span>";
	} else {
		return "<span class='badge badge-danger'>Tidak Aktif</span>";
	}
}
