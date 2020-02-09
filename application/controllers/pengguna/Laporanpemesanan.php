<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanpemesanan extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_pemesanan');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Laporan Pemesanan | PT Surya Cipta Jaya Makmur'
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/laporan/pemesanan/view');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jsform');
        $this->load->view('_backend/pengguna/laporan/pemesanan/jsekstra');
	}

    //lihat
    public function lihat($from, $to) {
        $data = array(
            'title' => 'Laporan Pemesanan | PT Surya Cipta Jaya Makmur',
            'psn'   => $this->m_pemesanan->dateRange($from, $to),
            'from'  => date('Y-m-d', strtotime($from)),
            'to'    => date('Y-m-d', strtotime($to))
        );
        $this->load->view('_backend/pengguna/laporan/pemesanan/lihat', $data);
    }

    //cetak
    public function cetak() {
        if (isset($_POST['submit'])) {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $data = array(
                'title' => 'Laporan Pemesanan | PT Surya Cipta Jaya Makmur',
                'psn'   => $this->m_pemesanan->dateRange($from, $to),
                'from'  => date('Y-m-d', strtotime($from)),
                'to'    => date('Y-m-d', strtotime($to)),
                'pns'   => $this->db->query('SELECT * FROM tbl_pemesanan WHERE status = "Disetujui"')->num_rows()
            );
            $this->load->view('_backend/pengguna/laporan/pemesanan/cetak', $data);
        } else {
            $this->session->set_flashdata('salah', 'Terjadi Kesalahan ...');
            redirect('pengguna/laporanpemesanan');
        }
    }

}
