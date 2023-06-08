<?php include_once('templates/header.php'); ?>
<?php include_once('templates/sidebar.php'); ?>

<div class="container-fluid">
	<h4><i class="fas fa-eye"></i> Lihat Keranjang</h4>
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">NAMA PRODUK</th>
			<th class="text-center">JUMLAH</th>
			<th class="text-center">HARGA</th>
			<th class="text-center">SUBTOTAL</th>
		</tr>
		<?php
		$no = 1;
		$keranjang = $this->cart->contents();
		$jml_item = 0;
		foreach ($keranjang as $ker) :
			$jml_item = $jml_item + $ker['qty'];
		?>
			<tr>
				<td class="text-center"><?= $no++; ?></td>
				<td><?= $ker['name']; ?></td>
				<td class="text-right"><?= $ker['qty']; ?></td>
				<td class="text-right"><?= "Rp. " . number_format($ker['price'], 0, ",", ".") ?></td>
				<td class="text-right"><?= "Rp. " . number_format($ker['subtotal'], 0, ",", "."); ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="4" class="text-center">Total yang harus di bayar</td>
			<td class="text-right"><?= "Rp. " . number_format($this->cart->total(), 0, ",", "."); ?></td>
		</tr>
	</table>
</div>

<?php include_once('templates/footer.php'); ?>
