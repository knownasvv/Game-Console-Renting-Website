<?php 

defined('BASEPATH') OR exit('No direct script access allowed !');

class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_order(){
        $query = $this->db->query("SELECT * FROM orders");
        return $query->result_array();
    }
    function get_barang(){
        $query = $this->db->query("SELECT * FROM barang");
        return $query->result_array();
    }
    function get_detail(){
        $query = $this->db->query("SELECT * FROM detail_keranjang");
        return $query->result_array();
    }
    function get_keranjang(){
        $query = $this->db->query("SELECT * FROM keranjang");
        return $query->result_array();
    }
    function get_user(){
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
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

    public function change($id){
        $this->db->set('status_pemesanan', 3);
        $this->db->where('id_order', $id);
        $this->db->update('orders');
    }
}

