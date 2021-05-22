<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('barang');
	}

	public function index() {
		$data['title'] = "Home";
		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		
		$data['barang'] = $this->barang->ShowData();

		if(isset($_SESSION['salt']) && $_SESSION['salt'] == 'user'){ 
			$this->load->model('user_model');
			$keranjang = $this->user_model->get_keranjang($_SESSION['id_user']);
			if(!is_null($keranjang) && count($keranjang) > 0) {
				$data['keranjang'] = $this->user_model->get_detail_keranjang($keranjang[0]['id_keranjang']);
			}
		} else if(isset($_SESSION['salt']) && $_SESSION['salt'] == 'user') {
			
		}

		if($this->session->flashdata('addToCart') !== null && $this->session->flashdata('nama_barang') !== null) {
			$data['addToCart'] = $this->session->flashdata('addToCart'); 
			$data['nama_barang'] = $this->session->flashdata('nama_barang');

			unset($_SESSION['addToCart']);
			unset($_SESSION['nama_barang']);
		}

		$this->load->view('pages/home', $data);
	}

	public function detail($id) { $this->detail_barang($id); }
	private function detail_barang($id) {
		$data['title'] = "Detail";

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

		$data['barang'] = $this->barang->ShowDetails($id);
		
		if(isset($_SESSION['salt']) && $_SESSION['salt'] == 'user'){ 
			$this->load->model('user_model');
			$keranjang = $this->user_model->get_keranjang($_SESSION['id_user']);
			$data['keranjang'] = $this->user_model->get_detail_keranjang($keranjang[0]['id_keranjang']);
		}

		$this->load->view('pages/detail', $data);
	}
}
