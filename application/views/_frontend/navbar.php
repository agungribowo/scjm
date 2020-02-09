<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $spgn = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array();
  $sksm = $this->db->get_where('tbl_konsumen', array('id_konsumen' => $this->session->userdata('id_konsumen')))->row_array();
?>

    <body>
        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!-- 'boxed' class for a boxed layout -->
        <div id="page-container">
            <!-- Site Header -->
            <header>
                <div class="container">
                    <!-- Site Logo -->
                    <a href="<?=base_URL()?>" class="site-logo">
                        <img src="<?=base_URL()?>assets/logo/logo.png" height="25"><strong>&nbsp; PT.</strong> Surya Cipta Jaya Makmur
                    </a>
                    <!-- Site Logo -->

                    <!-- Site Navigation -->
                    <nav>
                        <!-- Menu Toggle -->
                        <!-- Toggles menu on small screens -->
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- END Menu Toggle -->

                        <!-- Main Menu -->
                        <ul class="site-nav">
                            <!-- Toggles menu on small screens -->
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <!-- END Menu Toggle -->
                            
                            <li class="<?=active_link('home')?>"><a href="<?=base_URL()?>" class="<?=active_link('home')?>">Home</a></li>

							<li class="<?=active_link('tentang')?>"><a href="<?=base_URL()?>tentang" class="<?=active_link('tentang')?>">Tentang</a></li>

							<li class="<?=active_link('produk')?>"><a href="<?=base_URL()?>produk" class="<?=active_link('produk')?>">Produk</a></li>

							<li class="<?=active_link('kontak')?>"><a href="<?=base_URL()?>kontak" class="<?=active_link('kontak')?>">Kontak</a></li>

                            <?php if ($spgn['id_pengguna']) : ?>
                                <li><button class="btn btn-primary"><?=$spgn['nama']?> &nbsp;<i class="fa fa-angle-down"></i></button>
                                    <ul>
                                        <li><a href="<?=base_URL()?>pengguna/dashboard" style="font-size: 11px">Dashboard</a></li>
                                        <li><a href="<?=base_URL()?>auth/logout" style="font-size: 11px">Log Out</a></li>
                                    </ul>
                                </li>
                            <?php elseif ($sksm['id_konsumen']) : ?>
                                <li><button class="btn btn-primary"><?=$sksm['nama_depan']?> <?=$sksm['nama_belakang']?> &nbsp;<i class="fa fa-angle-down"></i></button>
                                    <ul>
                                        <li class="<?=active_link('profil')?>"><a href="<?=base_URL()?>konsumen/profil" style="font-size: 11px">Profil Saya</a></li>
                                        <li class="<?=active_link('pemesanan')?>"><a href="<?=base_URL()?>konsumen/pemesanan" style="font-size: 11px">Pesanan Saya</a></li>
                                        <li><a href="<?=base_URL()?>auth/logout" style="font-size: 11px">Log Out</a></li>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Log in</button></li>
                            <?php endif; ?>

                        </ul>
                        <!-- END Main Menu -->
                    </nav>
                    <!-- END Site Navigation -->
                </div>
            </header>
            <!-- END Site Header -->


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">

                <div class="modal-content">
                  <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>

                  <div class="modal-body">
                    <span>
                        <center><img src="<?=base_URL()?>assets/logo/logo.png" height="80" alt="logo"></center>
                    </span>
                    <h5 class="text-uppercase font-bold m-b-5 m-t-50">Masuk</h5>
                    <p class="m-b-0">Masuk ke akun kamu sekarang !</p>

                  <?php echo form_open('auth/checkAuth'); ?>
                      <div class="form-group">
                        <label for="username" class="form-control-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required="yes" autofocus="yes" />
                      </div>

                      <div class="form-group">
                        <label for="password" class="form-control-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="yes" autofocus="yes" />
                      </div>

                      <div class="form-group">
                        <div class="col-xs-12" align="center"></div>
                      </div>
                  </div>
                  <br>

                  <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-12" align="center">
                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" name="submit"><i class="fa fa-sign-in"></i>&nbsp; Masuk</button>
                        </div>
                    </div>
                  </div>
                  <?=form_close()?>

                </div>
              </div>
            </div>

            <style type="text/css">
                .modal-header-primary {
                    color:#fff;
                    padding:9px 15px;
                    border-bottom:1px solid #eee;
                    background-color: #5bc0de;
                    -webkit-border-top-left-radius: 5px;
                    -webkit-border-top-right-radius: 5px;
                    -moz-border-radius-topleft: 5px;
                    -moz-border-radius-topright: 5px;
                     border-top-left-radius: 5px;
                     border-top-right-radius: 5px;
                }
            </style>