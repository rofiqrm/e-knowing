<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url('assets/')?>img/favicon.png" type="image/png">
    <!-- Title -->
    <title>Selamat datang - <?php
$data['user'] = $this->db->get_where('el_siswa', ['email' =>
    $this->session->userdata('email')])->row_array();
echo $data['user']['nama'];
?> - Student Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/linericon/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/popup/magnific-popup.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/user_style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/responsive.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/')?>bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/')?>js/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa">


    <!-- Start Navigation Bar -->
    <header class="header_area" style="background-color: white !important;">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?=base_url('welcome')?>"><img
                            src="<?=base_url('assets/')?>img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai,
                                <?php
                                $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                                    $this->session->userdata('email')])->row_array();
                                echo $data['user']['nama'];
                                ?></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?=base_url('user')?>">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                 Beranda</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url('user/profil')?>">
                                    <i class="fa fa-user"></i>
                                    Profil
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link text-danger" href="<?=base_url('welcome/logout')?>">
                                <i class="fa fa-sign-out"></i>
                                 Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Navigation Bar -->

