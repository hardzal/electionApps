/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
const base_url = "http://localhost/projects/pemilihan_ci/";
// "use strict";

$('.hapus').click(function () {
	swal({
			title: 'Apakah Anda yakin?',
			text: 'Anda akan menghapus data user, data tidak akan bisa dikembalikan setelah terhapus',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				let id = $(this).data('id');
				console.log(id);
				$.ajax({
					url: `${base_url}user/delete/${id}`,
					type: "post",
					data: {
						id: id
					},
					success: function () {
						swal("Data berhasil dihapus", "success");
					},
					error: function () {
						swal("Data gagal dihapus", "error");
					}
				});

			}
		});
	return false;
});
