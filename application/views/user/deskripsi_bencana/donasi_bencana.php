<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-3">
        <div class="card shad">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="text-center"><?php echo $donasi->nama ?></h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <!--card section-->
                        <img src="<?php echo base_url().'/uploads/infobencana/'.$donasi->foto ?>" style="width:100%;">
                    </div>
                    <div class="col-md-8">
                        <!--card section-->
                        <p><?php echo $donasi->deskripsi ?></p>
                    </div>
                </div>
                <hr>    
                <div class="row mb-3">
                    <div class="col">
                        <h4>Logistik yang didonasikan</h4>
                    </div>
                </div>
                <form action="<?php echo site_url('deskripsibencana/save_donasi') ?>" method="post" >
                <input type="hidden" name="user" value="<?php echo $profil['id'] ?>">
                <input type="hidden" name="bencana" value="<?php echo $donasi->idbencana ?>">
                <div class="row">
                    <?php foreach($kebutuhan as $data) : ?>
                    <div class="col-md" <?php if($data == "idbutuh") echo 'hidden'; ?>>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style=" width: 110px"><?php if($data != "idbutuh") echo $data; ?></span>
                            </div>
                            <input type="number" class="form-control" name="<?php if($data == "makanan"){
                                echo 'makanan';
                            } else if($data == "pakaian"){
                                echo 'pakaian';
                            } else if($data == "buku"){
                                echo 'buku';
                            } else if($data == "kendaraan"){
                                echo 'kendaraan';
                            }?>" placeholder="<?php if($data == "makanan"){
                                echo 'kg';
                            } else if($data == "pakaian"){
                                echo 'helai';
                            } else if($data == "buku"){
                                echo 'buah';
                            } else if($data == "kendaraan"){
                                echo 'buah';
                            }?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 "><button type="submit" class="btn btn-success float-right">Donasi</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>