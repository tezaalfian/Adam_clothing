<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index()
    {
        $auth = $this->m_auth;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules());

        if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];
            $user = $this->db->get_where('users',['id_users'=>$id])->row_array();

            if ($key === md5($user['username']) ) {
                $_SESSION['id'] = $_COOKIE['id'];
                $_SESSION['login'] = true;
            }
        }
        if(isset($_SESSION['login'])){
            redirect(base_url('admin'));
        }

        if ($validation->run()) {
            // var_dump($this->input->post('remember'));die;
            $this->_login();
        }

		$this->load->view('auth/login');
    }

    private function _login()
	{
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');
		$user = $this->m_auth->get_by_username();

		if ($user) {
				if (md5($password) == $user['password']) {
                    $this->db->update('users',['is_online' => 1], ['id_users' => $user['id_users']]);
                    if (isset($remember)) {
                        setcookie('id',$user['id_users'],time()+604800);
                        setcookie('key',md5($user['username']),time()+604800);
                    }else{
						setcookie('id',$user['id_users'],time()+180);
                        setcookie('key',md5($user['username']),time()+180);
                    }
                    redirect('admin');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
            		redirect('login');
				}
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak terdaftar!</div>');
            redirect('login');
		}
	}

    public function out()
    {
        $user = $this->db->get_where('users',['id_users'=>$_COOKIE['id']])->row_array();
        $this->db->update('users',['is_online' => 0], ['id_users' => $user['id_users']]);
        $this->session->unset_userdata('login');
        setcookie('id','',time()-3600);
        setcookie('key','',time()-3600);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect(base_url('login'));
    }
}
