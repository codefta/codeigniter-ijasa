<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>
    <div class="container mb-3">
        <div class="card border-0 shad">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Status Donasi</h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                        <h5 class="pt-3 text-center ">Histori Donasi Anda</h5>
                        <?php foreach($status as $data) : ?>
                                <?php if($data->pengguna == $this->session->userdata('logged_in')['id']) :?>
                                <div class="card-body p-4">
                                <hr>
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h6 class="btn-success pt-2 pb-2">Nama Bencana<h6>
                                        <hr>
                                        <?php echo $data->info_bencana ?>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="btn-success pt-2 pb-2">Jenis Logistik<h6>
                                        <hr>
                                        Makanan : 
                                        <?php echo $data->makanan ?> <br>
                                        Pakaian: 
                                        <?php echo $data->pakaian ?> <br>
                                        Buku: 
                                        <?php echo $data->buku ?> <br>
                                        Kendaraan: 
                                        <?php echo $data->kendaraan ?> <br>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="btn-success pt-2 pb-2">Status<h6>
                                        <hr>
                                        <?php echo $data->nama_status ?>
                                    </div>
                                </div>
                                
                            </div>
                            <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                
            </div>
        </div>
        
    </div>  

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>