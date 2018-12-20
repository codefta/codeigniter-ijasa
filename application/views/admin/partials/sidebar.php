<nav id="sidebar">
            <div class="sidebar-header pl-3 pt-2">
                <h1>Ijasa</h1>
                <hr class="hr">
                <p>Sistem Jemput Donasi Bencana</p>
            </div>

            <ul class="list-unstyled components pl-3">
                <?php if($this->session->userdata('logged_in')['username'] == 'admin') : ?>
                <li class="<?php if($this->uri->segment(1)=="dashboard") echo 'active'; ?>">
                    <a href="<?= site_url('dashboard') ?>"><i class="fas fa-th-large"></i><span class="space-word"></span>Dashboard</a>
                </li>
                <?php endif; ?>
                <?php if($this->session->userdata('logged_in')['username'] == 'petugas') : ?>
                <li class="<?php if($this->uri->segment(1)=="infobencana") echo 'active'; ?>">
                    <a href="<?= site_url('infobencana') ?>"><i class="fas fa-info-circle"></i><span class="space-word"></span>Info Bencana</a>
                </li>
                <?php endif; ?>
                <!-- <?php //if($this->session->userdata('logged_in')['username'] == 'admin') : ?>
                <li class="<?php //if($this->uri->segment(1)=="kebutuhanlogistik") echo 'active '; ?>">
                    <a class="" href="<?//= //site_url('kebutuhanlogistik') ?>"><i class="fas fa-briefcase"></i><span class="space-word"></span>Kebutuhan Logistik</a>
                </li>
                <?php// endif; ?> -->
                <?php if($this->session->userdata('logged_in')['username'] == 'petugas') : ?>
                <li class="<?php if($this->uri->segment(1)=="") echo 'active'; ?>">
                    <a  href="<?= site_url('validasilogistik') ?>"><i class="fas fa-check-circle"></i><span class="space-word"></span>Validasi Logistik</a>
                </li>
                <?php endif; ?>
                <?php if($this->session->userdata('logged_in')['username'] == 'admin') : ?>
                <li class="<?php if($this->uri->segment(1)=="daftarakun") echo 'active'; ?>">
                    <a class="<?php if($this->session->userdata('logged_in')['username'] == 'petugas') echo 'disabled'; ?>" href="<?= site_url('daftarakun') ?>"><i class="fas fa-users"></i></i><span class="space-word"></span>Daftar Pengguna</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>