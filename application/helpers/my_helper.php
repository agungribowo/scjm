<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
//session pengguna
function sesiPengguna() { 
  if(isset($_SESSION['id_pengguna'])) {
      return TRUE;
  } else {
     redirect(base_url(), 'refresh');
  }
}

//session konsumen
function sesiKonsumen() { 
    if(isset($_SESSION['id_konsumen'])) {
        return TRUE;
    } else {
       redirect(base_url(), 'refresh');
    }
  }

//getPengguna
function getPengguna($id_pengguna) {
	$CI =& get_instance();
	$ambil = $CI->db->query("SELECT nama FROM tbl_pengguna WHERE id_pengguna = '$id_pengguna'")->row();
	return $ambil->nama;
}

//getProduk
function getProduk($id_produk) {
	$CI =& get_instance();
	$ambil = $CI->db->query("SELECT nama_produk FROM tbl_produk WHERE id_produk = '$id_produk'")->row();
	return $ambil->nama_produk;
}

//getProdukG
function getProdukG($id_produk) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT gambar_produk FROM tbl_produk WHERE id_produk = '$id_produk'")->row();
    return $ambil->gambar_produk;
}

//getKonsumenD
function getKonsumenD($id_konsumen) {
	$CI =& get_instance();
	$ambil = $CI->db->query("SELECT nama_depan FROM tbl_konsumen WHERE id_konsumen = '$id_konsumen'")->row();
	return $ambil->nama_depan;
}

//getKonsumenB
function getKonsumenB($id_konsumen) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT nama_belakang FROM tbl_konsumen WHERE id_konsumen = '$id_konsumen'")->row();
    return $ambil->nama_belakang;
}

//getPembayaranB
function getPembayaranB($id_pemesanan) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT bank FROM tbl_pembayaran WHERE id_pemesanan = '$id_pemesanan'")->row();
    return $ambil->bank;
}

//getPembayaranR
function getPembayaranR($id_pemesanan) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT no_rek FROM tbl_pembayaran WHERE id_pemesanan = '$id_pemesanan'")->row();
    return $ambil->no_rek;
}

//getPembayaranH
function getPembayaranH($id_pemesanan) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT harga FROM tbl_pembayaran WHERE id_pemesanan = '$id_pemesanan'")->row();
    return $ambil->harga;
}

//tanggal
function getTanggal($tanggal) {
    $ubah = gmdate($tanggal, time()+60*60*8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $p_satu = explode(' ',$tanggal);
    $tgls   = explode('-',$p_satu[0]); 
    $bulan  = array('Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
    $bulans = $bulan[($tgls[1]-1)];
    return $tgl.' '.$bulans.' '.$thn;
}

//hari
function getHari($tanggal) {
    $ubah = gmdate($tanggal, time()+60*60*8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
    $nama_hari = "";
    if($nama=="Sunday") {$nama_hari="Minggu";}
    else if($nama=="Monday") {$nama_hari="Senin";}
    else if($nama=="Tuesday") {$nama_hari="Selasa";}
    else if($nama=="Wednesday") {$nama_hari="Rabu";}
    else if($nama=="Thursday") {$nama_hari="Kamis";}
    else if($nama=="Friday") {$nama_hari="Jum'at";}
    else if($nama=="Saturday") {$nama_hari="Sabtu";}
    return $nama_hari;
}


//uang
function getRupiah($harga) {
    $a    = (string)$harga;
    $len  = strlen($a);
 
    if($len <= 18) {
        $ratril  = $len-3-1;
        $ramil   = $len-6-1;
        $rajut   = $len-9-1;
        $juta    = $len-12-1;
        $ribu    = $len-15-1;
 
        $angka='';
        for($i = 0; $i < $len; $i++) {
            if($i == $ratril) {
                $angka=$angka.$a[$i].".";
            } else if($i == $ramil){
                $angka = $angka.$a[$i].".";
            } else if($i == $rajut) {
                $angka = $angka.$a[$i].".";
            } else if($i == $juta) {
                $angka = $angka.$a[$i].".";
            } else if($i == $ribu) {
                $angka = $angka.$a[$i].".";
            } else {
                $angka = $angka.$a[$i];
            }
        }
    }
    echo $angka.",-";
}
