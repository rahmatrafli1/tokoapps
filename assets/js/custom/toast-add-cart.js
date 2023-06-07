const Toast = Swal.mixin({
	toast: true,
	position: 'top-right',
	iconColor: 'white',
	customClass: {
		popup: 'colored-toast'
	},
	showConfirmButton: false,
	timer: 1500,
	timerProgressBar: true
})

$('.swalDefaultSuccess').click(function () {
	Toast.fire({
		icon: 'success',
		title: 'Barang berhasil ditambahkan ke keranjang'
	})
})
