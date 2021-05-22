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
        $data['detail'] = $this->user_model->get_detail_keranjang();
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
				$keranjang = $this->user_model->get_keranjang();
				if($barang['stok'] >= 1 ) {
					// Data keranjang kosong, otomatis bikin ID baru dari K0001
					if(is_null($keranjang)) {
						$new_id_keranjang = 'K'. sprintf("%04d", 1);
						$this->user_model->add_keranjang($new_id_keranjang, $_SESSION['id_user']);
						$this->user_model->add_detail_keranjang($new_id_keranjang, $barang['id_barang']);
					} else {
						// Data keranjang tidak kosong, dilakukan looping pada keranjang
						$ada_dipesan = FALSE;
						$index_looping = 0;
						$end_looping = count($keranjang_user);
						foreach($keranjang_user as $k) {
							// Status barang = gantung, artinya langsung input ke detail keranjang sesuai ID
							if($k['status_barang'] == 'Gantung') {
								$this->user_model->add_detail_keranjang($k['id_keranjang'], $barang['id_barang']);
								break;
							}
							if($k['status_barang'] == 'Dipesan') $ada_dipesan = TRUE;
							if($index_looping+1 == count($keranjang_user) && $ada_dipesan) {
								// Status barang = dipesan, artinya bikin data keranjang baru dengan ID baru
								if($k['status_barang'] == 'Dipesan') {
									// Dapetin ID keranjang terakhir
									$last_id_keranjang = (int)substr(end($keranjang)['id_keranjang'], 1);
									// Bikin ID Keranjang sesuai format
									$new_id_keranjang = 'K'. sprintf("%04d", $last_id_keranjang+1);

									// Input to table keranjang dan detail_keranjang
									$this->user_model->add_keranjang($new_id_keranjang, $_SESSION['id_user']);
									$this->user_model->add_detail_keranjang($new_id_keranjang, $barang['id_barang']);
									break;
								} 
							}
							$index_looping++;
						}
					}
					$this->session->set_flashdata('addToCart', "success");
					$this->session->set_flashdata('nama_barang', $barang['nama']);
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
			$keranjang = $this->user_model->get_keranjang($_SESSION['id_user']);
			foreach($keranjang as $k) {
                if($k['status_barang'] == 'Gantung' && !is_null($k) && count($k) > 0) {
                    $data['keranjang'] = $k;
    
                    $detail_keranjang = $this->user_model->get_detail_keranjang($k['id_keranjang']);
                    $index = 0;
                    foreach($detail_keranjang as $d) {
                        $data['isi_keranjang'][$index] = $this->user_model->get_barang($d['id_barang']);
                        $index++;
                    }                
                }
            }
			$data['title'] = "User Cart";
			$title['title'] = $data['title'];

			$data['style'] = $this->load->view('include/style',NULL,TRUE);
			$data['script'] = $this->load->view('include/script',NULL,TRUE);
			$data['navbar'] = $this->load->view('template/navbar',$title,TRUE);
			$data['footer'] = $this->load->view('template/footer', NULL, TRUE);

			$this->load->view('pages/keranjang', $data);
		} else redirect(base_url('index.php/login'));
	}
    
	public function tambah12(){
		$keranjang=$_GET['keranjang'];
		$lama=$_GET['lama'];
		$order = $this->user_model->get_order();
		echo $lama;
		echo $keranjang;
		// Kalau table order kosong, ID mulai dari 1
		//if(is_null($order)) $last_id_order = 0;
		// Kalau table order tidak kosong, dapetin id_order terakhir
		// else $last_id_order = (int)substr(end($this->user_model->get_order())['id_order'], 1);
		// $new_id_order = 'R'. sprintf("%04d", $last_id_order+1);

		// $this->user_model->changeLama($keranjang,$lama);
		// $this->user_model->add_order($new_id_order,$keranjang);
	}	
	public function DeleteK(){
		$id=$_GET['id'];
		$keranjang=$_GET['keranjang'];
		$this->user_model->delete_dosen($id,$keranjang);
		redirect(base_url('index.php/user/cart'));
	}
}
