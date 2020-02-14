<?php
require_once 'My_model.php';

class M_payment extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'payment';
    }

    public function add($kode)
    {
        $id = time();
        $post = $this->input->post();
        $data = [
            'id_payment' => $id,
            'order_kode' => $kode,
            'bukti_payment' => $this->uploadImage($id),
            'tgl_pembayaran' => date('Y-m-d')
        ];
        $this->db->insert($this->table,$data);
    }
}