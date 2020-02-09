<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-shopping_cart"></i>Penjualan<br><small> Tambah Data Penjualan</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-shopping_cart"></i>&nbsp; Pemesanan</li>
                            <li><a href="javascript:void(0)"><i class="fa fa-wpforms"></i>&nbsp; Tambah Pemesanan</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Normal Form Block -->
                                <div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options">
                                            <h2><strong><a href="<?=base_URL()?>pengguna/pemesanan" data-toggle="tooltip" title="Kembali" class="btn btn-xs btn-info"><i class="fa fa-arrow-left"></i></a></strong></h2>
                                            <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/pemesanan/konsumentambah" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                        </div>                                        
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                    <?=form_open_multipart('pengguna/pemesanan/pemesanantambah', 'class="form-bordered"', 'method="post"')?>
                                    
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>ID PEMESANAN</label>
                                                    <input type="text" name="id_pemesanan" value="<?=$kodeunik?>" class="form-control" placeholder="ID PEMESANAN" readonly="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>KONSUMEN</label>
                                                    <select name="id_konsumen" class="form-control" required="yes" autofocus="yes" />
                                                        <option value="">Pilih Konsumen</option>
                                                        <?php foreach($ksm as $k) : ?>
                                                            <option value="<?=$k->id_konsumen?>">(<?=$k->id_konsumen?>) &nbsp; <?=$k->nama_depan?> <?=$k->nama_belakang?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PRODUK</label>
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pdModal"/>. . .</button>
                                                        </div>
                                                        <div class="col-xs-4">                             
                                                            <input type="text" class="form-control" id="id_produk" name="id_produk" maxlength="7" placeholder="ID PRODUK" required="yes" readonly="yes" />
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input type="text" class="form-control" id="nama_produk" maxlength="30" placeholder="Nama Produk" required="yes" readonly="yes" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tanggal Pemesanan</label>
                                                    <input type="text" id="example-datepicker5" name="tanggal_pemesanan" class="form-control input-datepicker-close"  data-date-format="yyyy-mm-dd" placeholder="yyyy-MM-dd" required="yes" autofocus="yes" value="<?=date('Y-m-d')?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    <input type="text" name="status" value="Konfirmasi Pembayaran" class="form-control" placeholder="STATUS" readonly="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>PETUGAS</label>
                                                    <input type="text" value="<?=$this->session->userdata('nama')?>" class="form-control" placeholder="PETUGAS" readonly="yes" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Simpan</span></button>
                                            <a href="<?=base_URL()?>pengguna/konsumen" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
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


                    <!-- modal Produk -->
                    <div class="modal fade" id="pdModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><i class="gi gi-cargo"></i>&nbsp; Pilih Produk</h4>
                            </div>
                            <div class="modal-body">
                              <table id="lookup" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center" width="10%">NO.</th>
                                  <th class="text-center">ID PRODUK</th>
                                  <th>NAMA PRODUK</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                  <?php $no = 1;
                                    foreach($prd as $p) : 
                                  ?>

                                <tr class="pilih" data-id_produk="<?=$p->id_produk?>" data-nama_produk="<?=$p->nama_produk?>">
                                  <td class="text-center"><b><?=$no?>.<b></td>
                                  <td class="text-center"><?=$p->id_produk?></td>
                                  <td><?=$p->nama_produk?></td>
                                </tr>

                                <?php $no++; endforeach ?>

                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
                    <script src="<?=base_URL()?>assets/_backend/js/vendor/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).on('click', '.pilih', function(e) {
                            document.getElementById("id_produk").value = $(this).attr("data-id_produk");
                            document.getElementById("nama_produk").value = $(this).attr("data-nama_produk");
                            $('#pdModal').modal('hide');
                        })
                    </script>

                     <!-- Load and execute javascript code used only in this page -->
                    <script src="<?=base_URL()?>assets/_backend/js/pages/tablesDatatables.js"></script>
                    <script>$(function(){ TablesDatatables.init(); });</script>

                    <script>
                        $(function() {
                          $('#lookup').DataTable()
                      })
                    </script>

                    <!-- CSS -->
                    <style>
                        .pilih:hover{
                            cursor: pointer;
                        }
                    </style>
