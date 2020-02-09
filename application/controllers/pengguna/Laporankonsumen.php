<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporankonsumen extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_konsumen');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Laporan Konsumen | PT Surya Cipta Jaya Makmur'
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/laporan/konsumen/view');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jsform');
	}

    //laporan konsumen lihat
    public function lihat() {
        $data = array(
            'title' => 'Laporan Konsumen | PT Surya Cipta Jaya Makmur',
            'ksm'   => $this->m_konsumen->data(),
            'kms'   => $this->db->count_all('tbl_konsumen')
        );
        $this->load->view('_backend/pengguna/laporan/konsumen/cetak', $data);
    }

    //laporan konsumen cetak
    public function cetak() {
        $data = array(
            'title' => 'Laporan Konsumen | PT Surya Cipta Jaya Makmur',
            'ksm'   => $this->m_konsumen->data(),
            'kms'   => $this->db->count_all('tbl_konsumen')
        );
        $this->load->view('_backend/pengguna/laporan/konsumen/cetak', $data);
    }

}
