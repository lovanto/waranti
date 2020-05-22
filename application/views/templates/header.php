<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrator-<?=$_SESSION['nama_user']?></title>
  <link href='<?php echo base_url();?>assets/images/header.icon' rel='shortcut icon'>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
     @media print{
        .diprint{
                display: none;
            }
       
     }
   </style>
  <style type="text/css">
     @media print{
        #diprint{
                display: none;
            }
     }

  </style>

  <style type="text/css">
     @media print{
       .hide {
              display: inline;
           }
     }

  </style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="sidebar-brand d-flex align-items-center justify-content-center"class="diprint" href="<?= base_url('page/welcome'); ?>">
        <div class="sidebar-brand-icon rotate-n-20">
          <i class="fa fa-rss-square"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Waranti Sparepart</div>
      </a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama_user']?></span>
                <!-- <img class="img-profile rounded-circle" src=""> -->
              </a>
        <div class="input-group-append">
        </div>
      </div>
    </form>

    <!-- Navbar -->
   <!--  <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul> -->

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav diprint" >
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('page/welcome');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('page/pengguna');?>">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Register User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('page/gantiPassword');?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Ganti Password</span></a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-archive"></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Master Data</h6>
          <a class="dropdown-item" href="<?php echo base_url('page/kendaraan');?>">Kendaraan</a>
          <a class="dropdown-item" href="<?php echo base_url('page/part');?>">Sparepart</a>
          <a class="dropdown-item" href="<?php echo base_url('page/rak');?>">Rak</a>
          <a class="dropdown-item" href="<?php echo base_url('page/karyawan');?>">Karyawan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-registered"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Transaksi Data</h6>
          <a class="dropdown-item" href="<?php echo base_url('page/detail');?>">Backup Detail Part</a>
        </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-print"></i>
            <span>Laporan</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Laporan Master :</h6>
                <a class="dropdown-item fa fa-folder" href="<?php echo base_url('page/laporan_all_kendaraan'); ?>">Laporan Kendaraan</a>
                <a class="dropdown-item fa fa-user" href="<?php echo base_url('page/laporan_all_rak'); ?>">Laporan Rak</a>
                <a class="dropdown-item fa fa-save" href="<?php echo base_url('page/laporan_all_sparepart'); ?>">Laporan Sparepart</a>
                <a class="dropdown-item fa fa-user-circle" href="<?php echo base_url('page/laporan_all_karyawan'); ?>">Laporan Karyawan</a>
                <a class="dropdown-item fa fa-user" href="<?php echo base_url('page/laporan_all_pengguna'); ?>">Laporan Pengguna</a>
              <h6 class="dropdown-header">Laporan Transaksi :</h6>
                <a class="dropdown-item fa fa-envelope" href="<?php echo base_url('page/laporan_all_detail'); ?>">Laporan Detail Part</a>
              <h6 class="dropdown-header">Laporan Periode :</h6>
                <a class="dropdown-item fa fa-envelope" href="<?php echo base_url('page/laporan_detail_part'); ?>">Laporan Part Periode</a>
            </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('backup');?>">
          <i class="fa fa-server"></i>
          <span>Backup</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('backup/restore');?>">
          <i class="fas fa-fw fa-save"></i>
          <span>Restore</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout');?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Logout</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

            
       
        </div>

        <!-- Area Chart Example-->
       