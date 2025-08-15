<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once 'authorization.php';

class Phonepe_gateway extends CI_Controller {  
        public function index() {
$environment = 'prod';  // Environment: 'uat' or 'prod'

$payment_urls = [
    "prod" => "https://api.phonepe.com/apis/pg/checkout/v2/pay",
    // "uat"  => "https://api-preprod.phonepe.com/apis/pg-sandbox/checkout/v2/pay"
];

$BACKEND_URL = "https://ambrosiaayurved.in/PaymentController/callback";; // Replace with your actual backend URL

$merchantOrderId = "ORDID_" . uniqid();
$token = getValidToken();

if (!$token) {
    http_response_code(500);
    echo json_encode(['error' => 'OAuth token not available. Please try again later.']);
    exit;
}

$requestData = [
    "merchantOrderId" => $merchantOrderId,
    "amount" => 1000,
    "expireAfter" => 1200,
    "metaInfo" => [
        "udf1" => "additional-information-1",
        "udf2" => "additional-information-2",
        "udf3" => "additional-information-3",
        "udf4" => "additional-information-4",
        "udf5" => "additional-information-5"
    ],
    "paymentFlow" => [
        "type" => "PG_CHECKOUT",
        "message" => "Payment message used for collect requests",
        "merchantUrls" => [
            "redirectUrl" => "$BACKEND_URL/redirect/$merchantOrderId"
        ]
    ]
];

$payment_url = $payment_urls[$environment];

$ch = curl_init($payment_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Content-Type: application/json",
    // "Authorization: O-Bearer $token"
]);
curl_setopt($ch, CURLOPT_POST, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    curl_close($ch);
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "cURL Error", "error" => $error_msg]);
    exit;
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = json_decode($response, true);
// echo json_encode($result, JSON_PRETTY_PRINT);      // Uncomment this line to view the response
if ($httpCode === 200 && isset($result['data']['redirectUrl'])) {
    $redirectUrl = $result['data']['redirectUrl'];
    header("Location: $redirectUrl");
    exit;
}
exit;

    }
}
