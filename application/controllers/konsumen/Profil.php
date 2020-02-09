<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	//library, helper, model
	public function __construct() {
		parent::__construct();
		sesiKonsumen();
		$this->load->model('m_konsumen');
	}

	public function index() {
		$id_konsumen = $this->session->userdata('id_konsumen');
        $data = array(
			'title'   => 'Profil Saya | PT Surya Cipta Jaya Makmur',
			'ksm'     => $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen))->row_array(),
			'pms' 	  => $this->db->query("SELECT * FROM tbl_pemesanan WHERE id_konsumen = '$id_konsumen'")->num_rows()
        );
				
        $this->load->view('_frontend/header', $data);
        $this->load->view('_frontend/navbar');
		$this->load->view('_frontend/konsumen/profil/view');
		$this->load->view('_frontend/footer');
	}

	public function edit() {
		if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_konsumen->update($uploadFoto);
      		$this->session->set_flashdata('simpan', 'Profil Kamu berhasil diperbaharui ...');
      		redirect('konsumen/profil');

      	} else {
			if ($id_konsumen = $this->session->userdata('id_konsumen')) {
		        $data = array(
					'title'   => 'Edit Profil Saya | PT Surya Cipta Jaya Makmur',
					'ksm'     => $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen))->row_array()
		        );
						
		        $this->load->view('_frontend/header', $data);
		        $this->load->view('_frontend/navbar');
				$this->load->view('_frontend/konsumen/profil/edit');
				$this->load->view('_frontend/footer2');

			} else {
				redirect();
			}
		}
	}

	//upload foto
	public function upload_foto() {
		$config['upload_path']    = './assets/konsumen/';
		$config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
		$config['max_size']       = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('filefoto');
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}
