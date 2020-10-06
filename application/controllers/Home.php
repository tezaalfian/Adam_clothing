<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_client.php';

class Home extends C_client {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_konten');
		$this->load->model('m_testimoni');
	}

	public function index()
	{
		$data['show'] = false;
		if (isset($_GET['fil'])) {
			if ($_GET['fil'] == 1) {
				$data['show'] = true;
			}else{
				$data['show'] = false;
			}
		}
		// var_dump($_COOKIE);die;
		$data['slide'] = $this->m_konten->getWhere('jenis','slide');
		$data['medsos'] = $this->m_konten->getWhere('jenis','medsos');
		$data['kategori'] = $this->m_kategori->getAll();
		$data['testimoni'] = $this->m_testimoni->getAll();
		$this->load->view('client/example', $data);
	}

	public function kategoriDetail($id)
	{
		$data = $this->db->get_where('kategori',['id_kategori' => $id])->row_array();
		echo json_encode($data);
	}

	public function order($id)
	{
		$produk = $this->db->get_where('kategori',['id_kategori' => $id])->row();
		$text = "Permisi gan, minta info lengkapnya untuk $produk->nama_kategori";
		redirect("https://api.whatsapp.com/send?phone=6285703038309&text=$text");
	}
}
