<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ijasa</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php if ($this->uri->segment(1)=="dashboard") {
                    echo 'Dashboard';
                } else if($this->uri->segment(1)=="infobencana"){
                    echo 'Info Bencana';
                } else if($this->uri->segment(1)=="kebutuhanlogistik"){
                    echo 'Kebutuhan Logistik';
                } else if($this->uri->segment(1)=="validasilogistik"){
                    echo 'Validasi Logistik';
                } else if($this->uri->segment(1)=="daftarakun"){
                    echo 'Daftar Pengguna';
                }
                ?>
            </li>
        </ol>
</nav>