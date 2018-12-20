<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php if ($this->uri->segment(1) == "infobencana"){
            echo SITE_NAME ." - Info Bencana";
            } else if ($this->uri->segment(1) == "kebutuhanlogistik"){
                echo SITE_NAME ." - Kebutuhan Logistik";
            } else if ($this->uri->segment(1) == "dashboard"){
                echo SITE_NAME ." - Dashboard";
            }else if ($this->uri->segment(1) == "validasilogistik"){
                echo SITE_NAME ." - Validasi Logistik";
            }else if ($this->uri->segment(1) == "daftarakun"){
                echo SITE_NAME ." - Daftar Pengguna";
            } else {
                echo SITE_NAME;
            }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href= <?= base_url().'assets/css/bootstrap.css'?> >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?= base_url().'/assets/css/style.css' ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href=<?= ('"https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" ') ?>>

    <!-- Font Awesome JS -->
    <script src=<?= base_url().'assets/js/fontawesome.js' ?>></script>
    <script src=<?= base_url().'assets/js/solid.js' ?>></script>
</head>
<body>
    <div class="wrapper">