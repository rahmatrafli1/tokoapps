<?php include_once('templates/header.php'); ?>
<?php include_once('templates/sidebar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url(); ?>assets/img/slider1.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?= base_url(); ?>assets/img/slider2.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</button>
	</div>

	<!-- Card untuk menampilkan barang -->
	<div class="row text-center mt-3">
		<?php foreach ($barang as $brg) : ?>
			<div class="card ml-3 mb-3" style="width: 16rem;">
				<img src="<?= base_url() . 'uploads/' . $brg->gambar; ?>" class="card-img-top" alt="<?= $brg->nama_brg; ?>">
				<div class="card-body">
					<h5 class="card-title mb-1"><?= $brg->nama_brg; ?></h5>
					<small><?= $brg->keterangan ?></small><br />
					<span class="badge badge-success mb-3">
						<?php if ($brg->harga == 0) : ?>
							<?= "Gratis"; ?>
						<?php else : ?>
							<?= "Rp. " . number_format($brg->harga, 0, ",", ".") ?>
						<?php endif; ?>
					</span>
					<div>
						<a href="<?= base_url('dashboard/tambah_keranjang/' . $brg->id_brg); ?>" class="btn btn-sm btn-primary">Tambah ke Keranjang</a>
						<a href="#" class="btn btn-sm btn-info">Detail</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once('templates/footer.php'); ?>