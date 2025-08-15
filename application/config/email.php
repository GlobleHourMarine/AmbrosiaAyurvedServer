<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// $config = array(
//     'protocol' => 'smtp',
//     'smtp_host' => 'smtp.hostinger.com', // or 'mail.ambrosiaayurved.in'
//     'smtp_port' => 465, // Use 587 for TLS
//     'smtp_user' => 'care@ambrosiaayurved.in',
//     'smtp_pass' => 'Ambrosia@2025', // Hostinger email password
//     'mailtype' => 'html',
//     'charset' => 'utf-8',
//     'newline' => "\r\n",
//     'wordwrap' => TRUE,
//     'smtp_crypto' => 'ssl', // Use 'tls' if 'ssl' doesn't work
// );


$config['protocol'] = 'IMAP';
$config['smtp_host'] = 'imap.hostinger.com';
$config['smtp_user'] = 'care@ambrosiaayurved.in';  
$config['smtp_pass'] = 'Ambrosia@2025';  
$config['smtp_port'] = 993;
$config['smtp_crypto'] = 'ssl';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['wordwrap'] = TRUE;

