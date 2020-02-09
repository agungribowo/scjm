<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Profil Saya</strong></h1>
                    </div>
                </section>
            </div>
            <!-- END Intro with Video -->

            <!-- Company Info -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- You can add the class 'table-featured' to feature the best plan. In this case, make sure to remove the hover functionality from js/pages/pricing.js -->
                                        <table class="table table-borderless table-pricing animation-fadeIn">
                                            <thead>
                                                <tr>
                                                    <th class="table-featured">Jumlah Pemesanan Saya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td></td></tr>
                                                <tr>
                                                    <td><a href="<?=base_URL()?>konsumen/pemesanan" class="btn btn-md btn-primary"><strong><?=$pms?></strong> Pemesanan</a></td>
                                                </tr>
                                                <tr><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Notifikasi -->
                            <?php
                                if($this->session->flashdata('simpan')) {
                                    echo '<div class="alert alert-success alert-dismissable" id="alert"><i class="fa fa-check"></i> &nbsp; '.$this->session->flashdata('simpan').'</div>';
                                } else if($this->session->flashdata('gagal')) {
                                    echo '<div class="alert alert-danger" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-ban"></i> GAGAL!<br></strong> '.$this->session->flashdata('gagal').'</div>';
                                } else if($this->session->flashdata('salah')) {
                                echo '<div class="alert alert-warning" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-warning"></i></button><strong><i class="ace-icon fa fa-ban"></i> Kesalahan!<br></strong> '.$this->session->flashdata('salah').'</div>';
                                }
                            ?>

                            <div class="site-block">
                                <div class="card-box table-responsive animation-fadeIn">
                                    <div class="col-sm-8">
                                        <div style="padding:0;margin-left:10px;margin-right:0;">
                                        <table class="table">
                                            <tr>
                                            <td width="41%"><b>ID KONSUMEN</b></td>
                                            <td> : <b><?=$ksm['id_konsumen']?></b></td>
                                            </tr>
                                            <tr>
                                            <td><b>USERNAME</b></td>
                                            <td> : <b><?=$ksm['username']?></b></td>
                                            </tr>
                                            <tr>
                                            <td><b>EMAIL</b></td>
                                            <td> : <b><?=$ksm['email']?></b></td>
                                            </tr>
                                            <tr>
                                            <td><b>NAMA KONSUMEN</b></td>
                                            <td> : <b><?=$ksm['nama_depan']?> <?=$ksm['nama_belakang']?></b></td>
                                            </tr>

                                            <tr>
                                            <td width="41%">Alamat</td>
                                            <td> : <?=$ksm['alamat']?></td>
                                            </tr>
                                            <tr>
                                            <td>Kota</td>
                                            <td> : <?=$ksm['kota']?></td>
                                            </tr>
                                            <tr>
                                            <td>Provinsi</td>
                                            <td> : <?=$ksm['provinsi']?></td>
                                            </tr>
                                            <tr>
                                            <td>Kode Pos</td>
                                            <td> : <?=$ksm['kodepos']?></td>
                                            </tr>
                                            <tr>
                                            <td>No. Telp / HP</td>
                                            <td> : <?=$ksm['telp']?></td>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div style="padding:0;margin-left:10px;margin-right:0;" class="text-center">
                                            <table class="table">
                                            <tr>
                                                <td>
                                                <?php 
                                                    $foto = 'avatar.jpg';
                                                    if($ksm['foto'] && file_exists('assets/konsumen/'.$ksm['foto'])) {
                                                        $foto = $ksm['foto'];
                                                    }
                                                ?>
                                                <img src="<?=base_URL().'assets/konsumen/'.$foto?>" alt="foto profil" style="height: 200px;"/>
                                                </td>
                                            </tr>
                                            </table>
                                            <a href="<?=base_URL()?>konsumen/profil/edit" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>&nbsp; <span>Edit Profil</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
