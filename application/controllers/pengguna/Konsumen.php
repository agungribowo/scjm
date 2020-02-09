<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_konsumen');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Konsumen | PT Surya Cipta Jaya Makmur',
			'ksm'   => $this->m_konsumen->data()
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/konsumen/list');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jstable');        
	}

    //tambah
	public function konsumentambah() {
		if (isset($_POST['submit'])) {
			$id_konsumen = $this->input->post('id_konsumen');
			$query = $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen));

			if($query->num_rows() == 0) {
                $uploadFoto = $this->upload_foto();
			    $this->m_konsumen->simpan($uploadFoto);
				$this->session->set_flashdata('simpan', 'Konsumen baru berhasil disimpan ...');
				redirect('pengguna/konsumen');
			} else {
                $this->session->set_flashdata('salah', 'Terjadi kesalahan, Konsumen sudah ada ...');
                redirect('pengguna/konsumen');
            }

        } else {
			$data = array(
				'title'     => 'Tambah Konsumen | PT Surya Cipta Jaya Makmur',
				'kodeunik'  => $this->m_konsumen->kodeotomatis()
			);
			$this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/konsumen/tambah');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
		}
	}

	//edit
	public function konsumenedit() {
		if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_konsumen->update($uploadFoto);
      		$this->session->set_flashdata('simpan', 'Konsumen berhasil diperbaharui ...');
      		redirect('pengguna/konsumen');
	    } else {
			if ($id_konsumen = $this->uri->segment(4)) {
				$data = array(
					'title' => 'Edit Konsumen | PT Surya Cipta Jaya Makmur',
					'ksm'   => $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen))->row_array()
		        );
				$this->load->view('_backend/header', $data);
                $this->load->view('_backend/sidebar');
                $this->load->view('_backend/pengguna/konsumen/edit');
                $this->load->view('_backend/footer');
                $this->load->view('_backend/jsform');
			} else {
				redirect('pengguna/konsumen');
			}
		}		
    }
    
    //edit
	public function konsumendetail() {
        if ($id_konsumen = $this->uri->segment(4)) {
            $data = array(
                'title' => 'Detail Konsumen | PT Surya Cipta Jaya Makmur',
                'ksm'   => $this->db->get_where('tbl_konsumen', array('id_konsumen' => $id_konsumen))->row_array()
            );
            $this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/konsumen/detail');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
        } else {
            redirect('pengguna/konsumen');
        }
	}

	//hapus
	public function konsumenhapus() {
		if ($id_konsumen = $this->uri->segment(4)) {
			if(!empty($id_konsumen)) {
				$this->db->where('id_konsumen', $id_konsumen);
				$this->db->delete('tbl_konsumen');
			}
			$this->session->set_flashdata('simpan', 'Konsumen berhasil dihapus ...');
			redirect('pengguna/konsumen');
		} else {
			redirect('pengguna/konsumen');
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
