<?php
require_once 'My_model.php';

class M_send extends My_model {

    private $key = 'bd5da8e467e0cfecb6aba29ad79ff588';
    private $curl;
    public function __construct() {
        parent::__construct();
        $this->table = 'pengiriman';
    }

    public function rules()
    {
        return [
            ['field' => 'penerima',
            'label' => 'Penerima',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No HP',
            'rules' => 'required|numeric'],
            
            ['field' => 'kode_pos',
            'label' => 'Kode Pos',
            'rules' => 'required|numeric'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
        ];
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
    private function kota_detail($id, $prov)
    {
        $this->set_curl();
        curl_setopt_array($this->curl, [CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$id&province=$prov"]);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);

        curl_close($this->curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return json_decode($response);
        }
    }

    public function add($id)
    {
        $post = $this->input->post();
        $kota = $this->kota_detail($post['kota'], $post['provinsi']);
        $send = [
            'id_pengiriman' => time(),
            'order_kode' => $id,
            'provinsi' => $post['provinsi'].",".$kota->rajaongkir->results->province,
            'kota' => $post['kota'].",".$kota->rajaongkir->results->type.' '.$kota->rajaongkir->results->city_name,
            'alamat' => $post['alamat'],
            'kode_pos' => $post['kode_pos'],
            'ongkir' => $post['ongkir'],
            'kurir' => $post['kurir']
        ];        
        $this->db->insert($this->table,$send);
    }
}