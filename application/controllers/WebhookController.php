<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . '../vendor/autoload.php');

use PhonePe\payments\v2\standardCheckout\StandardCheckoutClient;
use PhonePe\common\exceptions\PhonePeException;

class WebhookController extends CI_Controller {

    public function callback()
    {
        // Normalize headers to lowercase keys
        $headers = getallheaders();
        $requestBody = file_get_contents("php://input");

        // Your username and password for callback verification
        $username = "ambrosiaayurved";
        $password = "Ambrosia123";

        // Initialize PhonePe Client
        $clientId = "SU2506031142531039239175"; // Replace with your Client ID
        $clientVersion = 1; // Replace with your Client Version
        $clientSecret = "0f0dbd9d-0d6d-46c0-ba46-e85a4bc65b66"; // Replace with your Client Secret
        $env = \PhonePe\Env::PRODUCTION; // Replace with your Environment

        $standardCheckoutClient = StandardCheckoutClient::getInstance(
            $clientId,
            $clientVersion,
            $clientSecret,
            $env
        );

        try {
            $callbackResponse = $standardCheckoutClient->verifyCallbackResponse(
                $headers,
                json_decode($requestBody, true),
                $username,
                $password
            ); // Process the callback response
        } catch (\PhonePe\common\exceptions\PhonePeException $e) {
            // Handle exceptions (e.g., log the error)
            echo "Error validating callback response: " . $e->getMessage();
        }
    }
}
