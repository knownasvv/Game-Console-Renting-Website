<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('barang');
        $this->load->model('admin_model');
	}

	// FRONT-END
	public function index() {
		$data['title'] = "Home";

		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		
		$data['barang'] = $this->barang->ShowData();
		
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
		

		$this->load->view('pages/detail', $data);
	}

	public function addToCart($id) { $this->add_to_cart($id); }
	public function add_to_cart($id) {
		
	}

	// BACK-END
	
}
