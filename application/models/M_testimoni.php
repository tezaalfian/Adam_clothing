<?php

require_once 'My_model.php';

class M_testimoni extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'testimoni';
    }

    public function getId($id)
    {
        $this->db->select('kategori.*, produk.*, produk.foto AS foto_produk', FALSE);
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        $this->db->where(['kategori_id' => $id]);
        return $this->db->get($this->table)->row_array();
    }

    public function getAll()
    {
        // $this->db->select('kategori.*, produk.*, produk.foto AS foto_produk', FALSE);
        // // $this->db->from('produk');
        // $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        // $this->db->order_by('kategori_id');
        return $this->db->get($this->table)->result_array();
    }

    public function add()
    {
        $post = $this->input->post();
        $id = time();
        $data = [
            'id_testimoni' => $id,
            'foto' => $this->uploadImage($id)
        ];
        $this->db->insert($this->table,$data);
    }

    public function edit($id)
    {
        $post = $this->input->post();

        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }
        $this->db->where(['id_testimoni' => $id]);
        $this->db->update($this->table,$data);
    }
}