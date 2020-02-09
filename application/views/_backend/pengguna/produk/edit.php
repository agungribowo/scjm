<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-cargo"></i>Produk<br><small> Edit Data Produk</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-cargo"></i>&nbsp; Produk</li>
                            <li><a href="javascript:void(0)"><i class="fa fa-wpforms"></i>&nbsp; Edit Produk</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Normal Form Block -->
                                <div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options">
                                            <h2><strong><a href="<?=base_URL()?>pengguna/produk" data-toggle="tooltip" title="Kembali" class="btn btn-xs btn-info"><i class="fa fa-arrow-left"></i></a></strong></h2>
                                            <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/produk/produkedit/<?=$prd['id_produk']?>" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                        </div>                                        
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                    <?=form_open_multipart('pengguna/produk/produkedit', 'class="form-bordered"', 'method="post"')?>
                                    
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>ID PRODUK</label>
                                                    <input type="text" name="id_produk" value="<?=$prd['id_produk']?>" class="form-control" placeholder="ID PRODUK" readonly="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Nama Produk</label>
                                                    <input type="text" name="nama_produk" value="<?=$prd['nama_produk']?>" class="form-control" placeholder="Nama Produk" required="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Keterangan Produk</label>
                                                    <textarea name="keterangan_produk" rows="5" class="form-control" placeholder="Keterangan Produk" style="overflow:auto;resize:none" required="yes" /><?=$prd['keterangan_produk']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Gambar Produk</label>
                                                    <input type="file" class="form-control" name="filefoto" placeholder="Gambar Produk">
                                                    <p class="help-block">Format File : jpg/jpeg, png/PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                                                </div>
                                            </div>
                                            <?php 
                                                $gambar_produk = 'default.jpg';
                                                if($prd['gambar_produk'] && file_exists('assets/produk/'.$prd['gambar_produk'])) {
                                                    $gambar_produk = $prd['gambar_produk'];
                                                }
                                            ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-xs-12" align="center">
                                                        <div class="fileupload-new thumbnail" class="img-responsive" style="width: 200px; height: 150px;">
                                                            <img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="Gambar Produk" style="height: 140px;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Update</span></button>
                                            <a href="<?=base_URL()?>pengguna/produk" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
                                        </div>

                                    <?=form_close()?>
                                    <!-- END Normal Form Content -->
                                </div>
                                <!-- END Normal Form Block -->
                            </div>
                        </div>
                        <!-- END Form Example with Blocks in the Grid -->
                    </div>
                    <!-- END Page Content -->
