<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Produk extends C_admin {

	public function __construct() {
		parent::__construct();
		$this->table = 'produk';
	}

	public function index()
	{
		$data['user'] = $this->user;
		$data['produk'] = $this->m_produk->getAll();
        $this->load->view('admin/produk/list',$data);
	}

	public function add()
	{
		$produk = $this->m_produk;
		$this->form_validation->set_rules($produk->rules());
		
		if ($this->form_validation->run()) {
			$produk->add();
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Data berhasil ditambahkan!.</div>');
		}
		$data['user'] = $this->user;
		$data['kategori'] = $this->m_kategori->getAll();
		$this->load->view('admin/produk/add',$data);
	}

	public function delete($id)
    {
		$data = $this->m_order->get_by_id($id);
		// var_dump($data);die;

        if ($data) {
            $this->session->set_flashdata('error', 'Tidak bisa dihapus!');
        }else {
            $this->m_produk->delete($id);
            $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('admin/produk');
	}

	public function edit($id)
	{
		$produk = $this->m_produk;
		$this->form_validation->set_rules($produk->rules());
		
		if ($this->form_validation->run()) {
			$produk->edit($id);
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			Data berhasil dirubah!.</div>');
		}

		$data['produk'] = $this->m_produk->get_by_id($id);
		$data['kategori'] = $this->m_kategori->getAll();
		$data['user'] = $this->user;
		$this->load->view('admin/produk/edit',$data);
	}
}
