<?php

require_once 'My_model.php';

class M_produk extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'produk';
    }

    public function rules()
    {
        return [

            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'required|numeric'],
        ];
    }

    public function getAll()
    {
        $this->db->select('kategori.*, produk.*, produk.foto AS foto_produk', FALSE);
        // $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        return $this->db->get($this->table)->result_array();
    }

    public function add()
    {
        $post = $this->input->post();
        $data = [
            'id_produk' => time(),
            'kategori_id' => $post['kategori'],
            'stok' => $post['stok'],
            'foto' => $this->uploadImage(time())
        ];

        $this->db->insert($this->table,$data);
    }

    public function edit($id)
    {
        $post = $this->input->post();
        $data = [
            'kategori_id' => $post['kategori'],
            'stok' => $post['stok']
        ];

        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }

        $this->db->where(['id_produk' => $id]);
        $this->db->update($this->table,$data);
    }
}