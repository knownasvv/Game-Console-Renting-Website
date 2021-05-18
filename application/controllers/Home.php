<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);

		$this->load->view('pages/home', $data);
	}

	public function admin_barang(){
        $this->load->library('grocery_CRUD');
        $crud=new grocery_CRUD();
        $crud->set_table('barang')
            ->columns('nama','harga','deskripsi','gambar')
            //->set_relation('Rating','rating','code')
            ->fields('nama','harga','deskripsi','gambar')
            //->set_field_upload('Gambar','assets/uploads/gambar')
            ->callback_edit_field('deskripsi',array($this,'edit_description'))
            ->callback_add_field('deskripsi',array($this,'add_description'));
        
        $output= $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/style',$data,TRUE);
        $data['script'] = $this->load->view('include/script',$data,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        //$data['footer'] = $this->load->view('template/footer',NULL,TRUE);
    
        $this->load->view('pages/admin.php',$data);
    }
    function edit_description($value,$primary_key){
        return "<textarea name='deskripsi'> $value </textarea>";
    }
    function add_description(){
        return "<textarea name='deskripsi'> </textarea> ";
    }

}
