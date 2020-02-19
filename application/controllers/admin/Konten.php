<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Konten extends C_admin {

	public function __construct() {
		parent::__construct();
        $this->table = 'konten';
        $this->load->model('m_konten');
    }

    public function slide()
    {  
        $post = $this->input->post();
        // var_dump($post);die;
        if (count($post) > 0) {
            if (isset($_FILES['foto']['name'])) {
                $this->m_konten->addslide();
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('admin/konten/slide');
            }else{
                $this->session->set_flashdata('error', 'Data tidak boleh kosong!');
                redirect('admin/konten/slide');
            }
        }
        $data['user'] = $this->user;
        $data['slide'] = $this->m_konten->getWhere('jenis','slide');
        $this->load->view('admin/konten/slide', $data);
    }

    public function deleteSlide($id)
    {
        $this->m_konten->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('admin/konten/slide');
    }

    public function editslide($id)
    {
        if (!empty($_FILES["foto"]["name"])) {
            $this->m_konten->editslide($id);
            $this->session->set_flashdata('success', 'Data berhasil dirubah!');
            redirect('admin/konten/slide');
        } else {
            $this->session->set_flashdata('error', 'Data tidak boleh kosong!');
            redirect('admin/konten/slide');
        }
    }

    public function medsos()
    {
        $post = $this->input->post();
        // var_dump($post);die;
        if (count($post) > 0) {
            $input = [
                'id_konten' => time(),
                'nama_konten' => $post['nama_konten'],
                'link' => $post['link'],
                'icon' => $post['icon'],
                'jenis' => 'medsos'
            ];
            $this->db->insert('konten', $input);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('admin/konten/medsos');
        }
        $data['user'] = $this->user;
        $data['medsos'] = $this->m_konten->getWhere('jenis','medsos');
        $this->load->view('admin/konten/medsos', $data);
    }

    public function editmedsos($id)
    {
        $post = $this->input->post();
        $input = [
            'nama_konten' => $post['nama_konten'],
            'link' => $post['link'],
            'icon' => $post['icon']
        ];
        $this->m_konten->editSome($id, $input);
        $this->session->set_flashdata('success', 'Data berhasil dirubah!');
        redirect('admin/konten/medsos');
    }

    public function deletemedsos($id)
    {
        $this->m_konten->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('admin/konten/medsos');
    }
}