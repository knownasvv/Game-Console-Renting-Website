<?php
    defined('BASEPATH') OR exit('No direct script access allowed !');
    class Admin_model extends CI_Model{

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

        // public function login_model($email,$password)
        // {
        //     $this->load->library('session');
        //     $where = array('email_admin'=>$email, 'password'=>$password);
        //     $query = $this->db->get_where('admin', $where);
    
        //     if($query->num_rows() == 1){
        //         $row = $query->row();
        //         // $data = array(
        //         //     'user_logged_in'  =>  TRUE,
        //         //     'name' => "$row->fname_admin.' '.$row->lname_admin",
        //         //     'password' => $row->password,
        //         //     'email' => $row->email_admin);
        //         // $this->session->set_userdata($data);
        //         $this->session->set_userdata('name', $row->fname_admin.' '.$row->lname_admin);
        //         return TRUE;
        //     }else{
        //         $this->session->set_flashdata('error_msg','Data yang anda masukkan tidak valid');
        //         return FALSE;
        //     }
        // }

        // public function delete_dosen($id){
        //     $this->db->delete('dosen', array('id_dosen' => $id));
        // }
        // public function delete_mahasiswa($id){
        //     $this->db->delete('mahasiswa', array('id_mahasiswa' => $id));
        // }
        public function change1($id){
            $this->db->set('status_pemesanan', 1);
            $this->db->where('id_order', $id);
            $this->db->update('orders');
        }
        public function change2($id){
            $this->db->set('status_pemesanan', 2);
            $this->db->where('id_order', $id);
            $this->db->update('orders');
        }
        public function change3($id){
            $this->db->set('status_pemesanan', 4);
            $this->db->where('id_order', $id);
            $this->db->update('orders');
        }
    }

?>