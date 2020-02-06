<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
    }
    
    public function tipe($id)
    {
        $data['allKategori'] = $this->m_kategori->getAll();
        $data['kategori'] = $this->m_kategori->get_by_id($id);
        $data['produk'] = $this->m_produk->getWhere('kategori_id',$id);
        $this->load->view('client/order/tipe', $data);
    }
}
