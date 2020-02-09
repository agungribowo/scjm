<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

        <!-- Scroll to top link, initialized in <?=base_URL()?>assets/_backend/js/app.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?=base_URL()?>assets/_backend/js/vendor/jquery.min.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/plugins.js"></script>
        <script src="<?=base_URL()?>assets/_backend/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_URL()?>assets/_backend/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
        
        <!-- Notifikasi -->
        <script>
            $("#alert").fadeTo(5000, 500).slideUp(500, function() {
                $("#alert").alert('close');
            });
        </script>
    </body>
</html>
