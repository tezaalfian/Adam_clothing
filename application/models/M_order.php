<?php

require_once 'My_model.php';

class M_order extends My_model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'detail_order';
    }

    public function editSome($id,$data)
    {
        $this->db->where(["order_kode" => $id]);
        $this->db->update($this->table,$data);
    }

    public function total($id)
    {
        $this->db->select('pengiriman.ongkir, detail_order.*');
        $this->db->from('detail_order');
        $this->db->join('pengiriman','pengiriman.order_kode = detail_order.order_kode');
        $this->db->where('detail_order.order_kode',$id);
        return $this->db->get()->row_array();
    }

    private function detail(){
        $this->db->select('*, produk.foto AS foto_produk');
        $this->db->from('produk');
        $this->db->join('order', 'produk.id_produk = order.produk_id');
        $this->db->join('detail_order', 'order.kode = detail_order.order_kode');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        $this->db->join('status', 'detail_order.status = status.id_status');
    }

    public function detail1($id)
    {
        $this->detail();
        $this->db->join('pengiriman', 'order.kode = pengiriman.order_kode');
        $this->db->where(['kode' => $id]);
        $this->db->where_not_in(['detail_order.status' => 1]);
        return $this->db->get()->result_array();
    }

    public function detail2($id)
    {
        $this->detail();
        $this->db->join('pengiriman', 'order.kode = pengiriman.order_kode');
        $this->db->join('payment', 'order.kode = payment.order_kode');
        $this->db->where(['kode' => $id]);
        $this->db->where_not_in(['detail_order.status' => 1]);
        return $this->db->get()->result_array();
    }

    private function ex_cart()
    {
        $this->db->where(['status' => 1]);
        $this->db->where('id_detail <',strtotime('-1 day', time()));
        return $this->db->get('detail_order')->result_array();
    }

    public function auto_del_cart()
    {
        $order = $this->ex_cart();
        if (count($order) > 0) {
            foreach ($order as $key ) {
                $this->db->delete('order',['kode' => $key['order_kode']]);
                $this->db->delete('detail_order',['order_kode' => $key['order_kode']]);
            }
        }
    }

    private function ex_order()
    {
        $this->db->join('pengiriman', 'detail_order.order_kode = pengiriman.order_kode');
        $this->db->where(['status' => 2]);
        $this->db->where('pengiriman.id_pengiriman <',strtotime('-1 day', time()));
        return $this->db->get('detail_order')->result_array();
    }

    public function auto_del_order(){
        $order = $this->ex_order();
        if (count($order) > 0) {
            foreach ($order as $key ) {
                $this->db->delete('order',['kode' => $key['order_kode']]);
                $this->db->delete('detail_order',['order_kode' => $key['order_kode']]);
                $this->db->delete('pengiriman',['order_kode' => $key['order_kode']]);
            }
        }
    }
}