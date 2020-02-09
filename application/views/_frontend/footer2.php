<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Footer -->
            <footer class="site-footer site-section">
                <div class="container">
                    <!-- Footer Links -->
                    <div class="row" align="center">
                        <div class="col-sm-12 col-md-12">
                            <h4 class="footer-heading">Hak Cipta &copy; 2018 &nbsp;<a href="<?=base_URL()?>">PT. Surya Cipta Jaya Makmur</a></h4>
                        </div>
                    </div>
                    <!-- END Footer Links -->
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in <?=base_URL()?>assets/_frontend/js/app.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-angle-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?=base_URL()?>assets/_frontend/js/vendor/jquery.min.js"></script>
        <script src="<?=base_URL()?>assets/_frontend/js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_URL()?>assets/_frontend/js/plugins.js"></script>
        <script src="<?=base_URL()?>assets/_frontend/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_URL()?>assets/_frontend/js/pages/ecomCheckout.js"></script>
        <script>$(function(){ EcomCheckout.init(); });</script>

        <!-- Notifikasi -->
        <script>
            $("#alert").fadeTo(5000, 500).slideUp(500, function() {
            $("#alert").alert('close');
            });
        </script>
    </body>
</html>