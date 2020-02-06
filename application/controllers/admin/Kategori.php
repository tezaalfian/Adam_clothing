<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Kategori extends C_admin {

	public function __construct() {
		parent::__construct();
		$this->table = 'kategori';
	}

	public function index()
	{
		$data['user'] = $this->user;
		$data['kategori'] = $this->m_kategori->getAll();
        $this->load->view('admin/kategori/list',$data);
	}

	public function add()
	{
		$kategori = $this->m_kategori;
		$this->form_validation->set_rules($kategori->rules());
		
		if ($this->form_validation->run()) {
			$kategori->add();
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Data berhasil ditambahkan!.</div>');
		}
		$data['user'] = $this->user;
		$this->load->view('admin/kategori/add',$data);
	}

	public function delete($id)
    {
		$data = $this->m_produk->get_by_id($id);
		// var_dump($data);die;

        if ($data) {
            $this->session->set_flashdata('error', 'Tidak bisa dihapus!');
        }else {
            $this->m_kategori->delete($id);
            $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('admin/kategori');
	}
	
	public function edit($id)
	{
		$kategori = $this->m_kategori;
		$this->form_validation->set_rules($kategori->rules());
		
		if ($this->form_validation->run()) {
			$kategori->edit($id);
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Data berhasil dirubah!.</div>');
		}

		$data['kategori'] = $this->m_kategori->get_by_id($id);
		$data['user'] = $this->user;
		$this->load->view('admin/kategori/edit',$data);
	}
}
