<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function encrypt_url($string) {
    $key = "mysecretkey-change-this";
    $iv  = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CBC'));

    $cipher_text = openssl_encrypt($string, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);

    $final = $iv . $cipher_text;
    return rtrim(strtr(base64_encode($final), '+/', '-_'), '=');
}

function decrypt_url($token) {
    $key = "mysecretkey-change-this";

    $data = base64_decode(strtr($token, '-_', '+/'));
    if ($data === false) return false;

    $iv_length = openssl_cipher_iv_length('AES-128-CBC');
    $iv        = substr($data, 0, $iv_length);
    $cipher    = substr($data, $iv_length);

    return openssl_decrypt($cipher, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
}
