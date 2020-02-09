<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Fixed Top Header + Footer Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-parents"></i>Pengguna<br><small> Tambah Data Pengguna</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><i class="fa fa-dashboard"></i>&nbsp; Dashboard</li>
                            <li><i class="gi gi-parents"></i>&nbsp; Pengguna</li>
                            <li><a href="javascript:void(0)"><i class="fa fa-wpforms"></i>&nbsp; Tambah Pengguna</a></li>
                        </ul>
                        <!-- END Fixed Top Header + Footer Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Normal Form Block -->
                                <div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options">
                                            <h2><strong><a href="<?=base_URL()?>pengguna/user" data-toggle="tooltip" title="Kembali" class="btn btn-xs btn-info"><i class="fa fa-arrow-left"></i></a></strong></h2>
                                            <h2 class="pull-right"><strong><a href="<?=base_URL()?>pengguna/user/usertambah" data-toggle="tooltip" title="Refresh" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></a></strong></h2>
                                        </div>                                        
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                    <?=form_open_multipart('pengguna/user/usertambah', 'class="form-bordered"', 'method="post"')?>
                                    
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>ID PENGGUNA</label>
                                                    <input type="text" name="id_pengguna" value="<?=$kodeunik?>" class="form-control" placeholder="ID PENGGUNA" readonly="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username" required="yes" autofocus="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required="yes" autofocus="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Pengguna</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" required="yes" autofocus="yes" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Level pengguna</label>
                                                    <select name="level" class="form-control" required="yes" autofocus="yes" />
                                                        <option value="">Pilih Level Pengguna</option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Pimpinan">Pimpinan</option>                                                        
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
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp; <span>Simpan</span></button>
                                            <a href="<?=base_URL()?>pengguna/user" class="btn btn-sm btn-warning pull-right"><i class="fa fa-repeat"></i>&nbsp; <span>Batal</span></a>
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
