<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center t-shadow">            
        <h1 class="header-jb">IJasa</h1>
        <button type="button" class="btn btn-light mb-3">Kirim Bantuanmu, Sampai Lebih Awal</button>
        <p class="content-jb">Mari kita ringankan beban saudara kita yang sedang mengalami musibah</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="header-content">Laporan Bencana</h4>
        </div>
    </div>
    <div class="row">
        <?php
            foreach ($berita as $data): ?>
        <div class="col-md-4">
            <!--card section-->
            <div class="card shad border-0 bg-white rounded mb-3">
                <img src="<?php echo base_url().'uploads/infobencana/'.$data['foto'] ?>" class="img-section">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['nama'] ?></h5>
                    <div class="clearfix mb-2">
                        <small class="float-left text-secondary"><?php echo $data['tanggal'] ?></small>
                    </div>
                    <p class="card-text"><?php echo word_limiter($data['deskripsi'],30) ?></p>
                    <a href="<?php echo site_url('deskripsibencana/detail_bencana/'.$data['idbencana']) ?>" class="btn btn-secondary float-right">Detail</a>
                    <a href="<?php echo site_url('deskripsibencana/donasi_bencana/'.$data['idbencana']) ?>" class="btn btn-info float-right mr-2">Donasi</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php echo $this->pagination->create_links() ?>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center mb-3"><a href="<?php echo site_url('deskripsibencana') ?>" class="btn btn-primary">Selengkapnya</a></div>
        <div class="col-md-4"></div>
    </div>
</div>


<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 100) {
                $(".navbar").addClass('bg-after') && $(".nav-link").addClass('nav-link-scroll')&& $(".tombol").addClass('tombol-scroll') && $(".navbar-brand").removeAttr('hidden'); 
            } else {
                $(".navbar").removeClass('bg-after') && $(".nav-link").removeClass('nav-link-scroll') && $(".tombol").removeClass('tombol-scroll') && $(".navbar-brand").attr('hidden', 'hidden');
            }
        });
    });
</script>
<?php $this->load->view('user/partials/closing_tag'); ?>