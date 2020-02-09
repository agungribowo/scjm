<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data = array(
			'title' => 'Home | PT Surya Cipta Jaya Makmur'
		);
		$this->load->view('_frontend/header', $data);
		$this->load->view('_frontend/navbar');
		$this->load->view('_frontend/home');
		$this->load->view('_frontend/footer');
	}

}
