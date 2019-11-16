/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
"use strict";

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
					url: `${base_url}${link}${id}`,
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
$(".inputtags").tagsinput('items');
