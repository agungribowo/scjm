<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        sesiPengguna();
        $this->load->model('m_pengguna');
	}
	
	//index
	public function index() {
		$data = array(
			'title' => 'Pengguna | PT Surya Cipta Jaya Makmur',
			'pgn'   => $this->m_pengguna->data()
		);
		$this->load->view('_backend/header', $data);
        $this->load->view('_backend/sidebar');
		$this->load->view('_backend/pengguna/user/list');
        $this->load->view('_backend/footer');
        $this->load->view('_backend/jstable');        
	}

    //tambah
	public function usertambah() {
		if (isset($_POST['submit'])) {
			$id_pengguna = $this->input->post('id_pengguna');
			$query = $this->db->get_where('tbl_pengguna', array('id_pengguna' => $id_pengguna));

			if($query->num_rows() == 0) {
                $uploadFoto = $this->upload_foto();
			    $this->m_pengguna->simpan($uploadFoto);
				$this->session->set_flashdata('simpan', 'Pengguna baru berhasil disimpan ...');
				redirect('pengguna/user');
			} else {
                $this->session->set_flashdata('salah', 'Terjadi kesalahan, Pengguna sudah ada ...');
                redirect('pengguna/user');
            }

        } else {
			$data = array(
				'title'     => 'Tambah Pengguna | PT Surya Cipta Jaya Makmur',
				'kodeunik'  => $this->m_pengguna->kodeotomatis()
			);
			$this->load->view('_backend/header', $data);
            $this->load->view('_backend/sidebar');
            $this->load->view('_backend/pengguna/user/tambah');
            $this->load->view('_backend/footer');
            $this->load->view('_backend/jsform');
		}
	}

	//edit
	public function useredit() {
		if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_pengguna->update($uploadFoto);
      		$this->session->set_flashdata('simpan', 'Pengguna berhasil diperbaharui ...');
      		redirect('pengguna/user');
	    } else {
			if ($id_pengguna = $this->uri->segment(4)) {
				$data = array(
					'title' => 'Edit Pengguna | PT Surya Cipta Jaya Makmur',
					'pgn'   => $this->db->get_where('tbl_pengguna', array('id_pengguna' => $id_pengguna))->row_array()
		        );
				$this->load->view('_backend/header', $data);
                $this->load->view('_backend/sidebar');
                $this->load->view('_backend/pengguna/user/edit');
                $this->load->view('_backend/footer');
                $this->load->view('_backend/jsform');
			} else {
				redirect('pengguna/user');
			}
		}		
    }

	//hapus
	public function userhapus() {
		if ($id_pengguna = $this->uri->segment(4)) {
			if(!empty($id_pengguna)) {
				$this->db->where('id_pengguna', $id_pengguna);
				$this->db->delete('tbl_pengguna');
			}
			$this->session->set_flashdata('simpan', 'Pengguna berhasil dihapus ...');
			redirect('pengguna/user');
		} else {
			redirect('pengguna/user');
		}
    }
    
    //upload foto
	public function upload_foto() {
		$config['upload_path']    = './assets/pengguna/';
		$config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
		$config['max_size']       = 2048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('filefoto');
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}
