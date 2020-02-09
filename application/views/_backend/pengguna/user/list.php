<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $spgn = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array(); 
  $foto = 'avatar.jpg';
  if($spgn['foto'] && file_exists('assets/pengguna/'.$spgn['foto'])) {
      $foto = $spgn['foto'];
  }
?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-parents"></i>Pnegguna<br><small> List Data Konsumen</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-parents"></i>&nbsp; Pengguna</a></li>
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
                                    <h2><strong><a href="<?=base_URL()?>pengguna/user/usertambah" data-toggle="tooltip" title="Tambah" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a></strong></h2>
                                    <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/user" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center"><i class="gi gi-picture"></i></th>
                                            <th class="text-center" width="150">ID PENGGUNA</th>
                                            <th>USERNAME</th>
                                            <th>NAMA PENGGUNA</th>
                                            <th class="text-center" width="150"><i class="gi gi-adjust_alt"></th>
                                            <th class="text-center" width="50"><i class="gi gi-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($pgn as $p) : 
                                        
                                        $foto = 'avatar.jpg';
                                        if($p->foto && file_exists('assets/pengguna/'.$p->foto)) {
                                            $foto = $p->foto;
                                        }
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><img src="<?=base_URL().'assets/pengguna/'.$foto?>" alt="foto profil" class="img-circle" width="50"></td>
                                            <td class="text-center"><?=$p->id_pengguna?></td>
                                            <td><?=$p->username?></td>
                                            <td><?=$p->nama?></td>
                                            <td class="text-center">
                                                <?php if($p->level == "Administrator") { ?>
                                                    <span class="label label-default"><?=$p->level?></span>
                                                <?php } else if($p->level == "Pimpinan") { ?>
                                                    <span class="label label-primary"><?=$p->level?></span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                            <?php if ($p->id_pengguna == $spgn['id_pengguna']) { ?>
                                                <span class="label label-info">Ini Usermu</span>
                                            <?php } else { ?>
                                                <div class="btn-group">
                                                    <a href="<?=base_URL()?>pengguna/user/useredit/<?=$p->id_pengguna?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?=base_URL()?>pengguna/user/userhapus/<?=$p->id_pengguna?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            <?php } ?>
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
