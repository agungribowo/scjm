<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//library, helper, model
	public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_konsumen');
        $this->load->model('m_pemesanan');
	}

	public function index() {
		$config['first_url'] 			= base_URL().'produk';
        $config['base_url'] 			= base_URL().'produk/index';
        $config['total_rows'] 			= $this->db->count_all('tbl_produk');
        $config['per_page'] 			= 6;
 
		$config['uri_segment'] 			= 3;
		
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] 			= floor($choice);
		
        //$config['use_page_numbers'] 	= TRUE;
        //$config['page_query_string'] 	= TRUE;
        //$config['enable_query_strings'] = FALSE;
        //$config['reuse_query_string'] 	= TRUE;
        //$config['query_string_segment']	= 'halaman';
 
        $config['full_tag_open'] 		= '<ul class="pagination">';
        $config['full_tag_close'] 		= '</ul>';
        $config['first_link'] 			= '&laquo; Pertama';
        $config['first_tag_open'] 		= '<li class="prev page">';
        $config['first_tag_close'] 		= '</li>';
 
        $config['last_link'] 			= 'Terakhir &raquo;';
        $config['last_tag_open'] 		= '<li class="next page">';
        $config['last_tag_close'] 		= '</li>';
 
        $config['next_link'] 			= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 		= '<li class="next page">';
        $config['next_tag_close'] 		= '</li>';
 
        $config['prev_link'] 			= '&larr; Sebelumnya';
        $config['prev_tag_open'] 		= '<li class="prev page">';
        $config['prev_tag_close'] 		= '</li>';
 
        $config['cur_tag_open'] 		= '<li class="current active"><a href="javascript:void(0)">';
        $config['cur_tag_close'] 		= '</a></li>';
 
        $config['num_tag_open'] 		= '<li class="page">';
        $config['num_tag_close'] 		= '</li>';

		$this->pagination->initialize($config);
		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['prd'] = $this->m_produk->getAll($config["per_page"], $data['page']);
		$data['title'] = 'Produk | PT Surya Cipta Jaya Makmur';
		$data['paging'] = $this->pagination->create_links();
				
        $this->load->view('_frontend/header', $data);
        $this->load->view('_frontend/navbar');
		$this->load->view('_frontend/produk');
		$this->load->view('_frontend/footer');
    }
    
    //detail
	public function detail() {
        if ($id_produk = $this->uri->segment(3)) {
            $data = array(
                'title' => 'Pemesanan | PT Surya Cipta Jaya Makmur',
                'prd'   => $this->db->get_where('tbl_produk', array('id_produk' => $id_produk))->row_array()
            );
            $this->load->view('_frontend/header', $data);
            $this->load->view('_frontend/navbar');
            $this->load->view('_frontend/detail');
            $this->load->view('_frontend/footer');
        } else {
            redirect('produk');
        }
    }

    //detail
    public function pemesanan() {
        $id_produk  = addslashes($this->input->post('id_produk'));
        if (isset($_POST['submit'])) {
            $this->m_pemesanan->simpan();
            $this->session->set_flashdata('simpan', 'Pemesanan berhasil disimpan ...');
            redirect('konsumen/pemesanan');

        } else {
            $data = array(
                'title'      => 'Pemesanan Produk | PT Surya Cipta Jaya Makmur',
                'kodeunik'   => $this->m_pemesanan->kodeotomatis(),
                'prd'        => $this->db->query("SELECT * FROM tbl_produk WHERE id_produk = '$id_produk'")->row(),
                'jmlProduk'  => $this->input->post('jmlProduk')
            );
            $this->load->view('_frontend/header', $data);
            $this->load->view('_frontend/navbar');
            $this->load->view('_frontend/konsumen/pemesanan/tambah');
            $this->load->view('_frontend/footer2');
        }
    }
    
}
