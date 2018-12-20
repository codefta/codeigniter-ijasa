<div id="navbar">
    <nav id="fixed" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-header">
            <i class="fas fa-align-justify"></i>
                <span>Dashboard</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarExpand" aria-controls="navbarExpand" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExpand">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-link">
                    <a class="text-success"><?php echo $id = $this->session->userdata('logged_in')['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content">
    <div class="card content-wrap shadow">
        <div class="card-body">