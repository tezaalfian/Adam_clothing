<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_client.php';

class Order extends C_client {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
    }
    
    public function tipe($id)
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $post = $this->input->post();

        if ($this->form_validation->run()) {
            $produk = $this->m_produk->get_by_id($post['produk_id']);
            $order = [
                'id_order' => time(),
                'produk_id' => $post['produk_id'],
                'jumlah' => $post['jumlah'],
                'ukuran' => $post['ukuran']
            ];

            if ((int)$produk['stok'] < 1) {
                $this->session->set_flashdata('error', 'Stok barang habis!');
            }else{
                if (isset($_COOKIE['kode'])) {
                    $cart = $this->m_cart->cekKeranjang();
                    if (isset($cart)) {
                        $cekisi = $this->m_cart->cekIsi($post['ukuran'],$post['produk_id']);
                        // var_dump($cekisi);die;
                        if (isset($cekisi)) {
                            $this->m_cart->addJumlah($cekisi['id_order'],['jumlah' => (int)$cekisi['jumlah']+(int)$post['jumlah']]);
                        }else{
                            $order['kode'] = $_COOKIE['kode'];
                            $this->db->insert('order', $order);
                        }
                        $this->m_cart->minStok($post['produk_id'],(int)$produk['stok']-(int)$post['jumlah']);
                        $this->session->set_flashdata('success', 'Berhasil ditambahkan ke keranjang!');
                    }
                }else{
                    $order['kode'] = uniqid();
                    $detail = [
                        'id_detail' => time(),
                        'order_kode' => $order['kode'],
                        'status' => 1
                    ];
                    //tambah keranjang baru di detail order dan data produk di tabel order
                    $this->db->insert('order', $order);
                    $this->db->insert('detail_order', $detail);
                    $this->m_cart->minStok($post['produk_id'],(int)$produk['stok']-(int)$post['jumlah']);
                    setcookie('kode',$order['kode'],time()+86400,'/');
                    $this->session->set_flashdata('success', 'Berhasil ditambahkan ke keranjang!');
                }
            }
        }
        $data['keranjang'] = $this->keranjang;
        $data['allKategori'] = $this->m_kategori->getAll();
        $data['kategori'] = $this->m_kategori->get_by_id($id);
        $data['produk'] = $this->m_produk->getWhere('kategori_id',$id);
        $this->load->view('client/order/tipe', $data);
    }

    public function cart($id)
    {
        $data['keranjang'] = $this->keranjang;
        $this->load->view('client/order/cart', $data);
    }

    public function deleteCart($id)
    {
        # code...
    }

    public function editCart($id)
    {
        # code...
    }
}
