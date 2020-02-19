<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'C_admin.php';

class Konten extends C_admin {

	public function __construct() {
		parent::__construct();
		$this->table = 'konten';
    }

    public function slide()
    {
        $data['user'] = $this->user;
        $this->load->view('admin/konten/slide', $data);
    }

    public function medsos()
    {
        $data['user'] = $this->user;
        $this->load->view('admin/konten/medsos', $data);
    }
}