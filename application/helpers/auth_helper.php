<?php

function is_logged_in()
{
	$ci = &get_instance();

	if (!$ci->session->userdata('nim')) {
		redirect('auth');
	}
}

function checkAccess()
{
	$ci = &get_instance();

	if ($ci->session->userdata('role_id') == 1) {
		redirect('dashboard/index');
	} else if ($ci->session->userdata('role_id') == 2) {
		redirect('dashboard/candidate');
	} else if ($ci->session->userdata('role_id') == 3) {
		redirect('dashboard/member');
	} else {
		redirect('auth');
	}
}
