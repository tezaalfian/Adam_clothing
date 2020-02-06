<?php

require_once 'My_model.php';

class M_auth extends My_model {

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim']            
        ];
    }
    public function get_by_username()
    {
        $id = $this->input->post('username');
        return $this->db->get_where('users',['username' =>$id])->row_array();
    }

}