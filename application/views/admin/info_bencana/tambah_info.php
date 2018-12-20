<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>

<h4>Tambah Info Bencana</h4>
<hr>
<div class="text-danger">
    <?= validation_errors() ?>
</div>
<?php echo form_open_multipart('infobencana/save_info'); ?>
<form action="<?php echo site_url('infobencana/save_info')?>" method="post">
    <div class="form-group">
        <label class="border-bottom">Nama Bencana</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="border-bottom">Lokasi</label>
        <select class="custom-select mb-2" name="provinsi" id="provinsi">
        <option>Provinsi</option>
        <?php foreach($provinsi as $data) : ?>
            <option value="<?php echo $data->id ?>"> <?php echo $data->name ?></option>
        <?php endforeach;?>
        </select>
        <select class="custom-select mb-2" name="kabupaten" id="kabupaten">
        </select>
        <select class="custom-select mb-2" name="kecamatan" id="kecamatan">
        </select>
        <select class="custom-select mb-2" name="desa" id="desa">
        </select>
    </div>
    <div class="form-group">
        <label class="border-bottom">Deskripsi Bencana</label>
        <textarea class="form-control" rows="10" name="deskripsi"></textarea>
    </div>
    <div class="form-group">
        <label class="border-bottom">Gambar</label>
        <input type="file" class="form-control-file" name="foto">
    </div>
    <div class="form-group">
        <label class="border-bottom">Kebutuhan</label>
        <?php foreach($daftar_kebutuhan as $data) : ?>
        <div class="input-group mb-2" <?php if($data == "idbutuh") echo 'hidden'; ?>>
            <div class="input-group-prepend">
            <div class="input-group-text" style="width: 120px;"><?php if($data != "idbutuh") echo $data; ?></div>
            </div>
            <input type="number" class="form-control" id="inlineFormInputGroup" name="<?php if($data == "makanan"){
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
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-success float-right">Tambah</button>
</form>

<?php $this->load->view('admin/partials/footer.php'); ?>
<?php $this->load->view('admin/partials/js.php'); ?>
<script>
    $(document).ready(function(){
        $("#kabupaten").hide();
        $("#kecamatan").hide();
        $("#desa").hide();

        $("#provinsi").change(function(){
            $("#kabupaten").hide();

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('infobencana/daftar_kabupaten') ?>",
                data: {provinsi: $("#provinsi").val()},
                dataType: "json",
                beforeSend: function(e){
                    if(e && e.overrideMimeType){
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    $('#kabupaten').html(response.daftar_kabupaten).show();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
                }
            });
        });

        $("#kabupaten").change(function(){
            $("#kecamatan").hide();

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('infobencana/daftar_kecamatan') ?>",
                data: {kabupaten: $("#kabupaten").val()},
                dataType: "json",
                beforeSend: function(e){
                    if(e && e.overrideMimeType){
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    $('#kecamatan').html(response.daftar_kecamatan).show();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
                }

            });
        });

        $("#kecamatan").change(function(){
            $("#desa").hide();

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('infobencana/daftar_desa') ?>",
                data: {kecamatan: $("#kecamatan").val()},
                dataType: "json",
                beforeSend: function(e){
                    if(e && e.overrideMimeType){
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    $('#desa').html(response.daftar_desa).show();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
                }

            });
        });
    });
</script>