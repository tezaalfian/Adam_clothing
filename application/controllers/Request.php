<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
    }

    public function getKategori()
    {
        echo json_encode($this->m_kategori->getAll());
    }

    public function addOrder()
    {
        $result;
        if (count($_POST) != 0 ) {
            $data = [
                'id_order' => time(),
                'id_produk' => $_POST['id_produk'],
                'ukuran' => $_POST['ukuran'],
                'jumlah' => $_POST['jumlah']
            ];
            if (isset($_COOKIE['kode'])) {
                $data['kode'] = $_COOKIE['kode'];
            }else{
                $data['kode'] = uniqid();
            }
            $this->db->insert('order',$data);
            $result = ['message' => 'Berhasil dimasukan ke keranjang!'];
            echo json_encode($result);
        }else{
            $result = ['message' => 'Request gagal!'];
            echo json_encode($result);
        }
    }
}
