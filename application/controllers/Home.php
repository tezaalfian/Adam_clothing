<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_client.php';

class Home extends C_client {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->model('m_order');
	}

	public function index()
	{
		// var_dump($this->m_order->ex_payment());die;
		$data['show'] = false;
		if (isset($_GET['fil'])) {
			if ($_GET['fil'] == 1) {
				$data['show'] = true;
			}else{
				$data['show'] = false;
			}
		}
		$data['keranjang'] = $this->keranjang;
		// var_dump($_COOKIE);die;
		$data['kategori'] = $this->m_kategori->getAll();
		$this->load->view('client/home', $data);
	}

	public function search($id="")
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		if ($this->form_validation->run()) {
			$id = $this->input->post('kode');
			redirect('home/search/'.$id);
		}
		$order = $this->db->get_where('detail_order',['order_kode' => $id])->row_array();
		if (isset($order)) {
			if ($order['status'] == 1) {
				// halaman pesanan tidak ditemukan
				// redirect('order/cart/'.$id);
				$data['key'] = $id;
				$this->load->view('client/cari/empty', $data);
			}else{
				if ($order['status'] == 2) {
					$data['order'] = $this->m_order->detail1($id);
				}
				else{
					$data['order'] = $this->m_order->detail2($id);
				}
				$this->load->view('client/cari/detail', $data);
			}

		}else{
			$data['key'] = $id;
			$this->load->view('client/cari/empty', $data);
		}
	}
}
