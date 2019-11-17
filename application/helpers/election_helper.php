<?php

function statusBadge($id)
{
	if ($id) {
		return "<div class='badge badge-success'>Finish</div>";
	} else {
		return "<div class='badge badge-danger'>Progress</div>";
	}
}

function deleteImage($path, $image_name)
{
	// $ci = &get_instance();

	$file = $path . $image_name;

	return unlink($file);
}
