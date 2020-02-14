<?php

require_once 'My_model.php';

class M_kategori extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'kategori';
    }

    public function rules()
    {
        return [
            ['field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'required|numeric'],
            
            ['field' => 'berat',
            'label' => 'Berat',
            'rules' => 'required|numeric']
        ];
    }

    public function add()
    {
        $post = $this->input->post();
        $id = time();
        $data = [
            'id_kategori' => $id,
            'nama_kategori' => ucfirst($post['kategori']),
            'harga' => $post['harga'],
            'berat' => $post['berat'],
            'deskripsi' => $post['deskripsi'],
            'foto' => $this->uploadImage($id)
        ];

        $this->db->insert($this->table,$data);
    }

    public function edit($id)
    {
        $post = $this->input->post();
        $data = [
            'nama_kategori' => ucfirst($post['kategori']),
            'harga' => $post['harga'],
            'berat' => $post['berat'],
            'deskripsi' => $post['deskripsi']
        ];

        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }

        $this->db->where(['id_kategori' => $id]);
        $this->db->update($this->table,$data);
    }

}