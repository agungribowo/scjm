<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $sksm = $this->db->get_where('tbl_konsumen', array('id_konsumen' => $this->session->userdata('id_konsumen')))->row_array();
?>
            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Pemesanan Produk</strong></h1>
                    </div>
                </section>
            </div>
            <!-- END Intro with Video -->

            <!-- Company Info -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-block animation-fadeIn">
                                <div class="row">
                                    <div class="col-sm-12" align="center">
                                        <h3 class="site-heading">Form Pemesanan Produk</h3><hr>
                                    </div>
                                </div>
                            
                                <?=form_open('produk/pemesanan')?>
                                    <input type="hidden" name="jmlProduk" value="<?=$jmlProduk?>" />
                                    <!-- END Step Info -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-id_pemesanan">ID PEMESANAN</label>
                                                <input type="text" id="checkout-id_pemesanan" name="id_pemesanan" value="<?=$kodeunik?>" class="form-control" placeholder="ID PEMESANAN" required="yes" readonly="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-id_konsumen">ID KONSUMEN</label>
                                                <input type="text" id="checkout-id_konsumen" name="id_konsumen" value="<?=$sksm['id_konsumen']?>" class="form-control" placeholder="ID KONSUMEN" required="yes" readonly="yes" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-id_produk">ID PRODUK</label>
                                                <input type="text" id="checkout-id_produk" name="id_produk" value="<?=$prd->id_produk?>" class="form-control" placeholder="ID PRODUK" required="yes" readonly="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-tanggal">TANGGAL PEMESANAN</label>
                                                <input type="date" id="checkout-tanggal" name="tanggal_pemesanan" value="<?=date('Y-m-d')?>" class="form-control" placeholder="Tanggal Pemesanan" required="yes" readonly="yes" />
                                            </div>
                                        </div>
                                    </div><hr>
                                    <!-- END First Step -->

                                    <!-- Form Buttons -->
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Proses</span></button>
                                        <a href="<?=base_URL()?>produk" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
                                    </div>
                                    <!-- END Form Buttons -->
                                <?=form_close()?>
                                <!-- END Checkout Wizard Content -->
                            </div>

                            <hr>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->

