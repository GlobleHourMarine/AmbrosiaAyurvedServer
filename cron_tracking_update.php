<?php
// Set the correct path to your CodeIgniter installation
// define('BASEPATH', true);
require_once 'index.php';

// Make a direct call to your controller method
$CI =& get_instance();
$CI->load->library('curl');

$url = 'https://ambrosiaayurved.in/tracking/update_tracking_status?cron_token=2VEOVSKZ3GMUL8B6QS0T8HZ938Y9FP5P';
$response = file_get_contents($url);

file_put_contents('cron_direct.log', date('Y-m-d H:i:s') . " - Response: " . $response . "\n", FILE_APPEND);
?>