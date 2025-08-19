<?php
$secret = "Ambrosia@123";
$payload = file_get_contents('php://input');
$headers = getallheaders();
// file_put_contents('/home/u467404997/domains/ambrosiaayurved.in/public_html/webhook.log', print_r("Inside webhook"), FILE_APPEND);

// file_put_contents(__DIR__ . '/webhook.log', "Inside webhook\n", FILE_APPEND);
file_put_contents('/home/u467404997/domains/ambrosiaayurved.in/public_html/it/webhook.log', "Inside webhook\n", FILE_APPEND);



// Normalize header case
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
    // Full path to git
    $gitBin = "/usr/bin/git"; // check with "which git" via SSH

    $cmd = "cd /home/u467404997/domains/ambrosiaayurved.in/public_html/it && $gitBin pull origin test 2>&1";
    $output = shell_exec($cmd);

    // Log for debugging
    file_put_contents("/home/u467404997/domains/ambrosiaayurved.in/deploy.log", date('Y-m-d H:i:s')." - $cmd\n$output\n\n", FILE_APPEND);

    echo "Deployed branch: test\n";
    echo $output;
} else {
    echo "Not a test branch push";
}
