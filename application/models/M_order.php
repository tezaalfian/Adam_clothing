<?php

require_once 'My_model.php';

class M_order extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'order';
    }

    public function rules()
    {
        return [
            ['field' => 'order',
            'label' => 'order',
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

    public function edit($id)
    {
        $post = $this->input->post();
        $data = [
            'nama_order' => ucfirst($post['order']),
            'harga' => $post['harga'],
            'berat' => $post['berat'],
            'deskripsi' => $post['deskripsi']
        ];

        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }

        $this->db->where(['id_order' => $id]);
        $this->db->update($this->table,$data);
    }

}