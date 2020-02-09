<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-stats"></i>Penjualan<br><small> Laporan Data Penjualan</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-stats"></i>&nbsp; Laporan Penjualan</a></li>
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
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/laporanpemesanan" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <!-- Normal Form Content -->
                            <?=form_open('pengguna/laporanpemesanan/lihat', array('id' => 'LapPemesanan'))?>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DARI TANGGAL</label>
                                            <input type="text" name="from" id="tanggal_dari" class="form-control input-datepicker-close"  data-date-format="yyyy-mm-dd" placeholder="DARI TANGGAL" required="yes" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>SAMPAI TANGGAL</label>
                                            <input type="text" name="to" id="tanggal_sampai" class="form-control input-datepicker-close"  data-date-format="yyyy-mm-dd" placeholder="SAMPAI TANGGAL" required="yes" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i>&nbsp; <span>Proses</span></button>
                                </div>

                            <?=form_close()?>
                            <!-- END Normal Form Content -->

                        </div>
                        <!-- END Datatables Content -->

                        <div id="result"></div>

                    </div>
                    <!-- END Page Content -->
