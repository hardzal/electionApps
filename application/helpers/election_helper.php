<?php

function statusBadge($id)
{
	if ($id) {
		return "<div class='badge badge-success'>Finish</div>";
	} else {
		return "<div class='badge badge-danger'>Progress</div>";
	}
}

function deleteImage($folder, $image_name)
{
	$file = FCPATH . "\storage\\" . $folder . "\\" . $image_name;

	return unlink($file);
}

function doUploadImage($path)
{
	$ci = &get_instance();

	$config['allowed_types'] = "gif|jpg|jpeg|png|jfif|bmp";
	$config['max_sizes'] = 5000;
	$config['upload_path'] = "./storage/{$path}";

	$ci->load->library('upload', $config);

	if (!$ci->upload->do_upload('image')) {
		return false;
	}

	return $ci->upload->data('file_name');
}

function checkVote($user_id, $election_id)
{
	$ci = &get_instance();

	$data = [
		'user_id' => $user_id,
		'election_id' => $election_id
	];

	return $ci->vote->find($data)->num_rows();
}

function resultVote($election_id, $candidate_id)
{
	$ci = &get_instance();

	$data = [
		'election_id' => $election_id,
		'candidate_id' => $candidate_id
	];

	return $ci->vote->find($data)->num_rows();
}
