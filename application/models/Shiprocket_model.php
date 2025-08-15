<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shiprocket_model extends CI_Model {

    private $email = "your_shiprocket_email";
    private $password = "your_shiprocket_password";
    private $token;

    public function __construct() {
        parent::__construct();
        $this->token = $this->get_token();
    }

    private function get_token() {
        if ($this->session->userdata('shiprocket_token')) {
            return $this->session->userdata('shiprocket_token');
        }

        $data = json_encode([
            'email' => $this->email,
            'password' => $this->password
        ]);

        $ch = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response, true);
        if (!empty($res['token'])) {
            $this->session->set_userdata('shiprocket_token', $res['token']);
            return $res['token'];
        } else {
            log_message('error', 'Shiprocket token error: ' . $response);
            return null;
        }
    }

    public function create_order($orderData) {
        $url = "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc";

        $response = $this->make_request($url, $orderData);
        return $response;
    }

    public function track_order($awb_code) {
        $url = "https://apiv2.shiprocket.in/v1/external/courier/track/awb/$awb_code";
        $response = $this->make_request($url, [], 'GET');
        return $response;
    }

    public function cancel_order($order_id) {
        $url = "https://apiv2.shiprocket.in/v1/external/orders/cancel";
        $response = $this->make_request($url, ['ids' => [$order_id]]);
        return $response;
    }

    private function make_request($url, $data = [], $method = 'POST') {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$this->token}"
        ]);

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}
?>