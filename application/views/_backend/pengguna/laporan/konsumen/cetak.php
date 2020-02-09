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
      <h1>LAPORAN KONSUMEN<br>PT. SURYA CIPTA JAYA MAKMUR</h1>
    </header>

    <main>
      <table>
        <thead>
          <tr>
            <th style="text-align: center; width: 5%">NO</th>
            <th style="text-align: center">FOTO</th>
            <th style="text-align: left">ID KONSUMEN</th>
            <th style="text-align: center">USERNAME</th>
            <th style="text-align: left">EMAIL</th>
            <th style="text-align: left">ALAMAT</th>
            <th style="text-align: center">NO TELP / HP</th>
          </tr>
        </thead>
        <tbody>

          <?php 
            $no = 1; 
            foreach($ksm as $k)  :

            $foto = 'avatar.jpg';
            if($k->foto && file_exists('assets/konsumen/'.$k->foto)) {
                $foto = $k->foto;
            }
          ?>

          <tr>
            <td style="text-align: center"><b><?=$no?>.</b></td>
            <td style="text-align: center"><img src="<?=base_URL().'assets/konsumen/'.$foto?>" alt="konsumen" class="img-circle" width="100"></td>
            <td style="text-align: left">
              <?=$k->id_konsumen?>
              <?=getKonsumenD($k->id_konsumen)?> <?=getKonsumenB($k->id_konsumen)?>
            </td>
            <td style="text-align: center"><?=$k->username?></td>
            <td style="text-align: left"><?=$k->email?></td>
            <td style="text-align: left">
              <?=$k->alamat?>
              <?=$k->kota?>-<?=$k->provinsi?> <?=$k->kodepos?>
            </td>
            <td style="text-align: center"><?=$k->telp?></td>
          </tr>
          <tr></tr>
          <?php $no++; endforeach ?>
          <tr>
         
            <td colspan="6" class="grand total">TOTAL : </td>
            <td class="grand total" style="text-align: center"><?=$kms?></td>
          </tr>
        </tbody>
    </table>

    </main>

  <br><br><br><br><br><br><br><hr>

  </body>
</html>

