<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>
    <div class="container mb-3">
        <div class="card shad">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Donasi Tersimpan</h3>
                        <hr>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-center">
                        <span style="font-size: 10rem; color: grey;">
                            <i class="fas fa-box-open"></i>
                        </span>    
                    
                    </div>
                    <div class="col-md-4 text-center">
                        <span style="font-size: 10rem; color: dodgerblue;">
                            <i class="fas fa-calendar-check"></i>
                        </span>    
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class=" text-center card-title">Anda telah berhasil berdonasi</h5>
                                <hr>
                                <p class="card-text text-center">Silakan kirim logistik anda ke alamat kami</p>
                                <div class="card">
                                    <div class="card-body bg-success text-white text-center">
                                        Gudang Ijasa,<br>
                                        Jl. Soekarno Hatta no 64, Bandung, Jawa Barat
                                    </div>
                                </div>
                            </div>
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