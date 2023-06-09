<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-shopping-cart"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Toko Apps</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if ($title == 'Dashboard' || $title == "Lihat Keranjang" || $title == "Pembayaran" || $title == "Pesanan" || $title == "Detail Barang") : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url(); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Kategori
			</div>

			<!-- Nav Item - Tables -->
			<li class="nav-item <?php if ($title == 'Kategori Elektronik') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url('kategori/elektronik'); ?>">
					<i class="fas fa-fw fa-bolt"></i>
					<span>Elektronik</span></a>
			</li>

			<li class="nav-item <?php if ($title == 'Kategori Pakaian Pria') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url('kategori/pakaian_pria'); ?>">
					<i class="fas fa-fw fa-male"></i>
					<span>Pakaian Pria</span></a>
			</li>

			<li class="nav-item <?php if ($title == 'Kategori Pakaian Wanita') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url('kategori/pakaian_wanita'); ?>">
					<i class="fas fa-fw fa-female"></i>
					<span>Pakaian Wanita</span></a>
			</li>

			<li class="nav-item <?php if ($title == 'Kategori Pakaian Anak-anak') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url('kategori/pakaian_anak'); ?>">
					<i class="fas fa-fw fa-child"></i>
					<span>Pakaian Anak-anak</span></a>
			</li>

			<li class="nav-item <?php if ($title == 'Kategori Peralatan Olahraga') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url('kategori/peralatan_olahraga'); ?>">
					<i class="fas fa-fw fa-basketball-ball"></i>
					<span>Peralatan Olahraga</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<?php if ($this->session->userdata('username')) : ?>
							<?php
							$keranjang = $this->cart->contents();
							$jml_item = 0;
							foreach ($keranjang as $ker) {
								$jml_item = $jml_item + $ker['qty'];
							} ?>
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-shopping-cart fa-fw"></i>
									<!-- Counter - Cart -->
									<span class="badge badge-danger badge-counter"><?= $jml_item; ?></span>
								</a>
								<!-- Dropdown - Cart -->
								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
									<h6 class="dropdown-header">
										Keranjang Belanja
									</h6>
									<a class="dropdown-item text-center small text-gray-500" href="<?= base_url('dashboard/lihat_keranjang'); ?>"><i class="fas fa-eye"></i> Lihat Keranjang</a>
								</div>
							</li>


						<?php endif; ?>
						<div class="topbar-divider d-none d-sm-block"></div>
						<!-- Nav Item - User Information -->
						<?php if ($this->session->userdata('username')) : ?>
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
									<img class="img-profile rounded-circle" src="<?= base_url('assets/img/' . $user['gambar']) ?>">
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item <?php if ($title == 'Profil Saya') : ?>active<?php endif; ?>" href="<?= base_url('profile'); ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profil Saya
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Pengaturan
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Keluar
									</a>
								</div>
							</li>
						<?php else : ?>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/login'); ?>">
									<span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i> Masuk</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/register') ?>">
									<span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i> Daftar</span>
								</a>
							</li>
						<?php endif; ?>

					</ul>

				</nav>
				<!-- End of Topbar -->