<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>

<div class="container-fluid">
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
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php include_once('templates_admin/footer.php'); ?>
