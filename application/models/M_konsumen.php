<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsumen extends CI_Model {

    //table
    public $table ="tbl_konsumen";
    
    //check login
    public function checkLogin($username, $password) {
        $this->db->where('username like binary', $username);
        $this->db->where('password like binary',  SHA1($password));

        $konsumen = $this->db->get($this->table)->row_array();
        return $konsumen;
    }

    //data
    public function data() {
        $query = "SELECT * FROM $this->table ORDER BY id_konsumen ASC";
        return $this->db->query($query)->result();
    }

    //Kode Otomatis
    function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_konsumen, 3)) AS kd_max FROM $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        $kodejadi = "KSM-".$kd;
           return $kodejadi;
    }
 
    //simpan
    public function simpan($foto) {
        $data = array(
            'id_konsumen'     => $this->input->post('id_konsumen'),
            'username'        => $this->input->post('username'),
            'password'        => SHA1($this->input->post('password')),
            'email'           => $this->input->post('email'),
            'nama_depan'      => $this->input->post('nama_depan'),
            'nama_belakang'   => $this->input->post('nama_belakang'),
            'alamat'          => $this->input->post('alamat'),
            'kota'            => $this->input->post('kota'),
            'provinsi'        => $this->input->post('provinsi'),
            'kodepos'         => $this->input->post('kodepos'),
            'telp'            => $this->input->post('telp'),
            'foto'            => $foto
        );
        $this->db->insert($this->table, $data);
    }

    //update
    public function update($foto) {
        if(empty($foto) AND $this->input->post('password') == '') {
            $data = array(
                'username'        => $this->input->post('username'),
                'email'           => $this->input->post('email'),
                'nama_depan'      => $this->input->post('nama_depan'),
                'nama_belakang'   => $this->input->post('nama_belakang'),
                'alamat'          => $this->input->post('alamat'),
                'kota'            => $this->input->post('kota'),
                'provinsi'        => $this->input->post('provinsi'),
                'kodepos'         => $this->input->post('kodepos'),
                'telp'            => $this->input->post('telp')
            );
        } else if(empty($foto) AND $this->input->post('password') != '') {
            $data = array(
                'username'        => $this->input->post('username'),
                'password'        => SHA1($this->input->post('password')),
                'email'           => $this->input->post('email'),
                'nama_depan'      => $this->input->post('nama_depan'),
                'nama_belakang'   => $this->input->post('nama_belakang'),
                'alamat'          => $this->input->post('alamat'),
                'kota'            => $this->input->post('kota'),
                'provinsi'        => $this->input->post('provinsi'),
                'kodepos'         => $this->input->post('kodepos'),
                'telp'            => $this->input->post('telp')
            );
        } else if(empty($foto)) {
            $data = array(
                'username'        => $this->input->post('username'),
                'password'        => SHA1($this->input->post('password')),
                'email'           => $this->input->post('email'),
                'nama_depan'      => $this->input->post('nama_depan'),
                'nama_belakang'   => $this->input->post('nama_belakang'),
                'alamat'          => $this->input->post('alamat'),
                'kota'            => $this->input->post('kota'),
                'provinsi'        => $this->input->post('provinsi'),
                'kodepos'         => $this->input->post('kodepos'),
                'telp'            => $this->input->post('telp')
            );
        } else if($this->input->post('password') == '') {
            $data = array(
                'username'        => $this->input->post('username'),
                'email'           => $this->input->post('email'),
                'nama_depan'      => $this->input->post('nama_depan'),
                'nama_belakang'   => $this->input->post('nama_belakang'),
                'alamat'          => $this->input->post('alamat'),
                'kota'            => $this->input->post('kota'),
                'provinsi'        => $this->input->post('provinsi'),
                'kodepos'         => $this->input->post('kodepos'),
                'telp'            => $this->input->post('telp'),
                'foto'            => $foto
            );
        } else if($this->input->post('password') != '') {
            $data = array(
                'username'        => $this->input->post('username'),
                'password'        => SHA1($this->input->post('password')),
                'email'           => $this->input->post('email'),
                'nama_depan'      => $this->input->post('nama_depan'),
                'nama_belakang'   => $this->input->post('nama_belakang'),
                'alamat'          => $this->input->post('alamat'),
                'kota'            => $this->input->post('kota'),
                'provinsi'        => $this->input->post('provinsi'),
                'kodepos'         => $this->input->post('kodepos'),
                'telp'            => $this->input->post('telp'),
                'foto'            => $foto
            );
        }

        $id_konsumen = $this->input->post('id_konsumen');
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->update($this->table, $data);
    }

}
