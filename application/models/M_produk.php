<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    //table
    public $table ="tbl_produk";

    //ambil data produk dari database
    public function getAll($limit, $start) {
        $query = $this->db->get($this->table, $limit, $start);
        return $query;
    }
    
    //data
    public function data() {
        $query = "SELECT * FROM $this->table ORDER BY id_produk ASC";
        return $this->db->query($query)->result();
    }

    //Kode Otomatis
    function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_produk, 4)) AS kd_max FROM $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        $kodejadi = "P".$kd;
           return $kodejadi;
    }
 
    //simpan
    public function simpan($gambar_produk) {
        $data = array(
            'id_produk'          => $this->input->post('id_produk'),
            'nama_produk'        => $this->input->post('nama_produk'),
            'keterangan_produk'  => $this->input->post('keterangan_produk'),
            'gambar_produk'      => $gambar_produk
        );
        $this->db->insert($this->table, $data);
    }

    //update
    public function update($gambar_produk) {
        if(empty($gambar_produk)) {
            $data = array(
                'nama_produk'        => $this->input->post('nama_produk'),
                'keterangan_produk'  => $this->input->post('keterangan_produk')
            );
        } else {
            $data = array(
                'nama_produk'        => $this->input->post('nama_produk'),
                'keterangan_produk'  => $this->input->post('keterangan_produk'),
                'gambar_produk'      => $gambar_produk
            );
        }

        $id_produk = $this->input->post('id_produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->update($this->table, $data);
    }

}
