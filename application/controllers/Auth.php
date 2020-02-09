<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    //library, helper, model
	public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
        $this->load->model('m_konsumen');
    }

	public function index() {
        if(isset($_SESSION['id_pengguna'])) {
            redirect(site_url('pengguna/dashboard'));
        } else if(isset($_SESSION['id_konsumen'])) {
            redirect(site_url('konsumen/dashboard'));
        } else {
            $data = array(
                'title' => 'Log In | PT Surya Cipta Jaya Makmur'
            );
            $this->load->view('_backend/header', $data);
            $this->load->view('_backend/view_signin');
        }
    }

    //check authentifikasi
	public function checkAuth() {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $loginPengguna = $this->m_pengguna->checkLogin($username, $password);
            $loginKonsumen = $this->m_konsumen->checkLogin($username, $password);

            if (!empty($loginPengguna)) {
            	$this->session->set_userdata($loginPengguna);
                $this->session->set_flashdata('berhasil', 'kamu berhasil masuk ...');
                redirect('pengguna/dashboard');
                
            } else if (!empty($loginKonsumen)) {
            	$this->session->set_userdata($loginKonsumen);
                $this->session->set_flashdata('berhasil', 'kamu berhasil masuk ...');
            	redirect('konsumen/profil');

            } else {
                $this->session->set_flashdata('gagal', 'maaf, username / password kamu salah !');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('gagal', 'maaf, username / password kamu salah !');
            redirect('auth');
        }
    }
    
    //logout
    public function logout() {
    	$this->session->sess_destroy();
    	redirect('auth');
	}

}
