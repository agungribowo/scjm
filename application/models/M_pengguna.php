<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    //table
    public $table ="tbl_pengguna";
    
    //check login
    public function checkLogin($username, $password) {
        $this->db->where('username like binary', $username);
        $this->db->where('password like binary',  SHA1($password));

        $pengguna = $this->db->get($this->table)->row_array();
        return $pengguna;
    }

    //data
    public function data() {
        $query = "SELECT * FROM $this->table ORDER BY id_pengguna ASC";
        return $this->db->query($query)->result();
    }

    //Kode Otomatis
    function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pengguna, 3)) AS kd_max FROM $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        $kodejadi = "PGN-".$kd;
           return $kodejadi;
    }
 
    //simpan
    public function simpan($foto) {
        $data = array(
            'id_pengguna'  => $this->input->post('id_pengguna'),
            'username'     => $this->input->post('username'),
            'password'     => SHA1($this->input->post('password')),
            'nama'         => $this->input->post('nama'),
            'level'        => $this->input->post('level'),
            'foto'         => $foto
        );
        $this->db->insert($this->table, $data);
    }

    //update
    public function update($foto) {
        if(empty($foto) AND $this->input->post('password') == '') {
            $data = array(
                'username' => $this->input->post('username'),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level')
            );
        } else if(empty($foto) AND $this->input->post('password') != '') {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => SHA1($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level')
            );
        } else if(empty($foto)) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => SHA1($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level')
            );
        } else if($this->input->post('password') == '') {
            $data = array(
                'username' => $this->input->post('username'),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level'),
                'foto'     => $foto
            );
        } else if($this->input->post('password') != '') {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => SHA1($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level'),
                'foto'     => $foto
            );
        }

        $id_pengguna = $this->input->post('id_pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update($this->table, $data);
    }

}
