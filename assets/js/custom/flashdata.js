const flashData = $('.flash-data').data('flashdata')

if (flashData) {
	Swal.fire({
		icon: 'success',
		title: 'Success',
		text: 'Data barang berhasil ' + flashData
	})
}

// konfirmasi tombol hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Peringatan',
		text: "Yakin mau dihapus?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#228B22',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, hapus!',
		cancelButtonText: 'Tidak'
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	})
})
