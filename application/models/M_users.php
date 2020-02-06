<?php

require_once 'My_model.php';

class M_users extends My_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|alpha_dash|is_unique[users.username]'],

            ['field' => 'password1',
            'label' => 'Password',
            'rules' => 'required|trim|matches[password2]'],

            ['field' => 'password2',
            'label' => 'Confirm Password',
            'rules' => 'required|trim|matches[password1]']
        ];
    }

    public function rules2()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|alpha_dash']
        ];
    }

    public function rules3()
    {
        return [

            ['field' => 'password1',
            'label' => 'Password',
            'rules' => 'required|trim|matches[password2]'],

            ['field' => 'password2',
            'label' => 'Confirm Password',
            'rules' => 'required|trim|matches[password1]']
        ];
    }

    public function add()
    {
        $post = $this->input->post();
        $data = [
            'id_users' => time(),
            'username' => $post['username'],
            'password' => md5($post['password1']),
            'foto' => $this->uploadImage(time()),
            'role_id' => $post['role_id']
        ];

        $this->db->insert($this->table,$data);
    }

    public function edit($id)
    {
        $post = $this->input->post();
        $data = [
            'username' => $post['username'],
            'role_id' => $post['role_id']
        ];
        if (!empty($_FILES["foto"]["name"])) {
            $data['foto'] = $this->uploadImage($id);
        } else {
            $data['foto'] = $post["old_foto"];
        }

        $this->db->where(['id_users' => $id]);
        $this->db->update($this->table,$data);
    }
}