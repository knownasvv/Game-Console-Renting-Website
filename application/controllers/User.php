<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function orderlist(){
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
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
    
}