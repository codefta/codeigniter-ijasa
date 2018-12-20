<?php $this->load->view('admin/partials/header.php'); ?>
<?php $this->load->view('admin/partials/navbar.php'); ?>
<?php $this->load->view('admin/partials/sidebar.php'); ?>
<?php $this->load->view('admin/partials/breadcumb.php'); ?>

</nav>
<?php $this->load->view('admin/partials/notif.php'); ?>
<table class="table table-striped table-responsive-sm table-responsive-md">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Bencana</th>
            <th scope="col">Kebutuhan Logistik</th>
            <th scope="col">Jumlah Sekarang</th>
            <th scope="col">Jumlah Target</th>
        </tr>
    </thead>
    <tbody> 
        <?php
            $no = 1;
            foreach($log as $data) : ?>
        <tr>
            <td scope="row"><?php echo $no++ ?></td>
            <td><?php echo $data['id_bencana'] ?></td>
            <td><?php echo $data['jenis']?></td>
            <td><?php echo $data['jumlah_target'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                    
<?php $this->load->view('admin/partials/footer.php'); ?>
<?php $this->load->view('admin/partials/js.php'); ?>