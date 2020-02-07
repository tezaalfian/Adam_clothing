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
                        redirect('order/tipe/'.$id);
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
                    redirect('order/tipe/'.$id);
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
        $data['keranjang'] = $this->m_cart->listCart($id);
        if (count($data['keranjang']) < 1) {
            $data['keranjang'] = NULL;
        }
        $this->load->view('client/order/cart', $data);
    }

    public function send($id)
    {
        $data['keranjang'] = $this->m_cart->listCart($id);
        if (count($data['keranjang']) < 1) {
            show_404();
        }else {
            $berat=0;$subtotal=0;$total=0;$diskon=0;

            foreach ($data['keranjang'] as $key) {
                $kat = $this->m_produk->get_by_id($key['produk_id']);
                $produk = $this->m_produk->getId($key['kategori_id']);

                $berat += (int)$key['jumlah'] * $produk['berat'];
                $subtotal += (int)$key['jumlah'] * $produk['harga'];
                //atur format diskon
                $diskon += 0;
                $total = $subtotal - $diskon;
            }
            
            $new = [
                'berat' => $berat,
                'tgl_pemesanan' => date('Y-m-d'),
                'total_tagihan' => $subtotal,
                'diskon' => $diskon,
                'total_akhir' => $total
            ];
            $this->m_order->editSome($id,$new);
            $data['order'] = $this->db->get_where('detail_order',['order_kode' => $id])->row_array();

            $this->load->view('client/order/send', $data);
        }
    }

    public function deleteCart($id)
    {
        $cart = $this->keranjang;
        $order = $this->m_cart->get_by_id($id);
        $produk = $this->m_produk->get_by_id($order['produk_id']);

        $this->m_produk->editSome($order['produk_id'],['stok' => (int)$produk['stok'] + $order['jumlah'] ]);
        $this->db->delete('order',['id_order' => $id]);
        if (count($cart) <= 1) {
            setcookie('kode','',time()-3600,'/');
            $this->db->delete('detail_order',['order_kode' => $order['kode']]);
        }

        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('order/cart/'.$order['kode']);
    }

    public function editCart($id)
    {
        $post = $this->input->post();
        $cart = $this->keranjang;
        $order = $this->m_cart->get_by_id($id);
        $produk = $this->m_produk->get_by_id($order['produk_id']);

        $stok = (int)$produk['stok'] + $order['jumlah'];
        if ($stok >= (int)$post['jumlah']) {
            $data = [
                'jumlah' => $post['jumlah'],
                'ukuran' => $post['ukuran']
            ];
            $this->m_cart->editSome($id,$data);
            $order = $this->m_cart->get_by_id($id);
            $this->m_produk->editSome($order['produk_id'],['stok' => $stok - (int)$order['jumlah']]);
            $this->session->set_flashdata('success', 'Data berhasil dirubah!');
            redirect('order/cart/'.$order['kode']);
        }else{
            $this->session->set_flashdata('error', 'Stok tidak tersedia!');
            redirect('order/cart/'.$order['kode']);
        }
    }
}
