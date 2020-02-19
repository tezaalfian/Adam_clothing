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

    public function edit($id)
    {
        
    }

}