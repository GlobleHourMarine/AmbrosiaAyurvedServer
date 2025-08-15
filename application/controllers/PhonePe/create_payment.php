<?php
$data = [
    'username' => 'AmbrosiaAyurved',
    'password' => 'Ambrosia123'
];

$jsonData = json_encode($data);

$ch = curl_init('https://ambrosiaayurved.in/PaymentController/callback');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>