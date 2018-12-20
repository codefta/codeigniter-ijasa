<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>
<?php $this->load->view('admin/partials/breadcumb.php'); ?>
</nav>

<div class="row mb-2">
    <div class="col-md-3">
        <input class="form-control" type="text" id="keyword" placeholder="cari">
    </div>
</div>
<table class="table table-striped table-responsive-sm table-responsive-md page-table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Bencana</th>
            <th scope="col" colspan="2">Jenis Kebutuhan</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal diterima</th>
            <th scope="col" colspan="2" class="text-center">Tindakan</th>
        </tr>
    </thead>
    <tbody id="myTable"> 
        <?php
            $no = 1;
            foreach($validasi as $data) : ?>
        <tr>
            <td scope="row"><?php echo $no++ ?></td>
            <td><?php echo $data->tanggal ?></td>
            <td><?php echo $data->nama_pengguna?></td>
            <td><?php echo $data->info_bencana?></td>
            <td>
            <ul>
                <li>Makanan</li>
                <li>Pakaian</li>
                <li>Buku</li>
                <li>Kendaraan</li>
            </ul></td>            
            <td><?php echo "$data->makanan <br> $data->pakaian <br> $data->buku <br> $data->kendaraan"?></td>
            <td><?php echo $data->nama_status ?></td>            
            <td><?php echo $data->tgl_diterima ?></td>            
            <td><div class="text-center"><a class="btn btn-success text-white <?php if($data->id_stats == '2') echo 'disabled' ?>" data-toggle="modal" data-target="#modal_edit<?php echo $data->idtransaksi?>"><?php if($data->id_stats == '2'){echo 'Diterima';} else {echo 'Verifikasi';} ?></a></div></td>
            <td><div class="text-center"><a href="<?php echo site_url('validasilogistik/delete_validasi/'.$data->idtransaksi) ?>" onclick="return confirm('apakah anda yakin?')" class="btn btn-danger">Hapus</a></div></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="row ">
    <div class="col-md-12">
    <a href="#" class="btn btn-success paginate float-right" id="next">Selanjutnya</a>
    <a href="#" class="btn btn-secondary mr-2 paginate float-right" id="previous">Sebelumnya</a>
    </div>   
</div>

<?php 
    foreach($validasi as $data): 
        $id = $data->idtransaksi;
        $id_status = $data->idstats;
        $tanggal = $data->tgl_diterima;
    ?>

    <div class="modal" id="modal_edit<?php echo $id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Penerimaan Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('validasilogistik/save_validasi')?>" method="post" >
                <div class="modal-body">
                    <input type="text" name="idvalid" value="<?php echo $id ?>" hidden>
                    <div class="form-group">
                        <h6 class="text-center">Apakah barang sudah sampai ditempat?</h6>
                        <input type="text" value="2" name="status" hidden>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
        
                    
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
    $(document).ready(function(){
        $("#keyword").on("keyup", function(){
            var value= $(this).val().toLowerCase();
            $("#myTable tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>