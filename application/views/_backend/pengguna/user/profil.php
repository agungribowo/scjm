<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-user"></i>Profil Saya<br><small> Data Profil Pengguna</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-parents"></i>&nbsp; Pengguna</li>
                            <li><a href="javascript:void(0)"><i class="gi gi-user"></i>&nbsp; Profil Saya</a></li>
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

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Normal Form Block -->
                                <div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options">
                                            <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/profil" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                        </div>                                        
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                    <?=form_open_multipart('pengguna/profil', 'class="form-bordered"', 'method="post"')?>
                                    
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>ID PENGGUNA</label>
                                                    <input type="text" name="id_pengguna" value="<?=$pgn['id_pengguna']?>" class="form-control" placeholder="ID PENGGUNA" readonly="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" value="<?=$pgn['username']?>" class="form-control" placeholder="Username" required="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Pengguna</label>
                                                    <input type="text" name="nama" value="<?=$pgn['nama']?>" class="form-control" placeholder="Nama Pengguna" required="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Level pengguna</label>
                                                    <select name="level" class="form-control" required="yes" readonly="yes" />
                                                        <option value="">Pilih Level Pengguna</option>
                                                        <option value="Administrator" <?php if($pgn['level'] == 'Administrator') { echo "selected=selected";} ?>>Administrator</option>
                                                        <option value="Pimpinan" <?php if($pgn['level'] == 'Pimpinan') { echo "selected=selected";} ?>>Pimpinan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <input type="file" class="form-control" name="filefoto" placeholder="foto profil">
                                                    <p class="help-block">Format File : jpg/jpeg, png/PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                                                </div>
                                            </div>
                                            <?php 
                                                $foto = 'avatar.jpg';
                                                if($pgn['foto'] && file_exists('assets/pengguna/'.$pgn['foto'])) {
                                                    $foto = $pgn['foto'];
                                                }
                                            ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-xs-12" align="center">
                                                        <div class="fileupload-new thumbnail" class="img-responsive" style="width: 150px; height: 150px;">
                                                            <img src="<?=base_URL().'assets/pengguna/'.$foto?>" alt="foto profil" style="height: 140px;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Update</span></button>
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
