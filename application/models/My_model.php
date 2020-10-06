<?php

class My_model extends CI_Model {

    protected $table;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function select_all($table,$id)
    {
        return $this->db->get_where($table,['id'.$table =>$id])->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table,["id_$this->table" => $id])->row_array();
    }

    public function getWhere($index, $id)
    {
        return $this->db->get_where($this->table,[$index => $id])->result_array();
    }

    public function addSome($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function editSome($id,$data)
    {
        $this->db->where(["id_$this->table" => $id]);
        $this->db->update($this->table,$data);
    }

    public function delete($id)
    {
        $this->deleteImage($id);
        $this->db->where(["id_$this->table" => $id]);
        $this->db->delete($this->table);
    }

    protected function uploadImage($name)
    {
        $config['upload_path']          = './upload/'.$this->table.'/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $name;
        $config['overwrite']            = true;
        $config['max_size']             = 10120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload/'.$this->table.'/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            // $config['quality']= '30%';
            $config['height']           = 400;
            $config['master_dim']       = 'height';
            // $config['width']     = 500;
            $config['new_image']= './upload/'.$this->table.'/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $this->upload->data("file_name");
            if ( ! $this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        }
        return "default.jpg";
    }

    protected function deleteImage($id)
    {
        $user = $this->get_by_id($id);
        if ($user['foto'] != "default.jpg") {
            $filename = explode(".", $user['foto'])[0];
            return array_map('unlink', glob(FCPATH."upload/$this->table/$filename.*"));
        }
    }
}