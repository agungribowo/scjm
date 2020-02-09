<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_produk');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Produk | PT Surya Cipta Jaya Makmur',
			'prd'   => $this->m_produk->data()
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/produk/list');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jstable');
	}

    //tambah
	public function produktambah() {
		if (isset($_POST['submit'])) {
			$id_produk = $this->input->post('id_produk');
			$query = $this->db->get_where('tbl_produk', array('id_produk' => $id_produk));

			if($query->num_rows() == 0) {
                $uploadFoto = $this->upload_foto();
			    $this->m_produk->simpan($uploadFoto);
				$this->session->set_flashdata('simpan', 'Produk baru berhasil disimpan ...');
				redirect('pengguna/produk');
			} else {
                $this->session->set_flashdata('salah', 'Terjadi kesalahan, Produk sudah ada ...');
                redirect('pengguna/produk');
            }

        } else {
			$data = array(
				'title'     => 'Tambah Produk | PT Surya Cipta Jaya Makmur',
				'kodeunik'  => $this->m_produk->kodeotomatis()
			);
			$this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/produk/tambah');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
		}
	}

	//edit
	public function produkedit() {
		if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_produk->update($uploadFoto);
      		$this->session->set_flashdata('simpan', 'Produk berhasil diperbaharui ...');
      		redirect('pengguna/produk');
	    } else {
			if ($id_produk = $this->uri->segment(4)) {
				$data = array(
					'title' => 'Edit Produk | PT Surya Cipta Jaya Makmur',
					'prd'   => $this->db->get_where('tbl_produk', array('id_produk' => $id_produk))->row_array()
		        );
				$this->load->view('_backend/header', $data);
                $this->load->view('_backend/sidebar');
                $this->load->view('_backend/pengguna/produk/edit');
                $this->load->view('_backend/footer');
                $this->load->view('_backend/jsform');
			} else {
				redirect('pengguna/produk');
			}
		}		
	}

	//hapus
	public function produkhapus() {
		if ($id_produk = $this->uri->segment(4)) {
			if(!empty($id_produk)) {
				$this->db->where('id_produk', $id_produk);
				$this->db->delete('tbl_produk');
			}
			$this->session->set_flashdata('simpan', 'Produk berhasil dihapus ...');
			redirect('pengguna/produk');
		} else {
			redirect('pengguna/produk');
		}
    }
    
    //upload foto
	public function upload_foto() {
		$config['upload_path']    = './assets/produk/';
		$config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
		$config['max_size']       = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('filefoto');
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}
