<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracktry {
    private $ci;
    private $api_key;
    private $base_url = "https://api.tracktry.com/v1";

    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->config('tracktry'); // Load the config file
        $this->api_key = $this->ci->config->item('tracktry_api_key');
    }

    // Function to add a tracking number
    public function addTracking($tracking_number, $carrier_code) {
        $url = $this->base_url . "/trackings/post";
        $data = [
            'tracking_number' => $tracking_number,
            'carrier_code' => $carrier_code
        ];
        return $this->sendRequest($url, $data);
    }

    // Function to get tracking information
    public function getTracking($tracking_number, $carrier_code) {
        $url = $this->base_url . "/trackings/$carrier_code/$tracking_number";
        return $this->sendRequest($url, [], "GET");
    }

    // Function to send API requests
    private function sendRequest($url, $data = [], $method = "POST") {
        $headers = [
            "Content-Type: application/json",
            "Tracktry-Api-Key: " . $this->api_key
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if ($method === "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }
}
?>