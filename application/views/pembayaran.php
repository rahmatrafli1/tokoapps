<?php include_once('templates/header.php'); ?>
<?php include_once('templates/sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php
				$grand_total = 0;
				$keranjang = $this->cart->contents();
				if ($keranjang) :
					foreach ($keranjang as $ker) :
						$grand_total = $grand_total + $ker['subtotal'];
					endforeach;

					echo "Total Belanja Anda: Rp. " . number_format($grand_total, 0, ",", ".");
				?>
			</div>
			<br><br>
			<h3>Input Alamat Pengiriman dan Pembayaran</h3>
			<form action="<?= current_url(); ?>" method="post">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" value="<?= $user['nama']; ?>" readonly>
					<?= form_error('nama', '<div class="form-text text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" value="<?= set_value('alamat'); ?>">
					<?= form_error('alamat', '<div class="form-text text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control" value="<?= set_value('no_telp'); ?>">
					<?= form_error('no_telp', '<div class="form-text text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select name="jasa" class="form-control">
						<option value="">--Pilih Jasa Pengiriman--</option>
						<option value="JNE" <?= set_value("jasa") == "JNE" ? "selected" : "" ?>>JNE</option>
						<option value="TIKI" <?= set_value("jasa") == "TIKI" ? "selected" : "" ?>>TIKI</option>
						<option value="POS Indonesia" <?= set_value("jasa") == "POS Indonesia" ? "selected" : "" ?>>POS Indonesia</option>
						<option value="Gojek" <?= set_value("jasa") == "Gojek" ? "selected" : "" ?>>Gojek</option>
						<option value="Grab" <?= set_value("jasa") == "Grab" ? "selected" : "" ?>>Grab</option>
					</select>
					<?= form_error('jasa', '<div class="form-text text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label>Pilih Metode Pembayaran</label>
					<select name="pembayaran" class="form-control">
						<option value="">--Pilih Metode Pembayaran--</option>
						<option value="BCA" <?= set_value("pembayaran") == "BCA" ? "selected" : "" ?>>BCA</option>
						<option value="BNI" <?= set_value("pembayaran") == "BNI" ? "selected" : "" ?>>BNI</option>
						<option value="BRI" <?= set_value("pembayaran") == "BRI" ? "selected" : "" ?>>BRI</option>
						<option value="Permata Bank" <?= set_value("pembayaran") == "Permata Bank" ? "selected" : "" ?>>Permata Bank</option>
						<option value="Bank Mega" <?= set_value("pembayaran") == "Bank Mega" ? "selected" : "" ?>>Bank Mega</option>
						<option value="Mandiri" <?= set_value("pembayaran") == "Mandiri" ? "selected" : "" ?>>Mandiri</option>
						<option value="Bayar di Tempat" <?= set_value("pembayaran") == "Bayar di Tempat" ? "selected" : "" ?>>Bayar di Tempat</option>
					</select>
					<?= form_error('pembayaran', '<div class="form-text text-danger">', '</div>'); ?>
				</div>
				<button type="submit" class="btn btn-primary mb-3"><i class="fas fa-paper-plane"></i> Pesan Sekarang</button>
				<a href="<?= base_url('dashboard/lihat_keranjang') ?>" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
			</form>

		<?php else :
					echo "Keranjang belanja anda masih kosong!";
				endif; ?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<?php include_once('templates/footer.php'); ?>