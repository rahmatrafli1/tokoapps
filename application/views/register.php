<?php include_once('templates/auth/header.php'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">


        <div class="col-xl-5 col-lg-12 col-md-9">
            <div class="h3 mt-5 d-flex justify-content-center">
                <a href="<?= base_url(''); ?>" class="text-decoration-none">
                    <div class="text-white text-uppercase font-weight-bold">
                        <i class="fas fa-shopping-cart rotate-n-15"></i> Toko Apps
                    </div>
                </a>
            </div>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Register</h1>
                                </div>
                                <form class="user" action="<?= base_url('auth/register'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<div class="form-text small text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<div class="form-text small text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<div class="form-text small text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="password2" placeholder="Konfirmasi Password">
                                            <?= form_error('password2', '<div class="form-text small text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center small">
                                    Sudah punya Akun? <a href="<?= base_url('auth/login') ?>"> Login Sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include_once('templates/auth/footer.php'); ?>