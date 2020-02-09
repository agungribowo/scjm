<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_pengguna');
    }

    //index
	public function index() {
		if (isset($_POST['submit'])) {
			$uploadFoto = $this->upload_foto();
			$this->m_pengguna->update($uploadFoto);
      		$this->session->set_flashdata('simpan', 'Profil kamu berhasil diperbaharui ...');
      		redirect('pengguna/profil');
	    } else {
	        $data = array(
	        	'title' => 'Profil Saya | PT Surya Cipta Jaya Makmur',
	        	'pgn'    => $this->db->get_where('tbl_pengguna', array('id_pengguna' => $this->session->userdata('id_pengguna')))->row_array()
	        );
			$this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
		    $this->load->view('_backend/pengguna/user/profil');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
		}		
	}


	//upload foto
	public function upload_foto() {
		$config['upload_path']    = './assets/pengguna/';
		$config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
		$config['max_size']       = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('filefoto');
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}
