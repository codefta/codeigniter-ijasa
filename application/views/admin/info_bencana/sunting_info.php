<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>

                <h4>Sunting Info Bencana</h4>
                <hr>
                <?php echo form_open_multipart('infobencana/save_sunting_info'); ?>
                <form action="<?php echo site_url('infobencana/save_sunting_info')?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $info->idbencana ?>">
                    <input type="hidden" name="id_lokasi" value="<?php echo $info->lokasi_id ?>">
                    <div class="form-group">
                        <label class="border-bottom">Nama Bencana</label>
                        <input type="text" name="namabencana" class="form-control" value="<?php echo $info->nama ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="border-bottom">Lokasi</label>
                            <select class="custom-select mb-2" name="provinsi" id="provinsi">
                            <option value="<?php NULL ?>">Provinsi</option>
                            <?php foreach($provinsi as $data) : ?>
                                <option value="<?php echo $data->id ?>" <?php if($data->id == $info->provinsi_id) echo 'selected'; ?>> <?php echo $data->name ?></option>
                            <?php endforeach;?>
                            </select>
                            <select class="custom-select mb-2" name="kabupaten" id="kabupaten">
                            <?php foreach($kabupaten as $data) : ?>
                                <option value="<?php echo $data->id_kab ?>" <?php if($data->id == $info->kabupaten_id) echo 'selected'; ?>> <?php echo $data->name_kab ?></option>
                            <?php endforeach;?>
                            </select>
                            <select class="custom-select mb-2" name="kecamatan" id="kecamatan">
                            <?php foreach($kecamatan as $data) : ?>
                                <option value="<?php echo $data->id_kec ?>" <?php if($data->id == $info->kecamatan_id) echo 'selected'; ?>> <?php echo $data->name_kec ?></option>
                            <?php endforeach;?>
                            </select>
                            <select class="custom-select mb-2" name="desa" id="desa">
                            <?php foreach($desa as $data) : ?>
                                <option value="<?php echo $data->id_desa ?>" <?php if($data->id_desa == $info->desa_id) echo 'selected'; ?>> <?php echo $data->name_desa ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="border-bottom">Deskripsi Bencana</label>
                        <textarea class="form-control" rows="10" name="deskripsi" value="<?php echo $info->deskripsi ?>"> <?php echo $info->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="border-bottom">Gambar</label><br>
                        <img src="<?php echo base_url().'uploads/infobencana/'.$info->foto ?>" style="width: 200px; height: 200px;"><br>
                        <input type="file" class="form-control-file" id="file" name="foto" hidden>
                        <label for="file" class="btn btn-secondary mt-2">Ganti</label>
                    </div>

                    <input type="hidden" name="image_lama" value="<?= $info->foto ?>">
                    <input type="hidden" name="id_kebutuhan" value="<?= $kebutuhan->idbutuh ?>">

                    <div class="form-group">
                        <label class="border-bottom">Kebutuhan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text" style="width: 120px;">Makanan</div>
                            </div>
                            <input type="number" class="form-control" id="inlineFormInputGroup" name="makanan" value="<?php echo $kebutuhan->makanan ?>">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text" style="width: 120px;">Pakaian</div>
                            </div>
                            <input type="number" class="form-control" id="inlineFormInputGroup" name="pakaian" value="<?php echo $kebutuhan->pakaian ?>">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text" style="width: 120px;">Buku</div>
                            </div>
                            <input type="number" class="form-control" id="inlineFormInputGroup" name="buku" value="<?php echo $kebutuhan->buku ?>">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text" style="width: 120px;">Kendaraan</div>
                            </div>
                            <input type="number" class="form-control" id="inlineFormInputGroup" name="buku" value="<?php echo $kebutuhan->kendaraan ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Sunting</button>
                </form>

<?php $this->load->view('admin/partials/footer.php'); ?>
<?php $this->load->view('admin/partials/js.php'); ?>

<script>
    $(document).ready(function(){
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