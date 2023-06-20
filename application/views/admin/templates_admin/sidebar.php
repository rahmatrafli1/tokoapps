<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin/Dashboard_Admin">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-user-shield"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if ($title == 'Dashboard Admin') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url(); ?>admin/Dashboard_Admin">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item <?php if ($title == 'Data Barang' || $title == 'Edit Barang' || $title == 'Detail Data Barang') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url(); ?>admin/Data_Barang">
					<i class="fas fa-fw fa-database"></i>
					<span>Data Barang</span></a>
			</li>

			<li class="nav-item <?php if ($title == 'Invoice' || $title == 'Detail Invoice') : ?>active<?php endif; ?>">
				<a class="nav-link" href="<?= base_url(); ?>admin/Invoice">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Invoices</span></a>
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
						<div class="topbar-divider d-none d-sm-block"></div>
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('assets/img/' . $user['gambar']) ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item <?php if ($title == 'Profil Saya') : ?>active<?php endif; ?>" href="<?= base_url('admin/Profile'); ?>">
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

					</ul>

				</nav>
				<!-- End of Topbar -->