<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
		parent::__construct();
        $this->load->model('user_model');
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
    }

    public function index(){
        $data['title'] = "Home";

		$title['title'] = $data['title'];

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', $title, TRUE);
		$data['footer'] = $this->load->view('template/footer', NULL, TRUE);
		
        $this->load->view('pages/login', $data);
    }

    public function validate(){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $salt = $this->user_model->getSalt($email);
            //cek User
            if(count($salt) != 0){
                $salt = $salt[0]['salt'];
                $password = md5($password.$salt);
                $cekUser = $this->user_model->getUser($email,$password);
                if($cekUser){
                    if($salt == "user"){
                        $_SESSION['name'] = $cekUser[0]['nama'];
                        $_SESSION['salt'] = "user";
                        redirect(base_url());
                    }
                    else if($salt == "admin"){
                        $_SESSION['name'] = $cekUser[0]['nama'];
                        $_SESSION['salt'] = "admin";
                        redirect(base_url('index.php/admin/admin_barang'));
                    }
                } 
                else{
                    redirect(base_url('index.php/login?login=false'));
                } 
            }else{ 
                redirect(base_url('index.php/login?login=false'));
            }
            //selesai cek User
            
        }
        
    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}
?>

