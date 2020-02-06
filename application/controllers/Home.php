<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_kategori');
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
		$data['kategori'] = $this->m_kategori->getAll();
		$this->load->view('client/home', $data);
	}
}
