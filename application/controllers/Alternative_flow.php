<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alternative_flow extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
        $this->load->model('admin_model');
        $this->load->model('alternative_model');
        // $this->load->library('session');
    }
    public function verify_ambrosia_user()
    {
        // Get email from POST request
        $phone = $this->input->post('phone');
        $this->session->set_userdata('user_phone',$phone);
        
        // Validate email
        if (empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Please provide a valid phone number']);
            return;
        }

        // For testing purposes, just return success without sending email
        echo json_encode(['success' => true, 'message' => 'OTP would be sent in production']);
    }
public function verify_ambrosia_user_otp()
{
    $this->output->set_content_type('application/json');

    // Fetch raw JSON input
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $email = $data['email'] ?? '';
    $otp = $data['otp'] ?? '';
    $sended_otp = '123011'; // Hardcoded for testing

    if (empty($otp)) {
        echo json_encode(['success' => false, 'message' => 'Please enter OTP']);
        return;
    }

    if ($otp === $sended_otp) {
        $this->session->set_userdata('otp_verified', true);
        echo json_encode(['success' => true, 'message' => 'OTP verified successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid OTP']);
    }
}

public function debug_session_data()
{
    $this->output->set_content_type('text/plain'); // Optional: cleaner output

    echo "Session Data:\n\n";
    print_r($this->session->all_userdata());
}

public function save_address() {
    // Check if this is an AJAX request
    if (!$this->input->is_ajax_request()) {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }

    // Get input data
    $addressData = [
        'first_name' => $this->input->post('firstName', true),
        'last_name' => $this->input->post('lastName', true),
        'email' => $this->input->post('email', true),
        'pincode' => $this->input->post('pincode', true),
        'city' => $this->input->post('city', true),
        'state' => $this->input->post('state', true),
        'address' => $this->input->post('address', true),
        // 'country' => $this->input->post('Country', true)
        
    ];
    
    // Validate required fields
    $errors = [];
    foreach ($addressData as $key => $value) {
        if (empty($value)) {
            $errors[] = ucfirst(str_replace('_', ' ', $key)) . ' is required';
        }
    }

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }

    // Validate email format
    if (!filter_var($addressData['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }

    // Validate pincode (6 digits)
    if (!preg_match('/^\d{6}$/', $addressData['pincode'])) {
        echo json_encode(['success' => false, 'message' => 'Pincode must be 6 digits']);
        exit;
    }

    // Store in session
    $this->session->set_userdata('shipping_address', $addressData);
    
    // Return success response
    echo json_encode(['success' => true, 'message' => 'Address saved successfully']);
    exit;
}
}
?>