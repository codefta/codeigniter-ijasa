<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shad">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <h3>Daftar</h3>
                                <hr class="hr-title">
                                <div class="text-danger">
                                    <?= validation_errors(); ?>
                                </div>
                                <?php echo form_open_multipart('auth/save_register'); ?>
                                <form action="<?php echo site_url('auth/save_register')?>" method="post">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label> <br>
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                                        <small class="form-text text-muted">Isi dengan alamat lengkap</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="email@email.com"> 
                                    </div>
                                    <div class="form-group">
                                        <label>No Hanphone</label>
                                        <input type="number" class="form-control" name="nohp" placeholder="081xxxx"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="username">
                                        <small class="form-text text-muted">Menggunakan karakter unik</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Profil</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Daftar</button>
                                </form>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center text-secondary">
                    <a class="navbar-brand btn btn-brand" href="#">Ijasa<p style="font-size: 10pt">Sistem Informasi Jalan Sampai</p></a>
                    <p>Yuk Ikut Membatu saudara kita yang membutuhkan</p>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>