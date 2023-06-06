<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>

<div class="container-fluid">
	<h3><i class="fas fa-pencil-alt"></i> DETAIL DATA BARANG</h3>

	<div class="card mt-3 mb-3" style="width: 18rem;">
		<img src="<?= base_url('uploads/' . $detail->gambar); ?>" class="card-img-top" alt="<?= $detail->nama_brg; ?>">
		<div class="card-body">
			<h5 class="card-title"><?= $detail->nama_brg; ?></h5>

			<span class="badge badge-success mb-3">
				<?php if ($detail->harga == 0) : ?>
					<?= "Gratis"; ?>
				<?php else : ?>
					<?= "Rp. " . number_format($detail->harga, 0, ",", ".") ?>
				<?php endif; ?>
			</span>
			<p class="card-text">Kategori: <?= $detail->kategori; ?></p>
			<p class="card-text">Stok: <?= $detail->stok; ?> barang</p>
			<p class="card-text"><?= $detail->keterangan; ?></p>
			<a href="<?= base_url('admin/data_barang') ?>" class="btn btn-primary">Kembali</a>
		</div>
	</div>
</div>

<?php include_once('templates_admin/footer.php'); ?>
