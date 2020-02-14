<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_client extends CI_Controller {

    protected $keranjang;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_cart');
        $this->load->model('m_order');
        $this->load->library('form_validation');
        if (isset($_COOKIE['kode'])) {
            $this->keranjang = $this->m_cart->listCart($_COOKIE['kode']);
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->m_order->auto_del_cart();
        $this->m_order->auto_del_order();
    }
}
