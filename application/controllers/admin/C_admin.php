<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    
    protected $user;
    protected $table;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->model('m_order');
        if(is_null($_SESSION['login'])){
            redirect(base_url('login'));
        }
        $this->user = $this->db->get_where('users',['id_users'=>$_SESSION['id']])->row_array();
        date_default_timezone_set('Asia/Jakarta');
        $this->m_order->auto_del_cart();
        $this->m_order->auto_del_order();
    }

    // public function index()
	// {
	// 	$data['user'] = $this->user;
	// 	$data[$this->table] = $this->m_kategori->getAll();
    //     $this->load->view('admin/'.$this->table.'/list',$data);
	// }
}
