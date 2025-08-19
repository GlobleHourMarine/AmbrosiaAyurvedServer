<?php
$secret = "Ambrosia@123";
$payload = file_get_contents('php://input');
$headers = getallheaders();

// Debug: log headers + payload
file_put_contents(__DIR__ . '/webhook.log', date('Y-m-d H:i:s') . " - Headers:\n" . print_r($headers, true) . "\nPayload:\n" . $payload . "\n\n", FILE_APPEND);

$signatureHeader = $headers['X-Hub-Signature-256'] ?? $headers['x-hub-signature-256'] ?? null;

if ($signatureHeader) {
    $signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($signature, $signatureHeader)) {
        http_response_code(403);
        exit('Invalid signature.');
    }
}

$data = json_decode($payload, true);

if ($data && isset($data['ref']) && $data['ref'] === 'refs/heads/test') {
    $gitBin = "/usr/bin/git"; // adjust with which git
    $cmd = "cd /home/u467404997/domains/ambrosiaayurved.in/public_html/it && $gitBin pull origin test 2>&1";
    $output = shell_exec($cmd);

    file_put_contents(__DIR__ . '/deploy.log', date('Y-m-d H:i:s') . " - $cmd\n$output\n\n", FILE_APPEND);

    echo "Deployed branch: test\n";
    echo $output;
} else {
    echo "Not a test branch push";
}
