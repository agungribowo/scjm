<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $spgn = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array();
?>
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-shopping_cart"></i>Penjualan<br><small> List Data Penjualan</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-shopping_cart"></i>&nbsp; Penjualan</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <!-- Notifikasi -->
                        <?php
                            if($this->session->flashdata('simpan')) {
                                echo '<div class="alert alert-success alert-dismissable" id="alert"><i class="fa fa-check"></i> &nbsp; '.$this->session->flashdata('simpan').'</div>';
                            } else if($this->session->flashdata('gagal')) {
                                echo '<div class="alert alert-danger" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-ban"></i> GAGAL!<br></strong> '.$this->session->flashdata('gagal').'</div>';
                            } else if($this->session->flashdata('salah')) {
                            echo '<div class="alert alert-warning" id="alert"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-warning"></i></button><strong><i class="ace-icon fa fa-ban"></i> Kesalahan!<br></strong> '.$this->session->flashdata('salah').'</div>';
                            } else if($this->session->flashdata('tidak')) {
                                echo '<div class="alert alert-danger alert-dismissable" id="alert"><i class="fa fa-ban"></i> &nbsp; '.$this->session->flashdata('tidak').'</div>';
                            }

                        ?>

                        <!-- Datatables Content -->
                        <div class="block full">                            
                            <div class="block-title">
                                <div class="block-options">
                                    <h2><strong><a href="<?=base_URL()?>pengguna/pemesanan/pemesanantambah" data-toggle="tooltip" title="Tambah" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a></strong></h2>
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/pemesanan" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center" width="50">ID</th>
                                            <th>KONSUMEN</th>
                                            <th>PRODUK</th>
                                            <th class="text-center">HARI / TANGGAL</th>
                                            <th class="text-center">STATUS</th>

                                        <?php if($spgn['level'] == "Administrator") { ?>
                                            <th class="text-center" width="50"><i class="gi gi-flash"></i></th>
                                        <?php } else if($spgn['level'] == "Pimpinan") { ?>
                                        <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($psn as $p) : 
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><?=$p->id_pemesanan?></td>
                                            <td><?=getKonsumenD($p->id_konsumen)?> <?=getKonsumenB($p->id_konsumen)?></td>
                                            <td><?=getProduk($p->id_produk)?></td>
                                            <td class="text-center"><?=getHari($p->tanggal_pemesanan)?>, <?=getTanggal($p->tanggal_pemesanan)?></td>
                                            <td class="text-center">
                                                <?php if($p->status == "Menunggu Konfirmasi") { ?>
                                                    <span class="label label-warning"><?=$p->status?></span>
                                                <?php } else if($p->status == "Konfirmasi pembayaran") { ?>
                                                    <span class="label label-info"><?=$p->status?></span>
                                                <?php } else if($p->status == "Disetujui") { ?>
                                                    <span class="label label-success"><?=$p->status?></span>
                                                <?php } else { ?>
                                                    <span class="label label-danger"><?=$p->status?></span>
                                                <?php } ?>
                                            </td>

                                        <?php if($spgn['level'] == "Administrator") { ?>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <?php if($p->status == "Menunggu Konfirmasi") { ?>
                                                        <a href="<?=base_URL()?>pengguna/pemesanan/pemesanandisetujui/<?=$p->id_pemesanan?>" data-toggle="tooltip" title="Disetujui" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                                        <a href="<?=base_URL()?>pengguna/pemesanan/pemesananditolak/<?=$p->id_pemesanan?>" data-toggle="tooltip" title="Ditolak" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                    <?php } else if($p->status == "Konfirmasi Pembayaran") { ?>
                                                        <span class="label label-default">Upload Bukti</span>
                                                    <?php } else if($p->status == "Disetujui") { ?>
                                                        <a href="<?=base_URL()?>pengguna/pemesanan/pemesanancetak/<?=$p->id_pemesanan?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a>
                                                    <?php } else { ?>
                                                        <span class="label label-danger" data-toggle="tooltip" title="Ditolak"><i class="fa fa-times"></i> </span>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        <?php } else if($spgn['level'] == "Pimpinan") { ?>
                                        <?php } ?>

                                        </tr>
                                    
                                    <?php $no++; endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
