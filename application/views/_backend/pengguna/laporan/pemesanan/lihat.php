<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

                    <?php if($psn->num_rows() > 0) { ?>

                        <!-- Datatables Content -->
                        <div class="block full">                            
                            <div class="block-title">
                                <div class="block-options">
                                    <form action="<?=base_URL()?>pengguna/laporanpemesanan/cetak" method="post" target="_blank">
                                        <input type="hidden" name="from" value="<?=$from?>">
                                        <input type="hidden" name="to" value="<?=$to?>">
                                        <h2 class="pull-right"><strong>
                                            <button type="submit" name="submit" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-default"><i class="fa fa-print"></i></button>
                                        </strong></h2>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <div class='alert alert-success' id='alert' align="center">
                                    Pemesanan dari <b><?=getHari($from)?>, <?=getTanggal($from)?>
                                    </b> s/d <b><?=getHari($to)?>, <?=getTanggal($to)?></b>
                                </div>
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th class="text-center" width="100">ID</th>
                                            <th>KONSUMEN</th>
                                            <th>PRODUK</th>
                                            <th class="text-center">HARI / TANGGAL</th>
                                            <th class="text-center">HARGA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                        $no = 1; 
                                        foreach($psn->result() as $p) : 
                                    ?>

                                        <tr>
                                            <td class="text-center"><?=$no?></td>
                                            <td class="text-center"><?=$p->id_pemesanan?></td>
                                            <td><?=getKonsumenD($p->id_konsumen)?> <?=getKonsumenB($p->id_konsumen)?></td>
                                            <td><?=getProduk($p->id_produk)?></td>
                                            <td class="text-center"><?=getHari($p->tanggal_pemesanan)?>, <?=getTanggal($p->tanggal_pemesanan)?></td>
                                            <td class="text-right">Rp. <?=getRupiah(getPembayaranH($p->id_pemesanan))?></td>
                                        </tr>
                                    
                                    <?php $no++; endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>

                        <?php } else if($psn->num_rows() == 0) { ?>

                           <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                            <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class='alert alert-warning' align="center">
                                                Pemesanan dari <b><?=getHari($from)?>, <?=getTanggal($from)?>
                                                </b> s/d <b><?=getHari($to)?>, <?=getTanggal($to)?></b> tidak ditemukan !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--- end row -->

                        <?php } ?>

                        <script>
                          //Notifikasi
                          $("#alert").fadeTo(3000, 500).slideUp(500, function() {
                            $("#alert").alert('close');
                          })
                        </script>
                        