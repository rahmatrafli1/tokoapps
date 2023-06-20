<?php include_once('templates/header.php'); ?>
<?php include_once('templates/sidebar.php'); ?>

<div class="container-fluid">
    <h3><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>PROFIL SAYA</h3>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/' . $user['gambar']); ?>" alt="<?= $user['nama']; ?>" width="150" height="150">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text">Username: <?= $user['username']; ?></p>
                    <p class="card-text"><small class="text-muted">Tanggal dibuat: <?= $user['tgl_dibuat']; ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('templates/footer.php'); ?>