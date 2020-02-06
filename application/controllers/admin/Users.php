<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Users extends C_admin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_users');
		$this->table = 'users';
		if ($this->user['role_id'] != 2) {
			show_404();
		}
    }
    
    public function index()
	{
		$data['user'] = $this->user;
		$data['users'] = $this->m_users->getAll();
        $this->load->view('admin/users/list',$data);
    }
    
    public function add()
	{
        $users = $this->m_users;
        // $this->form_validation->set_rules('username','username','required|trim|alpha_dash|is_unique[users.username');
		$this->form_validation->set_rules($users->rules());
		
		if ($this->form_validation->run()) {
			$users->add();
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Data berhasil ditambahkan!.</div>');
		}
		$data['user'] = $this->user;
		$data['kategori'] = $this->m_kategori->getAll();
		$this->load->view('admin/users/add',$data);
    }
    
    public function delete($id)
    {
		$data = $this->m_order->get_by_id($id);
		// var_dump($data);die;

        if ($data) {
            $this->session->set_flashdata('error', 'Tidak bisa dihapus!');
        }else {
            $this->m_users->delete($id);
            $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('admin/users');
    }
    
    public function edit($id)
	{
		$users = $this->m_users;
		$user1 = $this->db->get_where('users', ['username' => $this->input->post('username')])->row_array();
		$user2 = $this->m_users->get_by_id($id);
		$this->form_validation->set_rules($users->rules2());
		
		if ($this->form_validation->run()) {
			if ($user1) {
				if ($user1['username'] == $user2['username']) {
					$users->edit($id);
					$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Data berhasil dirubah!.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Username sudah terdaftar!.</div>');
				}
			}else{
				$users->edit($id);
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Data berhasil dirubah!.</div>');
			}
		}

		$data['users'] = $this->m_users->get_by_id($id);
		$data['user'] = $this->user;
		$this->load->view('admin/users/edit',$data);
	}

	public function reset($id)
	{
		$users = $this->m_users;
		$post = $this->input->post();
		$this->form_validation->set_rules($users->rules3());
		$data['users'] = $this->m_users->get_by_id($id);
		
		if ($this->form_validation->run()) {
			if ($data['users']['password'] == md5($post['password1'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Password sama seperti sebelumnya!.</div>');
			}else {
				$edit = ['password' => md5($post['password1'])];
				$this->m_users->editSome($id,$edit);
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Data berhasil dirubah!.</div>');
			}
		}

		$data['user'] = $this->user;
		$this->load->view('admin/users/reset',$data);
	}
}