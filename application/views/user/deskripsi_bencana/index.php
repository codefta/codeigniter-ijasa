<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-3">
<div class="row">
        <div class="col-md-6">
            <h4 class="header-content">Laporan Bencana</h4>
        </div>
        <div class="col-md-6">
            <form class="form-inline float-right ">
                <input id="keyword" class="form-control mr-sm-2 mt-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
    <div class="row row-wrap ">
        <?php
            foreach ($berita as $data): ?>
        <div class="col-md-4 row-item items">
            <!--card section-->
            <div class="card shad bg-white rounded mb-3">
                <img src="<?php echo base_url().'uploads/infobencana/'.$data['foto'] ?>" class="img-section rounded">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['nama'] ?></h5>
                    <p class="card-text"><?php echo word_limiter($data['deskripsi'],30) ?></p>
                    <a href="<?php echo site_url('deskripsibencana/detail_bencana/'.$data['idbencana']) ?>" class="btn btn-secondary float-right">Detail</a>
                    <a href="<?php echo site_url('deskripsibencana/donasi_bencana/'.$data['idbencana']) ?>" class="btn btn-info float-right mr-2">Donasi</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <button class="btn btn-info more">Selanjutnya</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>        
<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>
<script>
    $(document).ready(function(){
        $(".row-wrap .row-item").hide();

        $('.row-wrap').children('.row-item:lt(6)').show();

        $('.more').click(function(){
            $('.row-wrap').children('.row-item:hidden:lt(3)').show();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#keyword").on("keyup", function(){
            var value= $(this).val().toLowerCase();
            $(".items").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>   
