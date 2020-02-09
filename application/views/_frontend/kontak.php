<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Kontak Kami</strong></h1>
                        <h2 class="text-center animation-slideUp push hidden-xs">PT. Surya Cipta Jaya Makmur</h2>
                    </div>
                </section>
            </div>
            <!-- END Intro with Video -->

            <!-- Support Links -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row row-items text-center">
                        <div class="col-sm-3 animation-fadeIn">
                            <a href="javascript:void(0)" class="circle themed-background">
                                <i class="gi gi-life_preserver"></i>
                            </a>
                            <h4>Open a <strong>ticket</strong></h4>
                        </div>
                        <div class="col-sm-3 animation-fadeIn">
                            <a href="javascript:void(0)" class="circle themed-background">
                                <i class="gi gi-envelope"></i>
                            </a>
                            <h4><strong>Email</strong> Us</h4>
                        </div>
                        <div class="col-sm-3 animation-fadeIn">
                            <a href="javascript:void(0)" class="circle themed-background">
                                <i class="fa fa-comments"></i>
                            </a>
                            <h4><strong>Chat</strong> Live</h4>
                        </div>
                        <div class="col-sm-3 animation-fadeIn">
                            <a href="javascript:void(0)" class="circle themed-background">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <h4><strong>Tweet</strong> Us</h4>
                        </div>
                    </div>
                    <hr>
                </div>
            </section>
            <!-- END Support Links -->

            <!-- Contact -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-5 site-block">
                            <div class="site-block">
                                <h3 class="h2 site-heading"><strong>PT. Surya Cipta Jaya Makmur</strong></h3>
                                <address>
                                    Alamat<br>
                                    Jl. Pengasinan Raya I No.35 A <br>
                                    Bekasi Timur, 17115<br><br>
                                    <i class="fa fa-phone"></i> (021) 824-110-85<br>
                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">info@suryaciptajayamakmur.com</a>
                                </address>
                            </div>
                            
                        </div>
                        <div class="col-sm-7 col-md-7 site-block">
                            <h3 class="h2 site-heading"><strong>Kontak</strong> Formulir</h3>
                            <form action="#" method="post" id="form-contact">
                                <div class="form-group">
                                    <label for="contact-name">Nama</label>
                                    <input type="text" id="contact-name" name="contact-name" class="form-control input-lg" placeholder="Nama Anda..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-email">Email</label>
                                    <input type="text" id="contact-email" name="contact-email" class="form-control input-lg" placeholder="Email anda..">
                                </div>
                                <div class="form-group">
                                    <label for="contact-message">Pesan</label>
                                    <textarea id="contact-message" name="contact-message" rows="10" class="form-control input-lg" placeholder="Beritahu apa yang bisa kami bantu.."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary">Kirim Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Contact -->
