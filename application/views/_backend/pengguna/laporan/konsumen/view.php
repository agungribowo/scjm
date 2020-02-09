<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-list-alt"></i>Konsumen<br><small> Laporan Data Konsumen</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="fa fa-list-alt"></i>&nbsp; Laporan Konsumen</a></li>
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
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/laporankonsumen" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <!-- Normal Form Content -->
                            <div class="form-group form-actions">
                                <a onclick="window.open('<?=base_URL()?>pengguna/laporankonsumen/lihat', 'newwindow', 'width=1300, height=650', 'resizable=yes');" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp; <span>Lihat</span></a>
                                <a href="javascript: w=window.open('<?=base_URL()?>pengguna/laporankonsumen/cetak', 'newwindow', 'width=1300, height=650', 'resizable=yes'); w.focus(); w.print();" class="btn btn-sm btn-success pull-right"><i class="fa fa-print"></i>&nbsp; <span>Cetak</span></a>
                            </div>                            
                            <!-- END Normal Form Content -->

                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
