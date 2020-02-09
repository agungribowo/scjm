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
                        <h1 class="text-center animation-slideDown"><strong>Produk Kami</strong></h1>
                        <h2 class="text-center animation-slideUp push hidden-xs">PT. Surya Cipta Jaya Makmur</h2>
                    </div>
                </section>
            </div>
            <!-- END Intro with Video -->

            <!-- Product List -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row">
                        <!-- Products -->
                        <div class="col-md-8 col-lg-12">
                            <div class="row store-items">

                                <?php 
                                    foreach($prd->result() as $p) :
                                    
                                        $gambar_produk = 'default.jpg';
                                        if($p->gambar_produk && file_exists('assets/produk/'.$p->gambar_produk)) {
                                            $gambar_produk = $p->gambar_produk;
                                        }
                                ?>

                                <div class="col-md-4 visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                                    <div class="store-item">
                                        <div class="store-item-rating text-warning">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        <div class="store-item-image">
                                            <a href="<?=base_URL()?>produk/detail/<?=$p->id_produk?>">
                                                <img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="produk" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="store-item-info clearfix">
                                            <span class="store-item-price themed-color-dark pull-right"><?=$p->id_produk?></span>
                                            <a href="<?=base_URL()?>produk/detail/<?=$p->id_produk?>"><strong><?=$p->nama_produk?></strong></a><br>
                                            
                                            <?php if($spgn['id_pengguna']) { ?>
                                                <small><i class="fa fa-handshake-o text-muted"></i> <a href="javascript:void(0)" class="text-muted"> Pesan</a></small>
                                            <?php } else if($sksm['id_konsumen']) { ?>
                                                <form action="<?=base_URL()?>produk/pemesanan" method="post" class="form-inline push-bit">
                                                    <input type="hidden" name="id_produk" value="<?=$p->id_produk?>" />
                                                    <input type="hidden" name="jmlProduk" value="1" />
                                                    <button type="submit" class="btn btn-sm btn-info">
                                                        <small><i class="fa fa-handshake-o"></i>&nbsp; Pesan</small>
                                                    </button>
                                                </form>
                                            <?php } else { ?>
                                                <small><i class="fa fa-handshake-o text-muted"></i> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="text-muted"> Pesan</a></small>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                        <!-- END Products -->
                    </div>
                </div>
            </section>
            <!-- END Product List -->

            <!-- Best Sellers -->
            <section class="site-content site-section" align="right">
                <div class="container">
                    <hr>
                    <div class="row store-items">
                        <?=$paging?>
                    </div>
                    <hr>
                </div>
            </section>
            <!-- END Best Sellers -->    
