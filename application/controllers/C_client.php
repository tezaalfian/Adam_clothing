<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_client extends CI_Controller {

    protected $keranjang;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        date_default_timezone_set('Asia/Jakarta');
    }
}
