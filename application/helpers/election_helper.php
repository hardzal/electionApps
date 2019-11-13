<?php

function statusBadge($id)
{
	if ($id) {
		return "<div class='badge badge-success'>Finish</div>";
	} else {
		return "<div class='badge badge-danger'>Progress</div>";
	}
}
