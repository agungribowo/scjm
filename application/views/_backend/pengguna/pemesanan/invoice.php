<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-usd"></i>Pemesanan<br><small> Invoice Pemesanan</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-shopping_cart"></i>&nbsp; Pemesanan</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-usd"></i>&nbsp; Invoice</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <!-- Invoice Block -->
                        <div class="block full">
                            <!-- Invoice Title -->
                            <div class="block-title">
                                <div class="block-options">
                                    <h2><strong><a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" onclick="App.pagePrint();" class="btn btn-xs btn-info"><i class="fa fa-print"></i></a></strong></h2>
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/pemesanan/pemesanancetak/<?=$psn['id_pemesanan']?>" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>
                            <!-- END Invoice Title -->

                            <!-- Invoice Content -->
                            <!-- 2 Column grid -->
                            <div class="row block-section">
                                <!-- Company Info -->
                                <div class="col-sm-12">
                                    <img src="<?=base_URL()?>assets/pdf/kop.png" alt="kop" class="img-responsive">
                                    <hr>
                                    <h2 class="text-center"><strong>INVOICE PEMESANAN</strong></h2>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                <tr>
                                                    <th style="width:50%">NO INVOICE</th>
                                                    <td><b>: <?=$psn['id_pemesanan']?></b></td>
                                                </tr>
                                                <tr>
                                                    <th>TANGGAL PEMESANAN</th>
                                                    <td><?=getHari($psn['tanggal_pemesanan'])?>, <?=getTanggal($psn['tanggal_pemesanan'])?></td>
                                                </tr>
                                                <tr>
                                                    <th>ID KONSUMEN</th>
                                                    <td><?=$psn['id_konsumen']?></td>
                                                </tr>
                                                <tr>
                                                    <th>NAMA KONSUMEN</th>
                                                    <td><?=getKonsumenD($psn['id_konsumen'])?> <?=getKonsumenB($psn['id_konsumen'])?></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                <tr>
                                                    <th style="width:40%">STATUS</th>
                                                    <td><b>: <?=$psn['status']?></b></td>
                                                </tr>
                                                <tr>
                                                    <th>BANK</th>
                                                    <td>: <?=getPembayaranB($psn['id_pemesanan'])?></td>
                                                </tr>
                                                <tr>
                                                    <th>No. Rekening</th>
                                                    <td>: <?=getPembayaranR($psn['id_pemesanan'])?></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Company Info -->
                            </div>
                            <!-- END 2 Column grid -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID PEMESANAN</th>
                                            <th style="width: 30%;">KONSUMEN</th>
                                            <th style="width: 30%;">PRODUK</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">NOMINAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="text-center"><h4><?=$psn['id_pemesanan']?></h4></td>
                                            <td>
                                                 <h4><?=$psn['id_konsumen']?></h4>
                                                <?=getKonsumenD($psn['id_konsumen'])?> <?=getKonsumenB($psn['id_konsumen'])?>
                                            </td>
                                            <td>
                                                <h4><?=$psn['id_produk']?></h4>
                                                <?=getProduk($psn['id_produk'])?>
                                            </td>
                                            <td class="text-center"><h4><?=$psn['status']?></h4></td>
                                            <td class="text-center"><h4>Rp. <?=getRupiah(getPembayaranH($psn['id_pemesanan']))?></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->
                            <hr>

                            <div class="row"><br>
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th class="text-right">Mengetahui,</th>
                                            </tr>
                                            <tr>
                                                <th class="text-right"><img src="<?=base_URL()?>assets/pdf/signature.png" width="100" alt="signature"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Pimpinan HRD</th>
                                            </tr>
                                        </table><hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Invoice Block -->
                    </div>
                    <!-- END Page Content -->
