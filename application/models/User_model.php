<?php 

defined('BASEPATH') OR exit('No direct script access allowed !');

class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_order($cek_id_user = null){
		if($cek_id_user == null) $query = $this->db->get('orders');
		else {
			$id_user = $_SESSION['id_user'];
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join('keranjang', 'keranjang.id_keranjang = orders.id_keranjang', 'inner');
			$this->db->where("keranjang.status_barang", "Dipesan");
			$this->db->where("keranjang.id_user", $id_user);
			$query = $this->db->get();
		}
        return $query->result_array();
    }
    function get_barang($id_barang = null){
        if($id_barang == null) $query = $this->db->get('barang');
		else $query = $this->db->get_where('barang', array('id_barang' => $id_barang));
        return $query->result_array();
    }
    function get_detail_keranjang($id_keranjang = null){
        if($id_keranjang == null) $query = $this->db->get('detail_keranjang');
		else $query = $this->db->get_where('detail_keranjang', array('id_keranjang' => $id_keranjang));
        return $query->result_array();
    }
	function add_detail_keranjang($id_keranjang, $id_barang) {
		$data = array(
			'id_keranjang' => $id_keranjang,
			'id_barang' => $id_barang,
		);
		$this->db->insert('detail_keranjang', $data);
	}
    public function delete_detail_keranjang($id,$keranjang){
        $this->db->delete('detail_keranjang', array('id_barang' => $id,'id_keranjang' => $keranjang));
    }
    function get_keranjang($id_user = null){
        if($id_user == null) {
			$this->db->select('*');
			$this->db->from('keranjang');
			$this->db->order_by('id_keranjang', 'ASC');
			$query = $this->db->get();
		}
        else {
			$this->db->select('*');
			$this->db->from('keranjang');
			$this->db->where('id_user', $id_user);
			$this->db->order_by('id_keranjang', 'ASC');
			$query = $this->db->get();
		}
        return $query->result_array();
    }
	function get_keranjang_where_status_barang_gantung($id_user = null) {
		if($id_user == null) {
			$this->db->select('*');
			$this->db->from('keranjang');
			$this->db->where('status_barang', 'Gantung');
			$this->db->order_by('id_keranjang', 'ASC');
			$query = $this->db->get();
		}
        else {
			$this->db->select('*');
			$this->db->from('keranjang');
			$this->db->where('id_user', $id_user);
			$this->db->where('status_barang', 'Gantung');
			$this->db->order_by('id_keranjang', 'ASC');
			$query = $this->db->get();
		}
        return $query->result_array();
	}
	function add_keranjang($id, $user) {
		$data = array(
			'id_user' => $user,
			'id_keranjang' => $id,
			'lama_peminjaman' => 1,
			'status_barang' => 'Gantung'
		);
		$this->db->insert('keranjang', $data);
	}
	
    function add_order($id_o, $id_k) {
		$data = array(
			'id_order' => $id_o,
			'id_keranjang' => $id_k,
			'status_pemesanan' => 1
		);
		$this->db->insert('orders', $data);
	}
    function get_user($email = null, $password = null){
		if($email == null && $password == null) $query = $this->db->get('users');
		else $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->result_array();
    }

	function minus_stok_barang($id_barang) {
		$this->db->set('stok', 'stok-1', FALSE);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang');
	}
    
    public function get_salt($email){
		$this->db->select('salt');
		$this->db->from('users');
		$this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_user($id, $email,  $pass, $nama, $alamat, $notelp){
		$data = array(
			'id_user' => $id,
			'email' => $email,
			'password' => $pass,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telpon' => $notelp,
			'salt' => 'user'
		);
		$this->db->insert('users', $data);
	}

    public function get_last_id(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function change($id){
        $this->db->set('status_pemesanan', 3);
        $this->db->where('id_order', $id);
        $this->db->update('orders');
    }

    public function change_lama($id,$lama){
        $this->db->set('lama_peminjaman', $lama);
        $this->db->set('status_barang', 'Dipesan');
        $this->db->where('id_keranjang', $id);
        $this->db->update('keranjang');
    }

}

