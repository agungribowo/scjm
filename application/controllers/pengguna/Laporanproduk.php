<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanproduk extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_produk');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Laporan Produk | PT Surya Cipta Jaya Makmur'
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/laporan/produk/view');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jsform');
	}

    //laporan produk lihat
    public function lihat() {
        $data = array(
            'title' => 'Laporan Produk | PT Surya Cipta Jaya Makmur',
            'prd'   => $this->m_produk->data(),
            'pdr'   => $this->db->count_all('tbl_produk')
        );
        $this->load->view('_backend/pengguna/laporan/produk/cetak', $data);
    }

    //laporan produk cetak
    public function cetak() {
        $data = array(
            'title' => 'Laporan Produk | PT Surya Cipta Jaya Makmur',
            'prd'   => $this->m_produk->data(),
            'pdr'   => $this->db->count_all('tbl_produk')
        );
        $this->load->view('_backend/pengguna/laporan/produk/cetak', $data);
    }

}
