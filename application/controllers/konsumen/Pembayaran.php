<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	//library, helper, model
	public function __construct() {
		parent::__construct();
		sesiKonsumen();
		$this->load->model('m_pembayaran');
	}

	public function index() {
		$id_pemesanan = $this->input->post('id_pemesanan');
		if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
			$this->m_pembayaran->simpan($uploadFoto);

			$sp = array('status' => 'Menunggu Konfirmasi');
            $this->db->where('id_pemesanan', $id_pemesanan);
            $this->db->update('tbl_pemesanan', $sp);

            $this->session->set_flashdata('simpan', 'Menunggu Pembayaran dikonfirmasi ...');
            redirect('konsumen/pemesanan');

        } else {
        	$id_pemesanan  = addslashes($this->input->post('id_pemesanan'));
	        $data = array(
				'title'     => 'Konfirmasi Pembayaran | PT Surya Cipta Jaya Makmur',
				'kodeunik'  => $this->m_pembayaran->kodeotomatis(),
				'psn' 	    => $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array(),
				'pesanan'   => $this->input->post('pesanan')
	        );
	        $this->load->view('_frontend/header', $data);
	        $this->load->view('_frontend/navbar');
			$this->load->view('_frontend/konsumen/pembayaran/form');
			$this->load->view('_frontend/footer2');
		}
	}


	//upload foto
	public function upload_foto() {
		$config['upload_path']    = './assets/pembayaran/';
		$config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
		$config['max_size']       = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('filefoto');
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}
