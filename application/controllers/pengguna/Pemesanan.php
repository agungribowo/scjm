<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_produk');
        $this->load->model('m_konsumen');
        $this->load->model('m_pemesanan');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Pemesanan | PT Surya Cipta Jaya Makmur',
			'psn'   => $this->m_pemesanan->data()
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/pemesanan/list');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jstable');        
	}

    //tambah
	public function pemesanantambah() {
		if (isset($_POST['submit'])) {
			$id_pemesanan = $this->input->post('id_pemesanan');
			$query = $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan));

			if($query->num_rows() == 0) {
			    $this->m_pemesanan->simpan2();
				$this->session->set_flashdata('simpan', 'Pemesanan baru berhasil disimpan ...');
				redirect('pengguna/pemesanan');
			} else {
                $this->session->set_flashdata('salah', 'Terjadi kesalahan, Pemesanan sudah ada ...');
                redirect('pengguna/pemesanan');
            }

        } else {
			$data = array(
				'title'     => 'Tambah Pemesanan | PT Surya Cipta Jaya Makmur',
				'kodeunik'  => $this->m_pemesanan->kodeotomatis(),
				'ksm'       => $this->m_konsumen->data(),
				'prd'       => $this->m_produk->data()
			);
			$this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/pemesanan/tambah');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
		}
	}

	//disetujui
	public function pemesanandisetujui() {
		if($id_pemesanan = $this->uri->segment(4)) {
            if(!empty($id_pemesanan)) {
                $sp = array('status' => 'Disetujui', 'id_pengguna' => $this->session->userdata('id_pengguna'));
                $this->db->where('id_pemesanan', $id_pemesanan);
                $this->db->update('tbl_pemesanan', $sp);
            }
            $this->session->set_flashdata('simpan', 'Status Pemesanan Disetujui ...');
            redirect('pengguna/pemesanan');

        } else {
            redirect('pengguna/pemesanan');
        }
    }

	//ditolak
	public function pemesananditolak() {
		if($id_pemesanan = $this->uri->segment(4)) {
            if(!empty($id_pemesanan)) {
                $sp = array('status' => 'Ditolak', 'id_pengguna' => $this->session->userdata('id_pengguna'));
                $this->db->where('id_pemesanan', $id_pemesanan);
                $this->db->update('tbl_pemesanan', $sp);
            }
            $this->session->set_flashdata('tidak', 'Status Pemesanan Ditolak ...');
            redirect('pengguna/pemesanan');
            
        } else {
            redirect('pengguna/pemesanan');
        }
    }

    //cetak
	public function pemesanancetak() {
		if($id_pemesanan = $this->uri->segment(4)) {
            $data = array(
                'title' => 'Invoice Pemesanan | PT Surya Cipta Jaya Makmur',
                'psn'   => $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array()
            );
            $this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/pemesanan/invoice');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
        } else {
            redirect('pengguna/pemesanan');
        }
    }
    
}
