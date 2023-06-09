<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>

<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
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
		<?php foreach ($barang as $brg) : ?>
			<tr>
				<td><?= ++$start; ?></td>
				<td><?= $brg->nama_brg; ?></td>
				<td><?= $brg->keterangan; ?></td>
				<td><?= $brg->kategori; ?></td>
				<td><?= "Rp. " . number_format($brg->harga, 0, ",", ".") ?></td>
				<td><?= $brg->stok; ?></td>
				<td>
					<?= anchor('admin/data_barang/detail/' . $brg->id_brg, '<div class="btn btn-success btn-sm"><i class="fas fa-eye"></i></div>'); ?>
				</td>
				<td>
					<?= anchor('admin/data_barang/edit/' . $brg->id_brg, '<div class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></div>'); ?>
				</td>
				<td>
					<a href="<?= base_url('admin/data_barang/hapus/' . $brg->id_brg) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?= $this->pagination->create_links(); ?>
</div>

<!-- Modal Tambah -->
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
				<form action="<?= current_url(); ?>" method="post" enctype="multipart/form-data">
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
						<select class="form-control" name="kategori">
							<option value="">--Pilih Kategori--</option>
							<option value="Elektronik">Elektronik</option>
							<option value="Pakaian Pria">Pakaian Pria</option>
							<option value="Pakaian Wanita">Pakaian Wanita</option>
							<option value="Pakaian Anak-anak">Pakaian Anak-anak</option>
							<option value="Peralatan Olahraga">Peralatan Olahraga</option>
						</select>
						<?= form_error('kategori', '<div class="form-text text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" class="form-control" value="<?= set_value('harga'); ?>">
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
						<?= form_error('gambar', '<div class="form-text text-danger">', '</div>') ?>
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
<!-- Akhir Modal Tambah -->

<?php include_once('templates_admin/footer.php'); ?>