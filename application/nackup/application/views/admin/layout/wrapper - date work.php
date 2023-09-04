<?php
		$superadmin = array('62');
		$admin = array('62','63');
		$task = $this->uri->rsegment(1);
		$action = $this->uri->rsegment(2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/')?>bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
  <style>
.content-wrapper {
    background-color: #f9f9f9;
}
.main-header .sidebar-toggle:before {
  content: "\f00d";
}
.btn {
	margin-top: 2px;
	margin-bottom: 2px;
}
.labelnav {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 12px;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
.namatoko {
	text-align: center;
	font-size: 14px;
	margin: 20px 0px 20px 0px;
}
  </style>
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url('admin/dashboard') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?=$config->name?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<?php
if($task != 'dashboard') {
?>
      <!--<a href="#" class="sidebar-toggle" role="button" onclick="javascript: window.history.back()">
        <span class="sr-only">Close</span>
      </a>-->
<?php
}
?>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <i class="fa fa-user"></i>
              <!--<img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?=$this->session->userdata('fullname');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!--<li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li> -->
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
<!--          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<!--      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> <br/><br/>
        </div>
        <div class="pull-left info">
          <p>
<?php
//date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();
//if($this->session->userdata('status') == "login"){ echo 'Login'; } else { 'logout'; }
?>		  
		  </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->
      <!-- search form -->
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= base_url('admin/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
<?php if(in_array($this->session->userdata('usertype'),$superadmin)) { ?>
        <li><a href="<?= base_url('admin/config') ?>"><i class="fa fa-edit"></i> <span>Site Config</span></a></li>
<?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear text-blue"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/owner') ?>"><i class="fa fa-user"></i>Profil Pemilik</a></li>
            <li><a href="<?= base_url('admin/kamar') ?>"><i class="fa fa-bed"></i>Kamar</a></li>
            <li><a href="<?= base_url('admin/config/denda/1') ?>"><i class="fa fa-edit"></i>Denda</a></li>
            <li><a href="<?= base_url('admin/bank') ?>"><i class="fa fa-bank"></i>Info Bank</a></li>
            <li><a href="<?= base_url('admin/config/kuitansi/1') ?>"><i class="fa fa-edit"></i>Variabel Kuitansi</a></li>
            <li><a href="<?= base_url('admin/config/pln/1') ?>"><i class="fa fa-edit"></i>Variabel Kwh PLN</a></li>
            <li><a href="<?= base_url('admin/biayatambahan') ?>"><i class="fa fa-edit"></i>Biaya Tambahan Kamar</a></li>
            <li><a href="<?= base_url('admin/pengeluaranrutin') ?>"><i class="fa fa-edit"></i>Jenis Pengeluaran Rutin</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Penyewa Kos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/penyewa/add') ?>"><i class="fa fa-tag"></i>Pendaftaran</a></li>
            <li><a href="<?= base_url('admin/penyewa') ?>"><i class="fa fa-edit"></i>Data Penyewa</a></li>
            <li><a href="<?= base_url('admin/penyewa/pindah') ?>"><i class="fa fa-crop"></i>Pindah Kamar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/pembayaran/add') ?>"><i class="fa fa-tag"></i>Bayar Sewa</a></li>
            <li><a href="<?= base_url('admin/pembayaran') ?>"><i class="fa fa-edit"></i>Data Pembayaran</a></li>
            <li><a href="<?= base_url('admin/pembayaran/cekout') ?>"><i class="fa fa-crop"></i>Check Out</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Pemasukan Lain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Tambah Data</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Edit Data</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Pengeluaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Rutin</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Insidentil</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Laporan Kamar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Status Kamar</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Kamar Available</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Laporan Pendaftaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Laporan Pendaftaran</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Status Penghuni</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Cetak Pendaftaran</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Laporan Pendaftaran</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Laporan Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Rekap Bulanan</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Cicilan / Belum Lunas</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Per Penyewa</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Belum Bayar</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Cetak Kuitansi</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Laporan Lain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Pemasukan Lain</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Pengeluaran</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Laba Rugi</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url('admin/dashboard/config') ?>"><i class="fa fa-university text-blue"></i> <span>My Store</span></a></li>
        <li><a href="<?= base_url('admin/faq') ?>"><i class="fa fa-question text-blue"></i> <span>FAQ</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart text-blue"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right text-blue"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/order/baru') ?>"><i class="fa fa-cart-plus"></i> Transaksi <span class="labelnav bg-blue">Baru</span></a></li>
            <li><a href="<?= base_url('admin/order/confirm') ?>"><i class="fa fa-credit-card"></i> Transaksi <span class="labelnav bg-green">Dibayar</span></a></li>
            <li><a href="<?= base_url('admin/order/shipping') ?>"><i class="fa fa-truck"></i> Transaksi <span class="labelnav bg-black">Dikirm</span></a></li>
            <li><a href="<?= base_url('admin/order/finished') ?>"><i class="fa fa-cubes"></i> Transaksi <span class="labelnav bg-yellow">Selesai</span></a></li>
            <li><a href="<?= base_url('admin/order/cancel') ?>"><i class="fa fa-cart-arrow-down"></i> Transaksi <span class="labelnav bg-red">Dibatalkan</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags text-blue"></i> <span>Pengaturan Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/product') ?>"><i class="fa fa-tag"></i>Data Product</a></li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="fa fa-edit"></i>Kategori Produk</a></li>
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-crop"></i>Varian Size</a></li>
            <li><a href="<?= base_url('admin/color') ?>"><i class="fa fa-eyedropper"></i>Varian Warna</a></li>
          </ul>
        </li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/category/add') ?>"><i class="fa fa-circle-o"></i>Tambah Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/subcategory') ?>"><i class="fa fa-circle-o"></i>Data Sub Category</a></li>
            <li><a href="<?= base_url('admin/subcategory/add') ?>"><i class="fa fa-circle-o"></i>Tambah Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Size</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-blue">
            <li><a href="<?= base_url('admin/size') ?>"><i class="fa fa-circle-o"></i>Data Size</a></li>
            <li><a href="<?= base_url('admin/size/add') ?>"><i class="fa fa-circle-o"></i>Tambah Size</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Color</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/color') ?>"><i class="fa fa-circle-o"></i>Data Color</a></li>
            <li><a href="<?= base_url('admin/color/add') ?>"><i class="fa fa-circle-o"></i>Tambah Color</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/slider') ?>"><i class="fa fa-circle-o"></i>Data Slider</a></li>
            <li><a href="<?= base_url('admin/slider/add') ?>"><i class="fa fa-circle-o"></i>Tambah Slider</a></li>
          </ul>
        </li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building-o text-blue"></i> <span>Pengaturan Toko</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/banner') ?>"><i class="fa fa-picture-o"></i>Data Banner</a></li>
            <li><a href="<?= base_url('admin/bank') ?>"><i class="fa fa-cc-mastercard"></i>Data Bank</a></li>
          </ul>
        </li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-bluet"></i> <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/ticker') ?>"><i class="fa fa-circle-o"></i>Data News</a></li>
            <li><a href="<?= base_url('admin/ticker/add') ?>"><i class="fa fa-circle-o"></i>Tambah News</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/bank') ?>"><i class="fa fa-circle-o"></i>Data Bank</a></li>
            <li><a href="<?= base_url('admin/bank/add') ?>"><i class="fa fa-circle-o"></i>Tambah Bank</a></li>
          </ul>
        </li>-->
<?php if(in_array($this->session->userdata('usertype'),$admin)) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit text-blue"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-circle-o"></i>Data User</a></li>
            <li><a href="<?= base_url('admin/user/add') ?>"><i class="fa fa-circle-o"></i>Tambah User</a></li>
          </ul>
        </li>
<?php } ?>
<!--        <li><a href="<?= base_url('admin/order') ?>"><i class="fa fa-book"></i> <span>Transaksi</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title?>
        <small>Version <?=$config->version?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<?php
//	$task = $this->uri->rsegment(1);
//	$action = $this->uri->rsegment(2);
	if($task == 'order') {
		$breadcrumb = 'Transaksi'; 
	} else {
		$breadcrumb =  ucfirst($task);
	}
?>
        <li class="active"><?=$breadcrumb?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	require_once('content.php');
?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?=$config->version?>
    </div>
    <strong>Copyright &copy; 2019 <?=$config->name?>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?=base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>assets/admin/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/admin/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/admin/dist/js/demo.js"></script>
<!-- JS Color for demo purposes -->
<script src="<?=base_url()?>assets/admin/dist/js/jscolor.js"></script>
<!-- CK Editor -->
<script src="<?=base_url()?>assets/admin/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    $('.select2').select2()
    $('.select3').select2()
    $('.select4').select2()

	$('#mytable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	$("#loading").hide();
	
	$("#category").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#subcategory").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?=base_url('admin/product/subcategory')?>", // Isi dengan url/path file php yang dituju
			data: {catid : $("#category").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				setTimeout(function(){
					$("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#subcategory").html(response.data_kota).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });

	$("#loading").hide();
	
	$("#province").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#city").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?=base_url('user/getkota')?>", // Isi dengan url/path file php yang dituju
			data: {prov_id : $("#province").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				setTimeout(function(){
					$("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#city").html(response.data_kota).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });

	$("#sewa").change(function(){ 
		if($(this).val() == '1'){ 
			$('.lamasewa').text('tahun');
			document.getElementById("nourut").value = $(this).val();
		} else if($(this).val() == '2'){
			$('.lamasewa').text('bulan');
			document.getElementById("nourut").value = $(this).val();
		} else if($(this).val() == '3'){
			$('.lamasewa').text('minggu');
			$('.textmasuk').text('Tanggal Checkin');
			$('.textakhir').text('Tanggal Checkout');
			document.getElementById("nourut").value = $(this).val();
		} else if($(this).val() == '4'){
			$('.lamasewa').text('hari');
			$('.textmasuk').text('Tanggal Checkin');
			$('.textakhir').text('Tanggal Checkout');
			document.getElementById("nourut").value = $(this).val();
		}
    });

	
	$("#lama").change(function(){ 
		var arg = parseInt($('#lama').val());
		var d = $('#datepicker32').datepicker('getDate');
//		d.setDate(d.getDate() + arg);
//		alert(d);
//		$('#datepicker34').datepicker('setDate', d);
		if($('#sewa').val() == '1'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear()+arg, d.getMonth(), d.getDate()));
		} else if($('#sewa').val() == '2'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth()+arg, d.getDate()));
		} else if($('#sewa').val() == '3'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth(), d.getDate() + (arg * 7 )));
		} else if($('#sewa').val() == '4'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth(), d.getDate() + arg));
		}
    });

		$("#kamar").change(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var kamar = $('#kamar').val();

      		$.ajax({
            	type : 'POST',
           		url : "<?=base_url('admin/dashboard/getkamar')?>",
            	data :  {'id' : kamar},
				dataType: 'JSON',
					success: function (response) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					//$("#tarif").html(data).show();
					 var bulanan = response.bulanan;

					//alert('the server returned ' + response.bulanan);
					document.getElementById("tarif").value = response.bulanan;
					document.getElementById("fasilitas").value = response.fasilitas;
				}
          	});
		});

    $("#datepicker32").datepicker()
        .on('changeDate', function (selected) {
			if($('#lama').val()){ 
				var arg = parseInt($('#lama').val());
			} else {
				var arg = 0;
			}
		var d = $('#datepicker32').datepicker('getDate');
		if($('#sewa').val() == '1'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear()+arg, d.getMonth(), d.getDate()));
		} else if($('#sewa').val() == '2'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth()+arg, d.getDate()));
		} else if($('#sewa').val() == '3'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth(), d.getDate() + (arg * 7 )));
		} else if($('#sewa').val() == '4'){
			$('#datepicker34').datepicker("setDate", new Date(d.getFullYear(), d.getMonth(), d.getDate() + arg));
		}
    });

});

	$("#datepicker31,#datepicker32,#datepicker33,#datepicker34,#datepicker35,#datepicker36,#datepicker37,#datepicker41,#datepicker42,#datepicker43").datepicker({dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd', autoclose: true});

	function getPdf1(row){
		window.open("<?=base_url('admin/pdfreport/cetakpdf/')?>"+row,'nama_window_pop_up','width=800,height=400,scrollbars=yes,resizeable=yex');
	}
	function getPdfAll(){
		window.open("<?=base_url('admin/pdfreport/cetakpdfall')?>",'nama_window_pop_up','width=800,height=400,scrollbars=yes,resizeable=yex');
	}

	$("#datepicker31,#datepicker32").datepicker("setDate", new Date());

    //Date picker
    $('#datepicker,').datepicker({
	  format: 'yyyy-mm-dd hh:mm:00 a',
	  autoclose: true
    })

<?php if($this->uri->rsegment(1) == 'penyewa') { ?>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrapa"); //Fields wrapper
    var add_button      = $(".add_field_buttona"); //Add button ID
    var mybiaya = '<?php
$i = 1; foreach($biaya as $row) { ?>
<option value="<?=$row->id?>"><?=$row->nama?> - <?=$row->nominal?></option><?php
$i++; } 
?>'
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append( '<div class="form-group"><div class="col-sm-8"><select name="biayaid" class="form-control select2" id="biayaid">' + mybiaya + '</select></div><a href="#" class="remove_field btn btn-default">Remove</a></div>');
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
<?php } ?>
</script>
</body>
</html>
