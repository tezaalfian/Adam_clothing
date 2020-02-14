<?php
require_once 'My_model.php';

class M_cart extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'order';
    }

    public function add()
    {
        $post = $this->input->post();
        $data = [
            'id_order' => time(),
            'nama_order' => ucfirst($post['order']),
            'harga' => $post['harga'],
            'berat' => $post['berat'],
            'deskripsi' => $post['deskripsi'],
            'foto' => $this->uploadImage(time())
        ];

        $this->db->insert($this->table,$data);
    }

    public function cekKeranjang()
    {
        $this->db->where(['order_kode'=> $_COOKIE['kode']]);
        $this->db->where(['status' => 1]);
        return $this->db->get('detail_order')->row_array();
    }

    public function cekIsi($ukuran,$produk_id)
    {
        $this->db->where(['kode'=> $_COOKIE['kode']]);
        $this->db->where(['ukuran'=> $ukuran]);
        $this->db->where(['produk_id' => $produk_id]);
        return $this->db->get('order')->row_array();
    }

    public function addJumlah($id,$data)
    {
        $this->db->where(['id_order' => $id]);
        $this->db->update('order', $data);
    }

    public function minStok($id, $stok)
    {
        $this->db->update('produk',['stok'=> $stok],['id_produk' => $id]);
    }

    public function listCart($id)
    {
        $this->db->select('*, produk.foto AS foto_produk');
        $this->db->from('produk');
        $this->db->join('order', 'produk.id_produk = order.produk_id');
        $this->db->join('detail_order', 'order.kode = detail_order.order_kode');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        $this->db->where(['kode' => $id]);
        $this->db->where(['detail_order.status' => 1]);
        return $this->db->get()->result_array();
    }
}