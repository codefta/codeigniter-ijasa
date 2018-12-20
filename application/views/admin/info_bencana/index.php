<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>
<?php $this->load->view('admin/partials/breadcumb.php'); ?>
    
    <div class="row">
        <div class="col-md-9">
            <a href="<?php echo site_url('infobencana/tambah_info') ?>" class="btn btn-success mb-3">Tambah Info</a>
        </div>
        <div class="col-md-3">
            <input class="form-control" type="text" id="keyword" placeholder="cari">
        </div>
    </div>
    
    <?php $this->load->view('admin/partials/notif.php'); ?>
    <table class="table table-striped table-responsive-sm table-responsive-md page-table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bencana</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" colspan="2" class="text-center">Kebutuhan</th>
                <th scope="col">Foto</th>
                <th scope="col" colspan="2" class="text-center">Tindakan</th>
            </tr>
        </thead>
        <tbody id="myTable"> 
            <?php
                $no = 1;
                foreach($info as $data) : ?>
            <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td><?php echo $data['nama']?></td>
                <td><small ><?php echo $data['desa'].', '.$data['kecamatan'].', <br>'.$data['kabupaten'].', '.$data['provinsi'] ?></small></td>
                <td><?php echo word_limiter($data['deskripsi'],10) ?></div></td>
                <td>
                Makanan <br>
                Pakaian <br>
                Buku    <br>
                kendaraan <br>
                </td>
                <td>
                <?php echo $data['makanan'].' <br>'?>
                <?php echo $data['pakaian'].' <br>'?>
                <?php echo $data['buku'].' <br>'?>
                <?php echo $data['kendaraan'].' <br>'?>
                </td>
                <td><img src="<?php echo base_url().'uploads/infobencana/'.$data['foto'] ?>" style="width: 35px; height: 35px"></td>
                <td><a href="<?php echo site_url('infobencana/sunting_info/'.$data['idbencana']) ?>" class="btn btn-primary">Sunting</a></td>
                <td><a href="<?php echo site_url('infobencana/hapus_info/'.$data['idbencana']) ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <a href="#" class="btn btn-info paginate float-right" id="previous">Sebelumnya</a>
        <a href="#" class="btn btn-info paginate float-right" id="next">Selanjutnya</a>
    </div>

<?php $this->load->view('admin/partials/footer.php'); ?>
<?php $this->load->view('admin/partials/js.php'); ?>
<script>
$(function(){
    var myTable = ".page-table";
    var myTableBody = myTable + " tbody";
    var myTableRows = myTable + " tr";
    var myTableColumn = myTable + " th";

    function initTable(){
        $(myTableBody).attr("data-pageSize", 6);
        $(myTableBody).attr("data-firstRecord", 0);
        $('#previous').hide();
        $('#next').show();

        paginate(parseInt($(myTableBody).attr("data-firstRecord"), 10),
                parseInt($(myTableBody).attr("data-pageSize"), 10));
    }

    $(myTableColumn).click(function(){
        paginate(parseInt($(myTableBody).attr("data-firstRecord"), 10),
                parseInt($(myTableBody).attr("data-pageSize"), 10));
    });

    $("a.paginate").click(function(e){
        e.preventDefault();
        var tableRows = $(myTableRows);
        var tmpRec = parseInt($(myTableBody).attr("data-firstRecord"), 10);
        var pageSize = parseInt($(myTableBody).attr("data-pageSize"), 10); 

        if($(this).attr("id") == "next"){
            tmpRec += pageSize;
        } else{
            tmpRec -= pageSize;
        }

        if(tmpRec < 0 || tmpRec > tableRows.length) return

        $(myTableBody).attr("data-firstRecord", tmpRec);
        paginate(tmpRec, pageSize);
    });

    var paginate = function(start, size){
        var tableRows = $(myTableRows);
        var end = start + size;

        tableRows.hide();

        tableRows.slice(start, end).show();

        $(".paginate").show();

        if(tableRows.eq(0).is(":visible")) $('#previous').hide();
        if(tableRows.eq(tableRows.length -1 ).is(":visible")) $('#next').hide();
    }

    initTable();


});
</script>
<script>
    $('batas').text(function(index, currentText){
        var maxLength = 10;
        if(currentText.length > maxLength){
            return currentText.substr(0, maxLength) + "...";
        } else {
            return currentText;
        }
    });
</script>
<script>
    $(document).ready(function(){
        $("#keyword").on("keyup", function(){
            var value= $(this).val().toLowerCase();
            $("#myTable tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>