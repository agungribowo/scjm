<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="PT. SURYA CIPTA JAYA MAKMUR" />
    <meta name="author" content="PT. SURYA CIPTA JAYA MAKMUR" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_URL()?>assets/favicon/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="<?=base_URL()?>assets/pdf/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_URL()?>assets/pdf/kop.png" width="100%" class="img-responsive" alt="kop">
      </div>
      <h1>LAPORAN PRODUK<br>PT. SURYA CIPTA JAYA MAKMUR</h1>
    </header>

    <main>
      <table>
        <thead>
          <tr>
            <th style="text-align: center; width: 5%">NO</th>
            <th style="text-align: center">GAMBAR PRODUK</th>
            <th style="text-align: center">ID PRODUK</th>
            <th style="text-align: left">NAMA PRODUK</th>
            <th style="text-align: left">KETERANGAN</th>
          </tr>
        </thead>
        <tbody>

          <?php 
            $no = 1; 
            foreach($prd as $p)  :

            $gambar_produk = 'default.jpg';
            if($p->gambar_produk && file_exists('assets/produk/'.$p->gambar_produk)) {
                $gambar_produk = $p->gambar_produk;
            }
          ?>

          <tr>
            <td style="text-align: center"><b><?=$no?>.</b></td>
            <td style="text-align: center"><img src="<?=base_URL().'assets/produk/'.$gambar_produk?>" alt="produk" class="img-circle" width="100"></td>
            <td style="text-align: center"><?=$p->id_produk?></td>
            <td style="text-align: left"><?=$p->nama_produk?></td>
            <td style="text-align: left"><?=$p->keterangan_produk?></td>
          </tr>
          <tr></tr>
          <?php $no++; endforeach ?>
          <tr>
         
            <td colspan="4" class="grand total">TOTAL : </td>
            <td class="grand total" style="text-align: center"><?=$pdr?></td>
          </tr>
        </tbody>
    </table>

    </main>

  <br><br><br><br><br><br><br><hr>

  </body>
</html>

