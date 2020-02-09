<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

    //table
    public $table ="tbl_pembayaran";
    
    //data
    public function data() {
        $query = "SELECT * FROM $this->table ORDER BY id_pembayaran ASC";
        return $this->db->query($query)->result();
    }

    //Kode Otomatis
    function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pembayaran, 4)) AS kd_max FROM $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        $kodejadi = "FP-".$kd;
           return $kodejadi;
    }
 
    //simpan
    public function simpan($bukti) {
        $data = array(
            'id_pembayaran'       => $this->input->post('id_pembayaran'),
            'id_pemesanan'        => $this->input->post('id_pemesanan'),
            'tanggal_pembayaran'  => $this->input->post('tanggal_pembayaran'),
            'bank'                => $this->input->post('bank'),
            'no_rek'              => $this->input->post('no_rek'),
            'harga'              => $this->input->post('harga'),
            'bukti'               => $bukti
        );
        $this->db->insert($this->table, $data);
    }

}
