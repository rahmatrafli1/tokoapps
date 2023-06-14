<?php include_once('templates_admin/header.php'); ?>
<?php include_once('templates_admin/sidebar.php'); ?>
<div class="container-fluid">
	<h4><i class="fas fa-eye"></i> Detail Invoice</h4>
	<p>No. Invoice <?= $invoice->id; ?></p>

	<table class="table table-hover table-bordered table-striped">
		<tr>
			<th>ID BARANG</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH PESANAN</th>
			<th>HARGA SATUAN</th>
			<th>SUBTOTAL</th>
		</tr>
		<?php
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		?>
			<tr>
				<td><?= $psn->id_brg; ?></td>
				<td><?= $psn->nama_brg; ?></td>
				<td class="text-right"><?= $psn->jumlah; ?></td>
				<td class="text-right">Rp. <?= number_format($psn->harga, 0, ",", "."); ?></td>
				<td class="text-right">Rp. <?= number_format($subtotal, 0, ",", "."); ?></td>
			</tr>
		<?php endforeach; ?>

		<tr>
			<td colspan="4" class="text-center">Total Harga</td>
			<td class="text-right">Rp. <?= number_format($total, 0, ",", "."); ?></td>
		</tr>
	</table>

	<a href="<?= base_url('admin/Invoice') ?>" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>
<?php include_once('templates_admin/footer.php'); ?>
