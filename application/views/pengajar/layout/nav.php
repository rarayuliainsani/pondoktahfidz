<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- MENU USER -->
        <li><a href="<?php echo base_url('pengajar/dasbor') ?>"><i class="fa fa-dashboard text_aqua"></i> <span>DASHBOARD</span></a></li>
         <li><a href="<?php echo base_url('pengajar/biodata') ?>"><i class="fa fa-male"></i> <span>Biodata</span></a></li>
         <li><a href="<?php echo base_url('pengajar/pertemuan')?>"><i class="fa fa-file"></i><SPAN>Pertemuan</SPAN></a></li>
         <li><a href="<?php echo base_url('pengajar/absensi')?>"><i class="fa fa-book"></i><SPAN>Absensi</SPAN></a></li>
         <li><a href="<?php echo base_url('pengajar/surat')?>"><i class="fa fa-book"></i><SPAN>Surat</SPAN></a></li>
         <li><a href="<?php echo base_url('pengajar/hafalan') ?>"><i class="fa fa-table"></i><SPAN>Hafalan Santri</SPAN></a></li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporan_kehadiran') ?>"><i class="fa fa-file-text"></i>Laporan Kehadiran</a></li>
            <li><a href="<?php echo base_url('laporan_hafalan') ?>"><i class="fa fa-file-text"></i>Laporan Hafalan</a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $title ?>
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