<?php 

defined('BASEPATH') OR exit('No direct script access allowed !');

class User extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getUser($email,$password){
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND `password` = '$password' ");
        return $query->result_array();
    }  
    
    public function getSalt($email){
        $query = $this->db->query("SELECT salt FROM users WHERE email = '$email'");
        return $query->result_array();
    }

    public function insertUser($id, $email,  $pass, $nama, $alamat, $notelp){
        $query = $this->db->query("INSERT INTO users VALUES ('$id', '$email', '$pass', '$nama', '$alamat', '$notelp', 'user')");
    }

    public function getLastId(){
        $query = $this->db->query("SELECT * FROM users order by Id_user DESC limit 1");
        return $query->result_array();
    }
}

