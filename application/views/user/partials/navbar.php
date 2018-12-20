<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-after">
        <div class="container">
            <a class="navbar-brand btn bg-ijasa" href="<?php echo base_url() ?>">Ijasa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link nav-link-scroll <?php if($this->uri->segment(1) == 'beranda') echo 'active' ?>" href="<?php echo site_url('beranda') ?>">Beranda <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link nav-link-scroll <?php if($this->uri->segment(1) == 'deskripsibencana') echo 'active' ?>" href="<?php echo site_url('deskripsibencana') ?>">Info Bencana</a>
                </div>
                <?php if ($this->session->userdata('logged_in') != TRUE){ ?>
                    <a href="<?php echo site_url('auth') ?>" class="btn btn-primary ml-auto tombol tombol-scroll" <?php if($this->uri->segment(1)=="auth") echo 'hidden'; ?>>Login</a>
                <?php } else {?>
                    <div class="dropdown ml-auto dropdown-menu-right mr-3" <?php if($this->uri->segment(1)=="auth") echo 'hidden'; ?>>
                        <a class="shadow-sm" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url().'uploads/profil/'.$this->session->userdata('logged_in')['foto']; ?>" class="rounded-circle" style="width: 35px; height: 35px">
                        </a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuLink">
                        <div class="row">
                            <div class="col-2 m-2">
                                <img src="<?php echo base_url().'uploads/profil/'.$this->session->userdata('logged_in')['foto']; ?>" class="rounded-circle" style="width: 35px; height: 35px">
                            </div>
                            <div class="col align-self-center">
                                <a class="dropdown-item profil" href="<?php echo site_url('profil') ?>">Profile</a>
                            </div>
                        </div>
                        <hr>
                        <a class="dropdown-item text-center profil" href="<?php echo site_url('deskripsibencana/status_donasi/'.$this->session->userdata('logged_in')['id']) ?>">Status Donasi</a>
                        <hr>
                        <a class="dropdown-item text-center profil" href="<?php echo site_url('auth/logout') ?>">logout</a>
                    </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>