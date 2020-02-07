<?php

require_once 'My_model.php';

class M_order extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'detail_order';
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

    public function editSome($id,$data)
    {
        $this->db->where(["order_kode" => $id]);
        $this->db->update($this->table,$data);
    }

}