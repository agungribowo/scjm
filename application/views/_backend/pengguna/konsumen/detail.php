<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-group"></i>Konsumen<br><small> Detail Data Konsumen</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-group"></i>&nbsp; Konsumen</li>
                            <li><a href="javascript:void(0)"><i class="fa fa-search"></i>&nbsp; Detail Konsumen</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Normal Form Block -->
                                <div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options">
                                            <h2><strong><a href="<?=base_URL()?>pengguna/konsumen" data-toggle="tooltip" title="Kembali" class="btn btn-xs btn-info"><i class="fa fa-arrow-left"></i></a></strong></h2>
                                            <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/konsumen/konsumendetail/<?=$ksm['id_konsumen']?>" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                        </div>                                        
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <div class="card-box table-responsive">
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
                                            <div style="padding:0;margin-left:10px;margin-right:0;">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Normal Form Block -->
                            </div>
                        </div>
                        <!-- END Form Example with Blocks in the Grid -->
                    </div>
                    <!-- END Page Content -->
