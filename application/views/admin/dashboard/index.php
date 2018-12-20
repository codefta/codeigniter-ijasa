<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>
<?php $this->load->view('admin/partials/breadcumb.php'); ?>

<div class="row mb-5 mt-5">
    <div class="col-md-4 mb-2">
        <div class="card border-danger" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title ">Jumlah Bencana</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                    <span style="font-size: 5rem" class="text-danger">
                        <i class="fas fa-campground"></i>
                    </span><br>
                    <small class="text-danger">Sabar<br>&<br>Taubat</small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">Total info bencana</small>
                        <?php foreach($info as $data) : ?>
                            <h1><?php echo $data['jml_bencana']; ?> </h1>
                        <?php endforeach; ?>                        
                        <small class="text-muted">Total bencana menerima donasi</small>
                            <?php foreach($info_donated as $data) : ?>
                                <h1><?php echo $data['bencana_terdanai']; ?> </h1>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card border-success" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Bantuan Logistik</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6 align-items-center align-self-center">
                            <span style="font-size: 5rem" class="text-success">
                            <i class="fas fa-box"></i>
                            </span>
                        </div>
                        <small class="text-success">Infaq<br>&<br>Shadaqah</small>
                    </div>
                        <div class="col-md-6">
                            <small class="text-muted">Total kebutuhan yang akan dan diterima</small>
                            <?php foreach($otw as $data) : ?>
                                <h1><?php echo $data['total']; ?> </h1>
                            <?php endforeach; ?>                     
                            <small class="text-muted">Total seluruh jumlah kebutuhan diterima</small>
                            <?php foreach($target as $data) : ?>
                                <h1><?php echo $data['total']; ?> </h1>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card border-info" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Orang Baik</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6 align-items-center align-self-center">
                            <span style="font-size: 5rem" class="text-info">
                            <i class="fas fa-users"></i>
                            </span>
                        </div>
                        <small class="text-info">Sholeh<br>&<br>Dermawan</small>
                    </div>
                    <div class="col-md-6">
                            <small class="text-muted">Total akun terdaftar</small>
                            <?php foreach($akun as $data) : ?>
                                <h1><?php echo $data['jml_akun']; ?> </h1>
                            <?php endforeach; ?>                   
                            <small class="text-muted">Total akun yang telah berdonasi</small>
                            <?php foreach($akun_donated as $data) : ?>
                                <h1><?php echo $data['akun_donated']; ?> </h1>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
<?php $this->load->view('admin/partials/js'); ?>