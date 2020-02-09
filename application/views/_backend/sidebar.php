<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $spgn = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array(); 
  $foto = 'avatar.jpg';
  if($spgn['foto'] && file_exists('assets/pengguna/'.$spgn['foto'])) {
      $foto = $spgn['foto'];
  }
?>

<body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>PT.</strong> Surya Cipta Jaya Makmur</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
            -->
            <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed">
                <!-- Alternative Sidebar -->
                <div id="sidebar-alt">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-alt-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="<?=base_URL()?>pengguna/dashboard" class="sidebar-brand">
                                <img src="<?=base_URL()?>assets/logo/logo.png" height="20"><span class="sidebar-nav-mini-hide">&nbsp; <strong>PT.</strong> Surya Cipta </span>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="page_ready_user_profile.html">
                                        <img src="<?=base_URL().'assets/pengguna/'.$foto?>" width="40" alt="foto profil">
                                    </a>
                                </div>
                                <div class="sidebar-user-name" style="font-size:100%"><?=$spgn['nama']?></div>
                                <div class="sidebar-user-links" style="font-size:70%">
                                    <?=$spgn['level']?>
                                </div>
                            </div>
                            <!-- END User Info -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                            <li <?php if($this->uri->segment(2)=="dashboard") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/dashboard">
                                        <i class="fa fa-dashboard sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Dashboard</span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-header"><span class="sidebar-header-title">Menu <?=$spgn['level']?></span></li>

                            <?php if($spgn['level'] == "Administrator") { ?>
                                <li <?php if($this->uri->segment(2)=="produk" || $this->uri->segment(2)=="produktambah" || $this->uri->segment(2)=="produkedit") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/produk">
                                        <i class="gi gi-cargo sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Produk</span>
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(2)=="konsumen" || $this->uri->segment(2)=="konsumentambah" || $this->uri->segment(2)=="konsumenedit" || $this->uri->segment(2)=="konsumendetail") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/konsumen">
                                        <i class="gi gi-group sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Konsumen</span>
                                    </a>
                                </li>
                            <?php } else if($spgn['level'] == "Pimpinan") { ?>
                            <?php }?>

                                <li <?php if($this->uri->segment(2)=="pemesanan" || $this->uri->segment(2)=="pemesanantambah" || $this->uri->segment(2)=="pemesananedit") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/pemesanan">
                                        <i class="gi gi-shopping_cart sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Penjualan</span>
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(2)=="pembayaran" || $this->uri->segment(2)=="pembayarantambah" || $this->uri->segment(2)=="pembayaranedit") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/pembayaran">
                                        <i class="gi gi-credit_card sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Pembayaran</span>
                                    </a>
                                </li>

                            <?php if($spgn['level'] == "Adminstrator") { ?>
                                <li <?php if($this->uri->segment(2)=="user" || $this->uri->segment(2)=="usertambah" || $this->uri->segment(2)=="useredit") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/user">
                                        <i class="gi gi-parents sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Pengguna</span>
                                    </a>
                                </li>
                            <?php } else if($spgn['level'] == "Pimpinan") { ?>
                            <?php }?>

                                <li class="sidebar-header"><span class="sidebar-header-title">Menu Laporan</span></li>

                                <li <?php if($this->uri->segment(2)=="laporanproduk") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/laporanproduk">
                                        <i class="fa fa-file-text sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Laporan Produk</span>
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(2)=="laporankonsumen") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/laporankonsumen">
                                        <i class="fa fa-list-alt sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Laporan Konsumen</span>
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(2)=="laporanpemesanan") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/laporanpemesanan">
                                        <i class="gi gi-stats sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Laporan Penjualan</span>
                                    </a>
                                </li>

                                <li class="sidebar-header"><span class="sidebar-header-title">Menu Pengguna</span></li>

                                <li <?php if($this->uri->segment(2)=="profil") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>pengguna/profil">
                                        <i class="gi gi-user sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Profil Saya</span>
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(2)=="keluar") { echo 'class="active"'; } ?>>
                                    <a href="<?=base_URL()?>auth/logout">
                                        <i class="fa fa-sign-out sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="<?=base_URL()?>" target="_blank">
                                    <i class="fa fa-globe fa-fw"></i> Lihat Website
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_URL().'assets/pengguna/'.$foto?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    <li class="dropdown-header text-center">
                                        <b><?=$spgn['nama']?></b><br><?=$spgn['level']?>
                                    </li>
                                    <li>
                                        <a href="<?=base_URL()?>pengguna/profil">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Profil Saya
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_URL()?>auth/logout">
                                            <i class="fa fa-ban fa-fw pull-right"></i> 
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->
