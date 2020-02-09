<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-cargo"></i>Produk<br><small> List Data Produk</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-cargo"></i>&nbsp; Produk</a></li>
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
                            }
                        ?>

                        <!-- Datatables Content -->
                        <div class="block full">                            
                            <div class="block-title">
                                <div class="block-options">
                                    <h2><strong><a href="<?=base_URL()?>pengguna/produk/produktambah" data-toggle="tooltip" title="Tambah" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a></strong></h2>
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/produk" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center"><i class="gi gi-picture"></i></th>
                                            <th class="text-center" width="150">ID PRODUK</th>
                                            <th>NAMA PRODUK</th>
                                            <th>KETERANGAN</th>
                                            <th class="text-center" width="50"><i class="gi gi-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($prd as $p) : 
                                        
                                        $gambar_produk = 'default.jpg';
                                        if($p->gambar_produk && file_exists('assets/produk/'.$p->gambar_produk)) {
                                            $gambar_produk = $p->gambar_produk;
                                        }
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="produk" class="img-circle" width="100"></td>
                                            <td class="text-center"><?=$p->id_produk?></td>
                                            <td><?=$p->nama_produk?></td>
                                            <td><?=$p->keterangan_produk?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_URL()?>pengguna/produk/produkedit/<?=$p->id_produk?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?=base_URL()?>pengguna/produk/produkhapus/<?=$p->id_produk?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                    <?php $no++; endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
