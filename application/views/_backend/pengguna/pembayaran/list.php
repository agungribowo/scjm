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
                                    <i class="gi gi-credit_card"></i>Pembayaran<br><small> List Data Pembayaran</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-credit_card"></i>&nbsp; Pembayaran</a></li>
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
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/pembayaran" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center"><i class="gi gi-picture"></i></th>
                                            <th class="text-center" width="80">ID BAYAR</th>
                                            <th class="text-center" width="80">ID PESAN</th>
                                            <th class="text-center">HARI / TANGGAL</th>
                                            <th class="text-center">(BANK) &nbsp; NO REK</th>
                                             <th class="text-center">NOMINAL</th>

                                        <?php if($spgn['level'] == "Administrator") { ?>
                                            <th class="text-center" width="50"><i class="gi gi-flash"></i></th>
                                        <?php } else if($spgn['level'] == "Pimpinan") { ?>
                                        <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($pby as $p) : 

                                        $bukti = 'default.jpg';
                                        if($p->bukti && file_exists('assets/pembayaran/'.$p->bukti)) {
                                            $bukti = $p->bukti;
                                        }
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><img src="<?=base_URL().'assets/pembayaran/'.$bukti?>" alt="bukti pembayaran" class="img-circle" width="50"></td>
                                            <td class="text-center"><?=$p->id_pembayaran?></td>
                                            <td class="text-center"><?=$p->id_pemesanan?></td>
                                            <td class="text-center"><?=getHari($p->tanggal_pembayaran)?>, <?=getTanggal($p->tanggal_pembayaran)?></td>
                                            <td class="text-center">(<?=$p->bank?>) &nbsp; <?=$p->no_rek?></td>
                                            <td class="text-center">Rp. <?=getRupiah($p->harga)?></td>

                                        <?php if($spgn['level'] == "Administrator") { ?>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_URL()?>pengguna/pembayaran/pembayaranhapus/<?=$p->id_pembayaran?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
