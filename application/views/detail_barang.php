<?php include_once('templates/header.php'); ?>
<?php include_once('templates/sidebar.php'); ?>
<div class="container-fluid">
	<div class="card mb-3">
		<div class="card-header">
			Detail Barang
		</div>
		<div class="card-body">
			<?= form_open('dashboard/tambah_keranjang'); ?>
			<?= form_hidden('id', $barang->id_brg); ?>
			<?= form_hidden('price', $barang->harga); ?>
			<?= form_hidden('name', $barang->nama_brg); ?>
			<?= form_hidden('redirect_page', str_replace('index.php/', '', base_url('/'))); ?>
			<div class="row">
				<div class="col-md-4">
					<img src="<?= base_url('uploads/' . $barang->gambar); ?>" alt="<?= $barang->nama_brg; ?>" class="card-img-top">
				</div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<tr>
							<td>Nama Barang</td>
							<td><strong><?= $barang->nama_brg; ?></strong></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td><strong><?= $barang->keterangan; ?></strong></td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td><strong><?= $barang->kategori; ?></strong></td>
						</tr>
						<tr>
							<td>Stok</td>
							<td><strong><?= $barang->stok; ?></strong></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td>
								<strong>
									<div class="btn btn-sm btn-success">
										Rp. <?= number_format($barang->harga, 0, ",", ".") ?>
									</div>
								</strong>
							</td>
						</tr>
					</table>
					<div class="form-inline">
						<div class="form-group">
							<input type="number" name="qty" min="0" placeholder="qty" class="form-control mr-1">
						</div>
						<button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess mr-1"><i class="fas fa-cart-plus"></i> Tambah</button>
						<a href="<?= base_url('/'); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
				</div>
			</div>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<?php include_once('templates/footer.php'); ?>
