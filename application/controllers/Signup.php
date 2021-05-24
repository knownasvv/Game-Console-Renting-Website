<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller{
    public function __construct() {
		parent::__construct();
        $this->load->model("user_model");
    }

    public function index(){
        $data['title'] = "Sign Up";
		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $data['loginStyle'] = $this->load->view('include/loginStyle',NULL,TRUE);
        $data['loginScript'] = $this->load->view('include/loginScript',NULL,TRUE);
		
        $this->load->view('pages/signup', $data);
    }

    public function validate(){
        if(isset($_POST['submit'])){
            $data['title'] = "Sign Up";
    
            $title['title'] = $data['title'];
    
            $data['style'] = $this->load->view('include/style', NULL, TRUE);
            $data['script'] = $this->load->view('include/script', NULL, TRUE);
            $data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
            $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
            $data['loginStyle'] = $this->load->view('include/loginStyle',NULL,TRUE);
            $data['loginScript'] = $this->load->view('include/loginScript',NULL,TRUE);
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('notelp', 'notelp', 'required|integer|min_length[11]');
            
            if($this->form_validation->run() == false){
                $this->load->view('pages/signup',$data);
            }else{
                $lastId = $this->user_model->get_last_id();
                $lastId = $lastId[0]['id_user'];
                $this->user_model->add_user($lastId+1, $_POST['email'], md5($_POST['password']."user"), $_POST['nama'], $_POST['alamat'], $_POST['notelp']);
                redirect(base_url('index.php/login'));
            }
        }
    }


}

