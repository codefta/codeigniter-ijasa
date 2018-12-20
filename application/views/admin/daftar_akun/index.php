<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>
<?php $this->load->view('admin/partials/breadcumb.php'); ?>
    
    <div class="row mb-2">
        <div class="col-md-3">
            <input class="form-control" type="text" id="keyword" placeholder="cari">
        </div>
    </div>
    <?php $this->load->view('admin/partials/notif.php'); ?>
    <table class="table table-striped table-responsive page-table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Foto</th>
                <th scope="col">Username</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody id="myTable"> 
            <?php
                $no = 1;
                foreach($daftar_akun as $data) : ?>
            <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td><?php echo $data['nama']?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['nohp'] ?></td>
                <td><img src="<?php echo base_url().'uploads/profil/'.$data['foto']?>" style="width: 35px; height: 35px"> </td>
                <td><?php echo $data['username'] ?></td>
                <td><a href="<?php echo site_url('daftarakun/hapus_akun/'.$data['id']) ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
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
<?php $this->load->view('admin/partials/footer'); ?>
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