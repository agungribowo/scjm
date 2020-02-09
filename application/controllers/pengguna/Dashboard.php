<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//library, helper, model
	public function __construct() {
		parent::__construct();
		sesiPengguna();
	}

	public function index() {
        $data = array(
			'title'   => 'Dashboard | PT Surya Cipta Jaya Makmur',
			'prd' 	  => $this->db->count_all('tbl_produk'),
			'ksm' 	  => $this->db->count_all('tbl_konsumen'),
			'pms' 	  => $this->db->count_all('tbl_pemesanan'),
			'pby' 	  => $this->db->count_all('tbl_pembayaran')
        );
				
        $this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/dashboard/view');
		$this->load->view('_backend/footer');
		$this->load->view('_backend/js');
	}

}
