<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="<?=base_URL()?>assets/_backend/img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1><img src="<?=base_URL()?>assets/logo/logo.png" height="30"> &nbsp;<strong>PT. Surya Cipta Jaya Makmur</strong><br><small>Silahkan <strong>Log In</strong></small></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">

                <!-- notifikasi Masuk -->
                <?php
                    if($this->session->flashdata('berhasil')) {
                        echo '<div class="alert alert-success alert-dismissable" id="alert"><i class="fa fa-check"></i> &nbsp; '.$this->session->flashdata('berhasil').'</div>';
                    
                    } else if($this->session->flashdata('gagal')) {
                        echo '<div class="alert alert-danger" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-ban"></i> GAGAL!<br></strong> '.$this->session->flashdata('gagal').'</div>';

                    } else if($this->session->flashdata('kesalahan')) {
                        echo '<div class="alert alert-warning" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-warning"></i> KESALAHAN!<br></strong> '.$this->session->flashdata('kesalahan').'</div>';
                    }
                ?>

                <!-- Login Form -->
                <form action="<?=base_URL()?>auth/checkAuth" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="login-username" name="username" class="form-control input-lg" placeholder="Username" required="yes" autofocus="yes" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="password" class="form-control input-lg" placeholder="Password" required="yes" autofocus="yes" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-8 text-right">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Log In &nbsp;<i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?=base_URL()?>assets/_backend/js/vendor/jquery.min.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/plugins.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_URL()?>assets/_backend/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>