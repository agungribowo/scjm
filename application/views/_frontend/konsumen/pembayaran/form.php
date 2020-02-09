<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Konfirmasi Pembayaran</strong></h1>
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
                                        <h3 class="site-heading">Form Konfirmasi Pembayaran</h3><hr>
                                    </div>
                                </div>
                            
                                <?=form_open_multipart('konsumen/pembayaran')?>
                                <input type="hidden" name="pesanan" value="<?=$pesanan?>">
                                    <!-- END Step Info -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-id_pembayaran">ID PEMBAYARAN</label>
                                                <input type="text" id="checkout-id_pembayaran" name="id_pembayaran" value="<?=$kodeunik?>" class="form-control" placeholder="ID PEMBAYARAN" required="yes" readonly="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-id_pemesanan">ID PEMESANAN</label>
                                                <input type="text" id="checkout-id_pemesanan" name="id_pemesanan" value="<?=$psn['id_pemesanan']?>" class="form-control" placeholder="ID PEMESANAN" required="yes" readonly="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-tanggal">TANGGAL PEMBAYARAN</label>
                                                <input type="date" id="checkout-tanggal" name="tanggal_pembayaran" value="<?=date('Y-m-d')?>" class="form-control" placeholder="Tanggal Pembayaran" required="yes" readonly="yes" />
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-firstname">BANK</label>
                                                <select name="bank" class="form-control" required="yes" />
                                                    <option value="">Pilih BANK</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="BNI">DANAMON</option>
                                                    <option value="MANDIRI">MANDIRI</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="CIMB NIAGA">CIMB NIAGA</option>
                                                </select>                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-no_rek">NO. REKENING</label>
                                                <input type="number" id="checkout-no_rek" name="no_rek" class="form-control" placeholder="No. Rekening">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-no_rek">NOMINAL</label>
                                                <input type="text" id="checkout-no_rek" name="harga" class="form-control" placeholder="Nominal">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-country">Bukti Transfer</label>
                                                <input type="file" class="form-control" name="filefoto" placeholder="foto profil">
                                                <p class="help-block">Format File : jpg/jpeg, png/PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                                            </div>
                                            
                                        </div>
                                    </div><hr>
                                    <!-- END First Step -->

                                    <!-- Form Buttons -->
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Proses</span></button>
                                        <a href="<?=base_URL()?>konsumen/pemesanan" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
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

