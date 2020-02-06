<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Profil extends C_admin {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_users');
		$this->table = 'users';
    }
    
    public function index()
    {
        $users = $this->m_users;
        $data['user'] = $this->user;
		$user1 = $this->db->get_where('users', ['username' => $this->input->post('username')])->row_array();
		$user2 = $this->m_users->get_by_id($data['user']['id_users']);
		$this->form_validation->set_rules($users->rules2());
		
		if ($this->form_validation->run()) {
			if ($user1) {
				if ($user1['username'] == $user2['username']) {
					$users->edit($data['user']['id_users']);
					$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Data berhasil dirubah!.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Username sudah terdaftar!.</div>');
				}
			}else{
				$users->edit($data['user']['id_users']);
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Data berhasil dirubah!.</div>');
			}
        }
        $this->load->view('admin/profil/edit', $data);
    }

    public function ubah_sandi()
    {
        $data['user'] = $this->user;
        // var_dump(md5($this->input->post('old_password')));die;
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/profil/edit', $data);
        } else {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password1');

            if (md5($old_password) !=  $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Password lama salah!.</div>');
                redirect('admin/profil');
            }else {
                if ($old_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Kata sandi baru tidak boleh sama dengan yang lama!.</div>');
                   redirect('admin/profil');
                } else {
                    $edit = ['password' => md5($new_password)];
                    $this->m_users->editSome($data['user']['id_users'],$edit);
                    $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Kata sandi berhasil dirubah!.</div>');
                    redirect('admin/profil');
                }
            }
        }
    }
}