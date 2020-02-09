<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

    //table
    public $table ="tbl_pemesanan";
    
    //data
    public function data() {
        $query = "SELECT * FROM $this->table ORDER BY id_pemesanan ASC";
        return $this->db->query($query)->result();
    }

    //Kode Otomatis
    function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pemesanan, 4)) AS kd_max FROM $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        $kodejadi = "IV-".$kd;
           return $kodejadi;
    }
 
    //simpan
    public function simpan() {
        $data = array(
            'id_pemesanan'       => $this->input->post('id_pemesanan'),
            'id_konsumen'        => $this->input->post('id_konsumen'),
            'id_produk'          => $this->input->post('id_produk'),
            'tanggal_pemesanan'  => $this->input->post('tanggal_pemesanan'),
            'status'             => 'Konfirmasi Pembayaran'
        );
        $this->db->insert($this->table, $data);
    }

    //simpan2
    public function simpan2() {
        $data = array(
            'id_pemesanan'       => $this->input->post('id_pemesanan'),
            'id_konsumen'        => $this->input->post('id_konsumen'),
            'id_produk'          => $this->input->post('id_produk'),
            'tanggal_pemesanan'  => $this->input->post('tanggal_pemesanan'),
            'status'             => $this->input->post('status'),
            'id_pengguna'        => $this->session->userdata('id_pengguna')
        );
        $this->db->insert($this->table, $data);
    }

    //date range
    public function dateRange($from, $to) {
        $sql = "SELECT * FROM $this->table WHERE tanggal_pemesanan >= '".$from."' AND tanggal_pemesanan <= '".$to."' AND status='Disetujui' ORDER BY tanggal_pemesanan ASC";
        return $this->db->query($sql);
    }

}
