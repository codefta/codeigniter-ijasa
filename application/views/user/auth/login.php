<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card shad">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <h5>Login</h5>
                                <hr class="hr">
                                <?php $this->load->view('user/partials/notif.php')?>
                                <form action="<?php echo site_url('auth/auth_login') ?>" method="post" >
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Login</button>
                                </form>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-1"></div>
                            <div class="col-md-10 text-center">
                                <p>Belum punya akun? <a href="<?php echo site_url('auth/register') ?>">silakan daftar disini!</a></p>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>