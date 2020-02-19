<?php

require_once 'My_model.php';

class M_konten extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'konten';
    }

    public function addslide()
    {
        $post = $this->input->post();
        $id = time();
        $data = [
            'id_konten' => $id,
            'jenis' => 'slide',
            'foto' => $this->uploadImage($id)
        ];
        $this->db->insert($this->table,$data);
    }

    public function editslide($id)
    {
        $post = $this->input->post();

        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }

        $this->db->where(['id_konten' => $id]);
        $this->db->update($this->table,$data);
    }

}