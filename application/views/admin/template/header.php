<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard - E-Module Statistika</title>
    <!-- General CSS Files -->
    <link rel="icon" href="<?=base_url('assets/')?>img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" >
    <!--Template CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>stisla-assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>stisla-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css">
    <script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url() ?>assets/ckeditor/adapters/jquery.js"></script>
    <script src="<?= base_url() ?>assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>assets/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
</head>

<body>


    <!-- Start Sidebar -->
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class=" navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" style="margin-bottom:4px !important;"
                                src="<?= base_url() ?>assets/stisla-assets/img/avatar/avatar-2.png"
                                class="rounded-circle mr-1 my-auto border-white">
                            <div class="d-sm-none d-lg-inline-block" style="font-size:15px;">Hello, 
                                <?php
                                $data['user'] = $this->db->get_where('admin', ['email' =>
                                    $this->session->userdata('email')])->row_array();
                                echo $data['user']['username'];
                                ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Admin - E-Module</div>
                            <a href="<?=base_url('welcome/logout')?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand text-danger">
                        <div>
                            <a href="<?=base_url('admin')?>"
                                style="font-size: 35px;font-weight:900;font-family: 'Poppins', sans-serif;"
                                class="text-success text-center"><i style="font-size: 30px;"
                                    class="fas fa-graduation-cap"></i> |
                                Statistika</a>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?=base_url('admin')?>">E-S</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header ">Dashboard</li>
                        <li class="nav-item dropdown active">
                            <a href="<?=base_url('admin')?>" class="nav-link"><i
                                    class="fas fa-desktop"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Management Siswa</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                                <span>Siswa</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?=base_url('admin/data_siswa')?>">Data Siswa</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Management Materi</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                                <span>Materi</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?=base_url('admin/data_materi')?>">Data Materi</a>
                                </li>
                                <li><a class="nav-link" href="<?=base_url('admin/tambah_materi')?>">Tambah Materi</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-header">Management Tugas</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                                <span>Tugas</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?=base_url('admin/data_tugas')?>">Data Tugas</a>
                                </li>
                                <li><a class="nav-link" href="<?=base_url('admin/cek_tugas')?>">Cek Jawaban Tugas</a>
                                </li>
                            </ul>
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                            <span>Angket</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?=base_url('admin/data_angket')?>">Data Angket</a>
                                </li>
                            </ul>

                        </li>
                </aside>
            </div>
        </div>
    </div>
            <!-- End Sidebar -->
