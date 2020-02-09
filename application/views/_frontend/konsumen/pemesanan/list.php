<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Pemesanan Saya</strong></h1>
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
                                        <h3 class="site-heading">List Pemesanan Saya</h3><hr>
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

                            <!-- Shopping Cart -->
                            <div class="table-responsive animation-fadeIn">
                                <table class="table table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th class="text-center">Hari / Tanggal Pemesanan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            foreach($psn as $p) :

                                            $gambar_produk = 'default.jpg';
                                            if(getProdukG($p->id_produk) && file_exists('assets/produk/'.getProdukG($p->id_produk))) {
                                                $gambar_produk = getProdukG($p->id_produk);
                                            } 
                                        ?>
                                        <tr>
                                            <td style="width: 150px;">
                                                <img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="Gambar Produk" style="width: 130px;">
                                            </td>
                                            <td>
                                                <strong><?=$p->id_pemesanan?></strong><hr>
                                                <strong><?=$p->id_produk?></strong><br>
                                                <?=getProduk($p->id_produk)?><br>
                                            </td>
                                            <td class="text-center">
                                                <strong><?=getHari($p->tanggal_pemesanan)?>, <?=getTanggal($p->tanggal_pemesanan)?></strong>
                                            </td>
                                            <td class="text-center">
                                            <?php if($p->status == "Menunggu Konfirmasi") { ?>
                                                <span class="label label-warning"><?=$p->status?></span>
                                            <?php } else if($p->status == "Konfirmasi Pembayaran") { ?>
                                                <span class="label label-info"><?=$p->status?></span>
                                            <?php } else if($p->status == "Disetujui") { ?>
                                                <span class="label label-success"><?=$p->status?></span>
                                            <?php } else { ?>
                                                <span class="label label-danger"><?=$p->status?></span>
                                            <?php } ?>
                                            </td>
                                           <td class="text-center">
                                                <div class="btn-group">
                                                    <?php if($p->status == "Menunggu Konfirmasi") { ?>            
                                                            <span class="label label-default">Menunggu</span>
                                                    <?php } else if($p->status == "Konfirmasi Pembayaran") { ?>
                                                        <?=form_open('konsumen/pembayaran')?>
                                                            <input type="hidden" name="pesanan" value="1">
                                                            <input type="hidden" name="id_pemesanan" value="<?=$p->id_pemesanan?>">
                                                            <button type="submit" data-toggle="tooltip" title="Konfirmasi" class="btn btn-xs btn-primary"><i class="fa fa-upload"></i></button>
                                                        <?=form_close()?>
                                                    <?php } else if($p->status == "Disetujui") { ?>
                                                        <a target="_blank" href="<?=base_URL()?>konsumen/pemesanan/cetak/<?=$p->id_pemesanan?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a>
                                                    <?php } else { ?>
                                                        <span class="label label-danger">Pemesanan Ditolak</span>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END Shopping Cart -->

                            <hr>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END Company Info -->
