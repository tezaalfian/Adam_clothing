<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->model('m_cart');
    }

    public function getKategori()
    {
        echo json_encode($this->m_kategori->getAll());
    }

    public function addOrder()
    {
        $result;
        $data = [
            'id_order' => time(),
            'produk_id' => $this->input->post('produk_id'),
            'ukuran' => $this->input->post('ukuran'),
            'jumlah' => $this->input->post('jumlah')
        ];
        if (isset($_COOKIE['kode'])) {
            $data['kode'] = $_COOKIE['kode'];
        }else{
            $data['kode'] = uniqid();
            setcookie('kode',uniqid(),time()+86.400);
        }
        $this->db->insert('order',$data);
        $result = ['message' => 'Berhasil dimasukan ke keranjang!'];
        echo json_encode($result);
    }

    public function getOrder()
    {
        $id = $this->input->post('id');
        $this->db->join('produk','produk.id_produk = order.produk_id');
        echo json_encode($this->db->get_where('order',['id_order' => $id])->row_array());
    }
}
