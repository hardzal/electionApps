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
	$file = FCPATH. "\storage\\". $folder . "\\" . $image_name;

	return unlink($file);
}

function doUploadImage($path)
{
	$ci = &get_instance();

	$config['allowed_types'] = "gif|jpg|jpeg|png|jfif|bmp";
	$config['max_sizes'] = 1024;
	$config['upload_path'] = "./storage/{$path}";

	$ci->load->library('upload', $config);

	if (!$ci->upload->do_upload('image')) {
		return false;
	}

	return $ci->upload->data('file_name');
}

