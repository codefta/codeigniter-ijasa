<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card shad">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <h3 class="text-center">Info Profil</h3>
                                <hr>
                                <?php $this->load->view('user/partials/notif') ?>
                                <div class="row mb-3">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url().'uploads/profil/'.$profil['foto'] ?>" class="rounded-circle" style="width: 150px; height: 150px">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="card mb-2 content-profil">
                                    <div class="card-header">
                                        Nama
                                    </div>
                                    <div class="card-body">
                                        <p><?= $profil['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="card mb-2 content-profil">
                                    <div class="card-header">
                                        Jenis Kelamin
                                    </div>
                                    <div class="card-body">
                                        <p><?= $profil['jenis_kelamin']; ?></p>
                                    </div>
                                </div>
                                <div class="card mb-2 content-profil">
                                    <div class="card-header">
                                        Alamat
                                    </div>
                                    <div class="card-body">
                                        <p><?= $profil['alamat']; ?></p>
                                    </div>
                                </div>
                                <div class="card mb-2 content-profil">
                                    <div class="card-header">
                                        Email
                                    </div>
                                    <div class="card-body">
                                        <p><?= $profil['email']; ?></p>
                                    </div>
                                </div>
                                <div class="card mb-2 content-profil">
                                    <div class="card-header">
                                    No Handphone
                                    </div>
                                    <div class="card-body">
                                        <p><?= $profil['nohp']; ?></p>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <a class="btn btn-secondary" href="<?php echo site_url('profil/sunting_profil') ?>">Sunting</a>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>