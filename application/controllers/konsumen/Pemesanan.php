<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	//library, helper, model
	public function __construct() {
		parent::__construct();
		sesiKonsumen();
		$this->load->model('m_produk');
		$this->load->model('m_konsumen');
		$this->load->model('m_pemesanan');
		$this->load->model('m_pembayaran');
	}

	public function index() {
		$id_konsumen = $this->session->userdata('id_konsumen');
        $data = array(
			'title'   => 'Pemesanan Saya | PT Surya Cipta Jaya Makmur',
			'ksm'     => $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen))->row_array(),
			'psn' 	  => $this->db->query("SELECT * FROM tbl_pemesanan WHERE id_konsumen = '$id_konsumen'  ORDER BY id_pemesanan ASC")->result()
        );
				
        $this->load->view('_frontend/header', $data);
        $this->load->view('_frontend/navbar');
		$this->load->view('_frontend/konsumen/pemesanan/list');
		$this->load->view('_frontend/footer');
	}


	//cetak
	public function cetak() {
		if($id_pemesanan = $this->uri->segment(4)) {
            $data = array(
                'title' => 'Invoice Pemesanan | PT Surya Cipta Jaya Makmur',
                'psn'   => $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array()
            );
            $this->load->view('_backend/header', $data);
            $this->load->view('_frontend/konsumen/pemesanan/invoice');
            $this->load->view('_backend/jsform');
        } else {
            redirect('konsumen/pemesanan');
        }
    }

}
