 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- MENU DASHBOARD -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text_aqua"></i> <span>DASHBOARD</span></a></li>
        <!-- MENU USER -->

          <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-user"></i> Pengguna</a></li>
          <li><a href="<?php echo base_url('admin/pendaftaran') ?>"><i class="fa fa-address-book"></i> Data Pendaftaran</a></li>
          <li><a href="<?php echo base_url('admin/santri') ?>"><i class="fa fa-child"></i> Data Santri</a></li>
          <li><a href="<?php echo base_url('admin/pengajar') ?>"><i class="fa fa-male"></i> Data Pengajar</a></li>
          <li><a href="<?php echo base_url('admin/kelompok') ?>"><i class="fa fa-group"></i> Data Kelompok</a></li>
          <li><a href="<?php echo base_url('admin/kelompoksantri') ?>"><i class="fa fa-institution"></i> Data Kelompok Santri</a></li>
          <li><a href="<?php echo base_url('admin/spp') ?>"><i class="fa fa-money"></i> Data SPP Santri</a></li>
          <li><a href="<?php echo base_url('admin/hafalan') ?>"><i class="fa fa-table"></i> Data Hafalan Santri</a></li>
          <li><a href="<?php echo base_url('admin/absensi') ?>"><i class="fa fa-file"></i> Data Absensi Santri</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporan_pendaftaran') ?>"><i class="fa fa-file-text"></i>Laporan Pendaftaran</a></li>
            <li><a href="<?php echo base_url('laporan_pendaftaran_pertahun') ?>"><i class="fa fa-file-text"></i>Laporan Pendaftaran Pertahun</a></li>
            <li><a href="<?php echo base_url('laporan_santri') ?>"><i class="fa fa-circle-o"></i>Laporan Santri</a></li>
          </ul>
        </li>
       
      </ul>
    </section>    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php  echo $title?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">