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
                                <h3 class="text-center">Sunting Profil</h3>
                                <hr class="hr">
                                <div class="text-danger">
                                    <?= validation_errors(); ?>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <img src="<?php echo base_url().'uploads/profil/'.$profil['foto']; ?>" class="rounded-circle" style="width: 150px; height: 150px">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                
                                <?php echo form_open_multipart('auth/update_register'); ?>
                                <form action="<?php echo site_url('auth/update_register')?>" method="post">
                                <input type="hidden" name="id" value="<?= $this->session->userdata('logged_in')['id']; ?>">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto" >
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $profil['nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label> <br>
                                        <?php if($profil['jenis_kelamin'] == 'Laki-laki' ) : ?>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" > Perempuan
                                        <?php endif;?> 
                                        <?php if($profil['jenis_kelamin'] == 'Perempuan' ) : ?>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan    
                                        <?php endif; ?>
                                        
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3" value="<?= $profil['alamat']; ?>"><?= $profil['alamat']; ?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $profil['email']; ?>"> 
                                    </div>
                                    <div class="form-group">
                                        <label>No Hanphone</label>
                                        <input type="number" class="form-control" name="nohp" value="<?= $profil['nohp']; ?>"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" readonly value="<?= $profil['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" value="<?= $profil['nohp']; ?>" readonly>
                                    </div>
                                    <input type="hidden" name="image_lama" value="<?= $profil['foto'] ?>">

                                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                                    
                                </form>
                                <a href="<?php echo site_url('beranda/profil') ?>" class="btn btn-danger float-right mr-3 text-white">Batal</a> 
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>