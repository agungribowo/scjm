<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
  $spgn = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array();
  $sksm = $this->db->get_where('tbl_konsumen', array('id_konsumen' => $this->session->userdata('id_konsumen')))->row_array();
?>
            <!-- Intro with Video -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
                <div class="bg-video" data-vide-bg="<?=base_URL()?>assets/_frontend/<?=base_URL()?>assets/_frontend/img/placeholders/videos/placeholder_video" data-vide-options="posterType: jpg">
                <section class="site-section site-section-light site-section-top">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Detail Produk <?=$prd['id_produk']?></strong></h1>
                        <h2 class="text-center animation-slideUp push hidden-xs">PT. Surya Cipta Jaya Makmur</h2>
                    </div>
                </section>
            </div>
            <!-- END Intro with Video -->

            
            <!-- Product View -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <!-- Product Details -->
                        <div class="col-md-8 col-lg-12">
                            <div class="row" data-toggle="lightbox-gallery">
                                <!-- Images -->
                                <div class="col-sm-6 push-bit">
                                    <?php 
                                        $gambar_produk = 'default.jpg';
                                        if($prd['gambar_produk'] && file_exists('assets/produk/'.$prd['gambar_produk'])) {
                                            $gambar_produk = $prd['gambar_produk'];
                                        }
                                    ?>
                                    <a href="<?=base_URL().'assets/produk/'.$gambar_produk?>" class="gallery-link"><img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="Gambar Produk" class="img-responsive push-bit"></a>
                                </div>
                                <!-- END Images -->

                                <!-- Info -->
                                <div class="col-sm-6 push-bit">
                                    <div class="clearfix">
                                        <div class="pull-right">
                                            <span class="h2"><strong><?=$prd['id_produk']?></strong></span>
                                        </div>
                                        <span class="h4"><strong class="text-success"><?=$prd['nama_produk']?></strong><br><small>Available</small></span>
                                    </div>
                                    <hr>
                                    <p align="justify"><?=$prd['keterangan_produk']?></p>
                                    <hr>

                                    <?php if($spgn['id_pengguna']) { ?>
                                    <form action="javascript:void(0)" method="post" class="form-inline push-bit">
                                        <a href="<?=base_URL()?>produk" class="btn btn-warning">Kembali ke Daftar Produk</a>
                                        <button type="submit" class="btn btn-success pull-right">Pesan</button>
                                    </form>
                                    <?php } else if($sksm['id_konsumen']) { ?>
                                    <form action="<?=base_URL()?>produk/pemesanan" method="post" class="form-inline push-bit">
                                        <input type="hidden" name="jmlProduk" value="1" />
                                        <input type="hidden" name="id_produk" value="<?=$prd['id_produk']?>" />
                                        <a href="<?=base_URL()?>produk" class="btn btn-warning">Kembali ke Daftar Produk</a>
                                        <button type="submit" class="btn btn-success pull-right">Pesan</button>
                                    </form>
                                    <?php } else { ?>
                                        <a href="<?=base_URL()?>produk" class="btn btn-warning">Kembali ke Daftar Produk</a>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-right">Pesan</a>
                                    <?php } ?>
                                </div>
                                <!-- END Info -->
                            </div>
                        </div>
                        <!-- END Product Details -->
                    </div>
                </div>
            </section>
            <!-- END Product View -->
