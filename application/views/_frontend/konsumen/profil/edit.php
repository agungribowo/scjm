<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Edit Profil Saya</strong></h1>
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
                                        <h3 class="site-heading">Form Edit Profil Saya</h3><hr>
                                    </div>
                                </div>
                            
                                <?=form_open_multipart('konsumen/profil/edit')?>
                                    <input type="hidden" name="id_konsumen" value="<?=$ksm['id_konsumen']?>" />
                                    <!-- END Step Info -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-username">Username</label>
                                                <input type="text" id="checkout-username" name="username" value="<?=$ksm['username']?>" class="form-control" placeholder="Username" required="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-email">Email</label>
                                                <input type="email" id="checkout-email" name="email" value="<?=$ksm['email']?>" class="form-control" placeholder="Email" required="yes" />
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-password">Password</label>
                                                <input type="password" id="checkout-password" name="password" class="form-control" placeholder="Password" />
                                            </div><br>
                                            <div class="form-group">
                                                <label for="checkout-country">No. Telp / HP</label>
                                                <input type="numnber" id="checkout-telp" name="telp" value="<?=$ksm['telp']?>" class="form-control" placeholder="No. Telp / HP">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-country">Alamat</label>
                                                <textarea name="alamat" rows="7" class="form-control" placeholder="Alamat" style="overflow:auto;resize:none" required="yes" /><?=$ksm['alamat']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-firstname">Nama Depan</label>
                                                <input type="text" id="checkout-firstname" name="nama_depan" value="<?=$ksm['nama_depan']?>" class="form-control" placeholder="Nama Depan">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-lastname">Nama Belakang</label>
                                                <input type="text" id="checkout-lastname" name="nama_belakang" value="<?=$ksm['nama_belakang']?>" class="form-control" placeholder="Nama Belakang">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-country">Kota</label>
                                                <input type="text" id="checkout-country" name="kota" value="<?=$ksm['kota']?>" class="form-control" placeholder="Kota">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-country">Provinsi</label>
                                                <input type="text" id="checkout-country" name="provinsi" value="<?=$ksm['provinsi']?>" class="form-control" placeholder="Provinsi">
                                            </div>
                                            <div class="form-group">
                                                <label for="checkout-country">Kode Pos</label>
                                                <input type="text" id="checkout-country" name="kodepos" value="<?=$ksm['kodepos']?>" class="form-control" placeholder="Kode Pos">
                                            </div><br>
                                            <div class="form-group">
                                                <label for="checkout-country">Foto Profil</label>
                                                <input type="file" class="form-control" name="filefoto" placeholder="foto profil">
                                                <p class="help-block">Format File : jpg/jpeg, png/PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <!-- END First Step -->

                                    <!-- Form Buttons -->
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Update</span></button>
                                        <a href="<?=base_URL()?>konsumen/profil" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
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

