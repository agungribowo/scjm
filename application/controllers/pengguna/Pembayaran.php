<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_pembayaran');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Pembayaran | PT Surya Cipta Jaya Makmur',
			'pby'   => $this->m_pembayaran->data()
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/pembayaran/list');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jstable');        
	}

    //hapus
	public function pembayaranhapus() {
		if ($id_pembayaran = $this->uri->segment(4) && $id_pemesanan = $this->uri->segment(4)) {
			if(!empty($id_pembayaran) && !empty($id_pemesanan)) {
				$this->db->where('id_pembayaran', $id_pembayaran);
				$this->db->delete('tbl_pembayaran');

				$sp = array('status' => 'Konfirmasi Pembayaran');
                $this->db->where('id_pemesanan', $id_pemesanan);
                $this->db->update('tbl_pemesanan', $sp);
			}
			$this->session->set_flashdata('simpan', 'Pembayaran berhasil dihapus ...');
			redirect('pengguna/pembayaran');
		} else {
			redirect('pengguna/pembayaran');
		}
    }
    
}
