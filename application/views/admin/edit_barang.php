<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>

<div class="container-fluid">
	<h3><i class="fas fa-pencil-alt"></i> EDIT DATA BARANG</h3>

	<?php foreach ($barang as $brg) : ?>
		<form action="<?= base_url() . 'admin/data_barang/update'; ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_brg" class="form-control" value="<?= $brg->id_brg; ?>">
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_brg" class="form-control" value="<?= $brg->nama_brg; ?>">
				<?= form_error('nama_brg', '<div class="form-text text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan; ?>">
				<?= form_error('keterangan', '<div class="form-text text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?= $brg->kategori; ?>">
				<?= form_error('kategori', '<div class="form-text text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?= $brg->harga; ?>">
				<?= form_error('harga', '<div class="form-text text-danger">', '</div>'); ?>
			</div>
			<div class=" form-group">
				<label>Stok</label>
				<input type="number" name="stok" class="form-control" value="<?= $brg->stok; ?>">
				<?= form_error('stok', '<div class="form-text text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Gambar</label>
				<input type="file" name="gambar" class="form-control mb-2" accept=".jpg,.jpeg,.png,.gif">
				<img src="<?= base_url('uploads/' . $brg->gambar); ?>" alt="<?= $brg->nama_brg; ?>">
			</div>
			<button type="submit" class="btn btn-primary mb-3">Simpan</button>
		<?php endforeach; ?>
</div>

<?php include_once('templates_admin/footer.php'); ?>
