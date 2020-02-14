<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    
    private $key = 'bd5da8e467e0cfecb6aba29ad79ff588';
    private $curl;

    public function __construct() {
		parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->model('m_cart');
    }

    public function getKategori()
    {
        echo json_encode($this->m_kategori->getAll());
    }

    public function addOrder()
    {
        $result;
        $data = [
            'id_order' => time(),
            'produk_id' => $this->input->post('produk_id'),
            'ukuran' => $this->input->post('ukuran'),
            'jumlah' => $this->input->post('jumlah')
        ];
        if (isset($_COOKIE['kode'])) {
            $data['kode'] = $_COOKIE['kode'];
        }else{
            $data['kode'] = uniqid();
            setcookie('kode',uniqid(),time()+86.400);
        }
        $this->db->insert('order',$data);
        $result = ['message' => 'Berhasil dimasukan ke keranjang!'];
        echo json_encode($result);
    }

    public function getOrder()
    {
        $id = $this->input->post('id');
        $this->db->join('produk','produk.id_produk = order.produk_id');
        echo json_encode($this->db->get_where('order',['id_order' => $id])->row_array());
    }

    private function set_curl(){
        $this->curl = curl_init();
        curl_setopt_array($this->curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array("key: ".$this->key),
        ));
    }

    public function all_prov()
    {
        $this->set_curl();
        curl_setopt_array($this->curl, [CURLOPT_URL => "https://api.rajaongkir.com/starter/province"]);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);

        curl_close($this->curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    

    public function kota_by_id()
    {
        $id = $this->input->post('id');
        $this->set_curl();
        curl_setopt_array($this->curl, [CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id]);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);

        curl_close($this->curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    public function ongkir()
    {
        $kota = $this->input->post('kota');
        $berat = $this->input->post('berat');
        // $kurir = $this->input->post('kurir');
        $this->set_curl();
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=431&destination=".$kota."&weight=".$berat."&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: ".$this->key
            ),
        ));
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);

        curl_close($this->curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

}
