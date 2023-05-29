<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg">
			<?= $this->session->flashdata('success'); ?>
		</div>
	</div>
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahBarangModal"><i class="fas fa-plus fa-sm"></i> Tambah Data Barang</button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php
		$no = 1;
		foreach ($barang as $brg) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $brg->nama_brg; ?></td>
				<td><?= $brg->keterangan; ?></td>
				<td><?= $brg->kategori; ?></td>
				<td>Rp. <?= $brg->harga; ?></td>
				<td><?= $brg->stok; ?></td>
				<td>
					<div class="btn btn-success btn-sm">
						<i class="fas fa-eye"></i>
					</div>
				</td>
				<td>
					<div class="btn btn-info btn-sm">
						<i class="fas fa-pencil-alt"></i>
					</div>
				</td>
				<td>
					<div class="btn btn-danger btn-sm">
						<i class="fas fa-trash"></i>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahBarangModalLabel">Tambah Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_brg" class="form-control" value="<?= set_value('nama_brg'); ?>">
						<?= form_error('nama_brg', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>">
						<?= form_error('keterangan', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<input type="text" name="kategori" class="form-control" value="<?= set_value('kategori'); ?>">
						<?= form_error('kategori', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" name="harga" class="form-control" value="<?= set_value('harga'); ?>">
						<?= form_error('harga', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control" value="<?= set_value('stok'); ?>">
						<?= form_error('stok', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png,.gif">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include_once('templates_admin/footer.php'); ?>
