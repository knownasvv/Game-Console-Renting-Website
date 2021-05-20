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
	public function admin_barang(){
        $this->load->library('grocery_CRUD');
        $crud=new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('barang')
            ->columns('nama','harga','deskripsi','gambar')
            //->set_relation('Rating','rating','code')
			->callback_column('gambar', array($this, 'img_size'))
            ->fields('nama','harga','deskripsi','gambar')
            ->set_field_upload('gambar','assets/images/konsol')
            ->callback_edit_field('deskripsi',array($this,'edit_description'))
            ->callback_add_field('deskripsi',array($this,'add_description'));
        
        $output= $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/style',$data,TRUE);
        $data['script'] = $this->load->view('include/script',$data,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        //$data['footer'] = $this->load->view('template/footer',NULL,TRUE);
    
        $this->load->view('pages/admin_barang.php',$data);
    }
	function img_size($value){
        $tes = base_url('/assets/images/konsol/');
        return "<img src='$tes$value' width='100px'> </img>";
    }
    function edit_description($value,$primary_key){
        return "<textarea name='deskripsi'> $value </textarea>";
    }
    function add_description(){
        return "<textarea name='deskripsi'> </textarea> ";
    }

	public function admin_order1(){
        $this->load->library('grocery_CRUD');
        $crud=new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('orders')
            ->columns('id_order','id_keranjang','status_pemesanan')
            ->field_type('status_pemesanan', 'dropdown', array(
                '1' => 'Sedang Dikirim', 
                '2' => 'Sudah Dikirim', 
                '3' => 'Siap di Pick-up',
                '4' => 'Selesai'
            ))
			//->callback_column('gambar', array($this, 'img_size'))
            ->fields('id_order','id_keranjang','status_pemesanan')
            //->set_field_upload('gambar','assets/images/konsol')
            ->callback_edit_field('deskripsi',array($this,'edit_description'))
            ->callback_add_field('deskripsi',array($this,'add_description'));
        
        $output= $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/style',$data,TRUE);
        $data['script'] = $this->load->view('include/script',$data,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        //$data['footer'] = $this->load->view('template/footer',NULL,TRUE);
    
        $this->load->view('pages/admin_order.php',$data);
    }

    public function admin_order(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        $data['order'] = $this->admin_model->get_order();
        $data['user'] = $this->admin_model->get_user();
        $data['keranjang'] = $this->admin_model->get_keranjang();
        $data['detail'] = $this->admin_model->get_detail();
        $data['barang'] = $this->admin_model->get_barang();
        $this->load->view('pages/admin_order.php',$data);
    }

    public function change1(){
        $id=$_GET['id'];
        $this->admin_model->change1($id);
        redirect(base_url('index.php/home/admin_order'));
    }
    public function change2(){
        $id=$_GET['id'];
        $this->admin_model->change2($id);
        redirect(base_url('index.php/home/admin_order'));
    }
    public function change3(){
        $id=$_GET['id'];
        $this->admin_model->change3($id);
        redirect(base_url('index.php/home/admin_order'));
    }
}
