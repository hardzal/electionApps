/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
"use strict";

$(function () {
	const base_url = "http://localhost/projects/pemilihan_ci/";

	// deleting user
	$('.hapus').click(function () {
		// add class to parent
		$(this).parent().parent().addClass('delete');

		swal({
				title: 'Apakah Anda yakin?',
				text: 'Anda akan menghapus data ini, data tidak akan bisa dikembalikan setelah terhapus',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					// get id
					const id = $(this).data('id');
					const link = $(this).data('link');

					$.ajax({
						url: `${base_url}${link}`,
						type: "post",
						data: {
							id: id
						},
						success: function () {
							swal("Data berhasil dihapus", {
								icon: "success",
							});
							$('.delete').fadeTo('slow', 0.5, function () {
								$(this).remove();
							});
						},
						error: function () {
							swal("Data gagal dihapus", "error");
						}
					});
				} else {
					$(this).parent().parent().removeClass('user-delete');
				}
			}).catch(err => {
				console.log(err);
			});
		return false;
	});

	$('.user_details').on('click', function () {
		const id = $(this).data('id');
		const link = $(this).data('link');

		$.ajax({
			url: base_url + link,
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$('.nama').html(data.name);
				$('.nim').html(data.nim);
				$('.email').html(data.email);
				$('.hp').html(data.hp);
				$('.role').html(data.role);
				$('.last_login').html(data.last_login);
			}
		});
	});

	$('.candidate_details').on('click', function () {
		const id = $(this).data('id');
		const link = $(this).data('link');

		$.ajax({
			url: base_url + link,
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				console.log(data);
				$('.nama').html(data.name);
				$('.nim').html(data.nim);
				$('.email').html(data.email);
				$('.visi').html(data.visi);
				$('.misi').html(data.misi);
				$('.last_login').html(data.last_login);
			}
		});
	});

	$('.election_details').on('click', function () {
		const id = $(this).data('id');
		const link = $(this).data('link');

		$.ajax({
			url: base_url + link,
			type: "post",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$('.name').html(data[0].title);
				$('.start').html(data[0].start_at);
				$('.end').html(data[0].end_at);
				$('.kandidat').html("<ul class='list-group'></ul>");
				for (const kandidat of data) {
					$('.kandidat ul').append("<li class='list-group-item'>" + kandidat.name + "</li>");
				}
			}
		});
	});

	$('#nim_candidate').autocomplete({
		source: `${base_url}admin/candidate/getCandidateByNim`,
		select: function (event, ui) {
			$('[name="nim"]').val(ui.item.label);
			$('[name="nama"]').val(ui.item.nama);
			$('[name="user_id"]').val(ui.item.id);
		}
	});
	// });
	$('.candidates').hide();

	$('.candidate').click(function () {
		$('.candidates').show();
		let temp = 1;

		$('input[type="number"].num_candidate').on('change paste keyup', function () {
			let current = $('.num_candidate').val();

			if (current > temp) {
				$('.nim_candidate' + temp).after('<input type="text" class="mt-3 nim_candidate' + current + ' form-control" name="nim_candidate[]" />');
			} else if (current < temp) {
				$('.nim_candidate' + temp).remove();
			}
			temp = current;
		});
	});

	// datatables
	$("#table-1").dataTable({
		"columnDefs": [{
			"sortable": false,
		}]
	});

	$("#table-2").dataTable({
		"columnDefs": [{
			"sortable": false,
			"targets": [0, 2, 3]
		}]
	});

	$.uploadPreview({
		input_field: "#image-upload", // Default: .image-upload
		preview_box: "#image-preview", // Default: .image-preview
		label_field: "#image-label", // Default: .image-label
		label_default: "Choose File", // Default: Choose File
		label_selected: "Change File", // Default: Change File
		no_label: false, // Default: false
		success_callback: null // Default: null
	});

});
