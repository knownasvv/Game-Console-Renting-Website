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
    function get_barang($id_barang = null){
        if($id_barang == null) $query = $this->db->query("SELECT * FROM barang");
		else $query = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
        return $query->result_array();
    }
    function get_detail_keranjang($id_keranjang = null){
        if($id_keranjang == null) $query = $this->db->query("SELECT * FROM detail_keranjang");
		else $query = $this->db->query("SELECT * FROM detail_keranjang WHERE id_keranjang = '$id_keranjang'");
        return $query->result_array();
    }
	function add_detail_keranjang($id_keranjang, $id_barang) {
		$this->db->query("INSERT INTO detail_keranjang VALUES('$id_keranjang', '$id_barang')");
	}
    function get_keranjang($id_user = null){
        if($id_user == null) $query = $this->db->query("SELECT * FROM keranjang ORDER BY id_keranjang ASC");
        else $query = $this->db->query("SELECT * FROM keranjang WHERE id_user = '$id_user' ORDER BY id_keranjang ASC");

        return $query->result_array();
    }
	function add_keranjang($id, $user) {
		$query = $this->db->query("INSERT INTO keranjang VALUES('$user', '$id', 1, 'Dipesan')");
	}
    function get_user(){
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }

	function minus_stok_barang($id) {
		$query = $this->db->query("UPDATE barang SET stok = stok-1 WHERE id_barang = '$id'");
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

