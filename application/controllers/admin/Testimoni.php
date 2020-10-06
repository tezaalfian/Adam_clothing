<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Testimoni extends C_admin {

	public function __construct() {
		parent::__construct();
		$this->table = 'testimoni';
	}

	public function index()
	{
		$data['user'] = $this->user;
		$data['testimoni'] = $this->m_testimoni->getAll();
        $this->load->view('admin/konten/testimoni',$data);
	}

	public function add()
    {
		$post = $this->input->post();
		if (count($post) > 0) {
            if (isset($_FILES['foto']['name'])) {
				// $this->m_testimoni->addslide();
				$this->m_testimoni->add();
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        		redirect('admin/testimoni');
            }else{
                $this->session->set_flashdata('error', 'Data tidak boleh kosong!');
                redirect('admin/testimoni');
            }
        }
    }

    public function edit($id)
    {
        if (!empty($_FILES["foto"]["name"])) {
            $this->m_testimoni->edit($id);
            $this->session->set_flashdata('success', 'Data berhasil dirubah!');
            redirect('admin/testimoni');
        } else {
            $this->session->set_flashdata('error', 'Data tidak boleh kosong!');
            redirect('admin/testimoni');
        }
    }

    public function delete($id)
    {
        $this->m_testimoni->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('admin/testimoni');
    }
}
