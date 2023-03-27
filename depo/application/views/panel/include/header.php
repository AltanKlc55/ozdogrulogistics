<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ÖZDOĞRU GRUP Nakliye Uygulaması</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/sweetalert/');?>sweetalert2.min.js"></script>
    <script src="<?php echo base_url('assets/js/');?>redirect.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>


<link rel="stylesheet" href="<?php echo base_url('assets/js/sweetalert/');?>sweetalert2.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img style="height: 45px;" src="<?=base_url('upload/');?>odlp.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Depo</div>
            </a>

            <?php
            $admin = get_yetki($_SESSION['user_id']);
            $adminids = json_decode($admin);

                ?>



            <?php

            for ($i = 0; $i < count($adminids); ++$i){

            if($adminids[$i] == 'admin'){
            ?>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="panel">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Yönetim Paneli</span></a>
            </li>

   <?php }}
   ?>





            <?php

            for ($i = 0; $i < count($adminids); ++$i){
            if($adminids[$i] == 'depo'){
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kargo
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-fw fa-truck-moving"></i>
                    <span>Kargo İşlemleri</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url();?>kargolar">Kargo Listesi</a>
                        <a class="collapse-item" href="<?=base_url();?>kargo-ekle">Yeni Kargo Ekle</a>
                    </div>
                </div>
            </li>

            <?php }}
            ?>



            <?php

            for ($i = 0; $i < count($adminids); ++$i){
            if($adminids[$i] == 'kargostrateji'){
            ?>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Detaylı Kargo İşlemleri
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
                   aria-expanded="true" aria-controls="collapseTwo2">
                    <i class="fas fa-fw fa-chess-knight"></i>
                    <span>Kargo Stratejisi</span>
                </a>
                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="<?=base_url()?>hizli-programla">Tır Programla (Hızlı)</a>
                        <a class="collapse-item" href="<?=base_url()?>kargo-programla">Tır Programla (Standart)</a>
                        <a class="collapse-item" href="<?=base_url()?>kargo-strateji" >Tır Listelesi</a>
                        <a class="collapse-item" href="<?=base_url()?>kargo-programla-eu">Dağıtım Programla</a>
                        <a class="collapse-item" href="<?=base_url()?>kargo-strateji-eu" >Dağıtım Listelesi</a>
                        <a class="collapse-item" href="<?=base_url()?>kargo-strateji-tamamlanan" >Tamamlanan Listeler</a>

                    </div>
                </div>
            </li>


            <?php }}
            ?>



            <?php

            for ($i = 0; $i < count($adminids); ++$i){
            if($adminids[$i] == 'depo'){
            ?>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Depo Kargo İşlemleri
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barkod"
                   aria-expanded="true" aria-controls="barkod">
                    <i class="fas fa-fw fa-barcode"></i>
                    <span>Barkod Okutma</span>
                </a>
                <div id="barkod" class="collapse" aria-labelledby="headingTwo" data-parent="#barkod">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url()?>kargo-okut">Sevkiyat Okut</a>
                    </div>
                </div>
            </li>

            <?php }}
            ?>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Arama Yap..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Arama Yap..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>

                             <!--   <span class="badge badge-danger badge-counter"> </span>-->
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Bildirimler
                                </h6>

                                <!--     <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                -->

                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['ad_soyad'];?></span>
                                 <img class="img-profile rounded-circle"
                                    src="<?=base_url('assets/');?>img/undraw_profile.svg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Çıkış
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>