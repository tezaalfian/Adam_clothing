<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_client.php';


class Order extends C_client {
    
    // use Twilio\Rest\Client;

    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->model('m_send');
        $this->load->model('m_payment');
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
                // if (isset($_COOKIE['kode'])) {
                // var_dump($this->keranjang);die;
                if (isset($this->keranjang)) {
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
                    setcookie('kode',$order['kode'],strtotime('+1 day',time()),'/');
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
            
            //mengolah input data pengiriman
            $post = $this->input->post();
            $this->form_validation->set_rules($this->m_send->rules());
            if ($this->form_validation->run()) {
                $order = [
                    'pemesan' => $post['penerima'],
                    'no_hp' => $post['no_hp'],
                    'status' => 2
                ];
                
                $this->m_send->add($id);
                $this->m_order->editSome($id,$order);
                setcookie('kode','',time()-3600,'/');
                redirect('order/payment/'.$id);
            }
            $data['order'] = $this->db->get_where('detail_order',['order_kode' => $id])->row_array();
            $this->load->view('client/order/send', $data);
        }
    }

    public function payment($id)
    {
        $data['order'] = $this->db->get_where('detail_order',['order_kode' => $id, 'status' => 2])->row_array();
        if (is_null($data['order'])) {
            show_404();
        }else {
            $post = $this->input->post();
            $data['total'] = $this->m_order->total($id);

            //mengirimkan bukti bayar
            if (empty($_FILES['foto']['name'])){
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak boleh kosong!</div>');
            }else{
                $this->m_payment->add($id);
                $this->m_order->editSome($id,['status' => 3]);
                redirect('home/search/'.$id);
            }

            $this->load->view('client/order/payment', $data);
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

    public function del_order($id)
	{
		$this->m_order->cancel_order($id);
		$this->session->set_flashdata('success','Pesanan anda berhasil dibatalkan!');
		redirect(base_url());
    }
    
    // public function notif()
    // {
    //     $id_akun = 'ACde4b5e8800842434dee6ce56aff09d79';
    //     $token = '40399a8d46d65d708641aba66565e82c';
    //     $twilio_number = "+16194576442";
    //     $client = new Client($id_akun, $token);
    //     $client->messages->create(
    //         // Where to send a text message (your cell phone?)
    //         '+6289631902592',
    //         array(
    //             'from' => $twilio_number,
    //             'body' => 'I sent this message in under 10 minutes!'
    //         )
    //     );
    // }
}
