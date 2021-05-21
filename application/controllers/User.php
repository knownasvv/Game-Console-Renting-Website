<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		if(!isset($_SESSION)){ session_start(); } 
        if(!isset($_SESSION['salt'])){ redirect(base_url('index.php/login')); }
		else if($_SESSION['salt'] != 'user'){ redirect(base_url()); }
	}

	public function orderlist(){
		$data['title'] = "User Orders";
		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',$title,TRUE);
		$data['order'] = $this->user_model->get_order();
        $data['user'] = $this->user_model->get_user();
        $data['keranjang'] = $this->user_model->get_keranjang();
        $data['detail'] = $this->user_model->get_detail();
        $data['barang'] = $this->user_model->get_barang();
		$this->load->view('pages/user_orderlist.php',$data);
	}
	public function change(){
        $id=$_GET['id'];
        $this->user_model->change($id);
        redirect(base_url('index.php/user/orderlist'));
    }

	// Pemesanan User ke Cart
	public function addToCart($id) { $this->add_to_cart($id); }
	public function add_to_cart($id) {
		if(isset($_SESSION)){
			if($_SESSION['salt'] == 'user') {
				$barang = $this->user_model->get_barang($id)[0];
				$keranjang_user = $this->user_model->get_keranjang($_SESSION['id_user']);
				if($barang['stok'] >= 1) {
					$this->session->set_flashdata('addToCart', "success");
					$this->session->set_flashdata('nama_barang', $barang['nama']);
					
					if(!is_null($keranjang_user[0])){
						$this->user_model->add_detail_keranjang($keranjang_user[0]['id_keranjang'], $barang['id_barang']);;
					} else {
						var_dump($this->user_model->get_keranjang());
						if(!is_null($this->user_model->get_keranjang())) 
							$last_id_keranjang = (int)substr(end($this->user_model->get_keranjang())['id_keranjang'], 1);
						else $last_id_keranjang = 0;
						$new_id_keranjang = 'K'. sprintf("%04d", $last_id_keranjang+1);
						$this->user_model->add_keranjang($new_id_keranjang, $_SESSION['id_user']);
						$this->user_model->add_detail_keranjang($new_id_keranjang, $barang['id_barang']);
					}
					$this->user_model->minus_stok_barang($id);
				}
			} else if($_SESSION['salt'] != 'user') {
				redirect(base_url());
			}
		} else redirect(base_url('index.php/login'));

		redirect(base_url());
	}

	public function cart() {
		if($_SESSION['salt'] == 'user') {
			$keranjang = $this->user_model->get_keranjang($_SESSION['id_user'])[0];
			$data['keranjang'] = $keranjang;

			$detail_keranjang = $this->user_model->get_detail_keranjang($keranjang['id_keranjang']);
			$index = 0;
			foreach($detail_keranjang as $d) {
				$data['isi_keranjang'][$index] = $this->user_model->get_barang($d['id_barang']);
				$index++;
			}

			$data['title'] = "User Cart";
			$title['title'] = $data['title'];

			$data['style'] = $this->load->view('include/style',NULL,TRUE);
			$data['script'] = $this->load->view('include/script',NULL,TRUE);
			$data['navbar'] = $this->load->view('template/navbar',$title,TRUE);
			$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

			$this->load->view('pages/keranjang', $data);
		}
	}
    
}
