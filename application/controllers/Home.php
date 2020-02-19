<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_client.php';

class Home extends C_client {

	public function __construct() {
		parent::__construct();
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
		$data['kategori'] = $this->m_kategori->getAll();
		$data['produk'] = $this->m_produk->getAll();
		$this->load->view('client/example', $data);
	}

}
