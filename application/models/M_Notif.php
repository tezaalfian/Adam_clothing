<?php

class M_Notif extends CI_Model {
    
    use Twilio\Rest\Client;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function notif()
    {
        // A Twilio number you own with SMS capabilities
        $id_akun = 'ACde4b5e8800842434dee6ce56aff09d79';
        $token = '40399a8d46d65d708641aba66565e82c';
        $twilio_number = "+16194576442";
        $client = new Client($id_akun, $token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+6289631902592',
            array(
                'from' => $twilio_number,
                'body' => 'I sent this message in under 10 minutes!'
            )
        );
    }
}