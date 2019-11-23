<?php

function is_logged_in()
{
	$ci = &get_instance();

	if (!$ci->session->userdata('nim')) {
		redirect('auth');
	}
}

function checkAccess($role_id)
{
	$ci = &get_instance();
	
	if ($ci->session->userdata('role_id') != $role_id) {
		redirect('auth');
	}
}
