<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking_model extends CI_Model
{

    // private $api_url = 'https://api.ship24.com/public/v1/trackers';
    // private $api_key;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // // Load API key from config OR set it directly
        // $this->api_key = $this->config->item('ship24_api_key');

        // // If the key isn't set in config.php, you can hardcode it (Not recommended for security)
        // if (!$this->api_key) {
        //     $this->api_key = "apik_0g7Ozznx0ct2owz9MiAQtbWP4TFz6M"; // Replace with your actual API key
        // }
    }

    // Function to create tracking request
    // public function create_tracking($tracking_number, $courier_code = null)
    // {
    //     $headers = [
    //         "Content-Type: application/json",
    //         "Authorization: Bearer " . $this->api_key
    //     ];

    //     $post_data = json_encode([
    //         'tracking_number' => $tracking_number,
    //         'courier_code' => $courier_code
    //     ]);

    //     $ch = curl_init($this->api_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    //     $response = curl_exec($ch);
    //     $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     if ($http_code !== 200) {
    //         log_message('error', 'Ship24 API tracking failed: ' . json_encode($response));
    //     }

    //     return json_decode($response, true);
    // }

    // Function to get tracking status
    // public function get_tracking_status($tracking_number)
    // {
    //     $url = "https://api.ship24.com/public/v1/trackers/track";  // Correct API endpoint

    //     $headers = [
    //         "Content-Type: application/json",
    //         "Authorization: Bearer " . $this->api_key
    //     ];

    //     $post_data = json_encode(["trackingNumber" => $tracking_number]);

    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    //     $response = curl_exec($ch);
    //     $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     if ($http_code !== 200) {
    //         log_message('error', "Ship24 API status fetch failed: " . $response);
    //         return ['error' => 'Failed to fetch tracking information.'];
    //     }

    //     return json_decode($response, true);
    // }

    public function save_awb_number($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function fetch_track_data($table, $order_id)
    {
        $result = $this->db->select('*')->from($table)->where('order_id', $order_id)->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function get_all_orders($table)
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function update_tracking_data($table, $data, $order_id)
    {
        $this->db->where('order_id', $order_id);
        return $this->db->update($table, $data);
    }
}
