<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-group"></i>Konsumen<br><small> List Data Konsumen</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-group"></i>&nbsp; Konsumen</a></li>
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
                                    <h2><strong><a href="<?=base_URL()?>pengguna/konsumen/konsumentambah" data-toggle="tooltip" title="Tambah" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a></strong></h2>
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/konsumen" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center"><i class="gi gi-picture"></i></th>
                                            <th class="text-center" width="150">ID KONSUMEN</th>
                                            <th>USERNAME</th>
                                            <th>NAMA KONSUMEN</th>
                                            <th class="text-center" width="25"><i class="gi gi-search"></th>
                                            <th class="text-center" width="50"><i class="gi gi-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($ksm as $k) : 
                                        
                                        $foto = 'avatar.jpg';
                                        if($k->foto && file_exists('assets/konsumen/'.$k->foto)) {
                                            $foto = $k->foto;
                                        }
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><img src="<?=base_URL().'assets/konsumen/'.$foto?>" alt="foto profil" class="img-circle" width="50"></td>
                                            <td class="text-center"><?=$k->id_konsumen?></td>
                                            <td><?=$k->username?></td>
                                            <td><?=$k->nama_depan?> <?=$k->nama_belakang?></td>
                                            <td class="text-center"><a href="<?=base_URL()?>pengguna/konsumen/konsumendetail/<?=$k->id_konsumen?>" data-toggle="tooltip" title="Lihat Detail" class="btn btn-xs btn-primary">LIHAT</a></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_URL()?>pengguna/konsumen/konsumenedit/<?=$k->id_konsumen?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?=base_URL()?>pengguna/konsumen/konsumenhapus/<?=$k->id_konsumen?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
