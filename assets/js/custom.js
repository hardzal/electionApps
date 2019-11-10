/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
const base_url = "http://localhost/projects/pemilihan_ci/";
// "use strict";

// deleting user
$('.hapus').click(function () {
	// add class to parent
	$(this).parent().parent().addClass('user-delete');

	swal({
			title: 'Apakah Anda yakin?',
			text: 'Anda akan menghapus data user, data tidak akan bisa dikembalikan setelah terhapus',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				// get id
				let id = $(this).data('id');

				$.ajax({
					url: `${base_url}user/delete/${id}`,
					type: "post",
					data: {
						id: id
					},
					success: function () {
						swal("Data berhasil dihapus", {
							icon: "success",
						});
						$('.user-delete').fadeTo('slow', 0.5, function () {
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
"use strict";

$("#table-1").dataTable({
	"columnDefs": [{
		"sortable": false,
	}]
});
