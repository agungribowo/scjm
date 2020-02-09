<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if($psn->num_rows() > 0) { ?>

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
  <body onload="window.print()">
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_URL()?>assets/pdf/kop.png" width="300" alt="kop">
      </div>
      <h1>LAPORAN PENJUALAN - PT. SURYA CIPTA JAYA MAKMUR</h1>
      <h3 align="center"><b><?=getHari($from)?>, <?=getTanggal($from)?></b>&nbsp; s/d &nbsp;<b><?=getHari($to)?>, <?=getTanggal($to)?></b></h3><hr>
    </header>

    <main>
      <table>
        <thead>
          <tr>
            <th style="text-align: center; width: 5%">NO</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: left">KONSUMEN</th>
            <th style="text-align: left">PRODUK</th>            
            <th style="text-align: center">HARI / TANGGAL</th>
            <th style="text-align: right">HARGA</th>
          </tr>
        </thead>

        <tbody>

          <?php 
            $no = 1; 
            foreach($psn->result() as $p)  :
          ?>

          <tr>
            <td style="text-align: center"><b><?=$no?>.</b></td>
            <td style="text-align: center"><?=$p->id_pemesanan?></td>
            <td style="text-align: left">
              <?=$p->id_konsumen?>
              <?=getKonsumenD($p->id_konsumen)?> <?=getKonsumenB($p->id_konsumen)?>
            </td>
            <td style="text-align: left">
              <?=$p->id_produk?>
              <?=getProduk($p->id_produk)?>
            </td>            
            <td style="text-align: center"><?=getHari($p->tanggal_pemesanan)?>, <?=getTanggal($p->tanggal_pemesanan)?></td>
            <td style="text-align: right">Rp. <?=getRupiah(getPembayaranH($p->id_pemesanan))?></td>
          </tr>
          <tr></tr>
          <tr>

          <?php $no++; endforeach ?>
         
            <td colspan="5" class="grand total">TOTAL PENJUALAN : </td>
            <td class="grand total" style="text-align: right"><?=$pns?></td>
          </tr>
        </tbody>

    </table>

    </main>

    <br><br><br><br><br><br><br><hr>

  </body>
</html>

<?php } ?>