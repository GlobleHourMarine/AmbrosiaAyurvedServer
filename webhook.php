<?php
// Secret (same as GitHub webhook secret)
$secret = "Ambrosia@123";

// Read payload
$payload = file_get_contents('php://input');
$headers = getallheaders();

// Verify signature
if (isset($headers['X-Hub-Signature-256'])) {
    $signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($signature, $headers['X-Hub-Signature-256'])) {
        http_response_code(403);
        exit('Invalid signature.');
    }
}

// Decode event
$data = json_decode($payload, true);

if ($data && isset($data['ref']) && $data['ref'] === 'refs/heads/test') {
    // Pull latest code
    shell_exec("cd /home/u467404997/domains/ambrosiaayurved.in/public_html/it && git pull origin test 2>&1");
    echo "Deployed branch: test";
} else {
    echo "Not a test branch pushing";
}
?>
