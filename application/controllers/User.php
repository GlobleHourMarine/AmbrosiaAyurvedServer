<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . '../vendor/autoload.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Uri $uri
 * @property CI_Pagination $pagination
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Router $router
 * @property CI_Security $security
 * @property CI_DB $db
 * @property CI_Email $email
 * @property Your_model_name $usermodel
 * @property Your_model_name $Admin_model
 * @property Your_model_name $Investment_model
 * @property Your_model_name $package_model
 * @property Your_model_name $User
 */

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model('usermodel');
        $this->load->model('Order_model');
        $this->load->library('form_validation');

        $this->load->library('upload');
    }
    private $api_key = '7febeab1-6c5f-11f0-a562-0200cd936042'; // Replace with your actual key

    public function userregister()
    {
        $full_name = $this->input->post('full_name');
        $mobile = $this->input->post('mobile');
        $otp_session_id = $this->input->post('otp_session_id');

        if (empty($mobile) || empty($otp_session_id)) {
            $this->session->set_flashdata('error', 'Please verify your mobile number with OTP before registering.');
            redirect('registerpage');
        }

        // ✅ Check if user already exists by mobile
        $check = $this->usermodel->check_user_by_mobile('user_table', $mobile);
        if ($check == 1) {
            $this->session->set_flashdata('error', 'User Already Registered with this mobile.');
            redirect('registerpage');
        }

        // ✅ Insert user
        $data = [
            'fname' => $full_name,
            'mobile' => $mobile
        ];

        $insert = $this->usermodel->insertdata('user_table', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Registration Successful!');
            redirect('loginpage');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Try again.');
            redirect('registerpage');
        }
    }



    public function register_before_order()
    {
        $email = $this->input->post('email');
        if (!empty($email)) {
            $res = $this->usermodel->check_data('user_table', $email);
            if ($res) {

                $fetch_data = $this->usermodel->fetch_data_by_email('user_table', $email);
                $id = $fetch_data->user_id;
                $email = $fetch_data->email;
                $mobile = $fetch_data->mobile;
                $password = $fetch_data->password;

                $session_data = array(
                    'user_id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'password' => $password,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                $this->session->set_flashdata('message', 'Select your product and product quantity from here');
                redirect('all_products');
            } else {
                $data = array(
                    'email' => $email
                );
                $register_email = array(
                    'register_email' => $email
                );
                $insert = $this->usermodel->insertdata('user_table', $data);
                if ($insert) {
                    $this->session->set_userdata($register_email);
                    $this->session->set_flashdata('OrderModelSecond', true);
                    redirect('/');
                } else {
                    $this->session->set_flashdata('error', 'Something Wrong Try Again');
                    redirect('registerpage');
                }
            }
        } else {
            if (empty($email)) {
                $this->session->set_flashdata('registermessage', 'Enter your details first for furthur process.');
            }
        }
    }
    public function userlogin()
    {
        $this->form_validation->set_rules(
            'mobile',
            'Mobile',
            'required|trim|regex_match[/^[6-9]\d{9}$/]',
            [
                'required' => 'The Mobile number is required.',
                'regex_match' => 'Please enter a valid 10-digit Indian mobile number.',
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'The Password is Required.',
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('../views/header.php');
            $this->load->view('../views/login.php');
        } else {
            $mobile = $this->input->post('mobile');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');

            // ✅ Custom model method for mobile login
            $res = $this->usermodel->verify_user_by_mobile('user_table', $mobile, $password);

            if ($res) {
                if ($remember) {
                    set_cookie('mobile', $mobile, 86400 * 30);
                    set_cookie('password', $password, 86400 * 30);
                } else {
                    delete_cookie('mobile');
                    delete_cookie('password');
                }

                $this->session->set_userdata([
                    'user_id' => $res->user_id,
                    'fname' => $res->fname,
                    'lname' => $res->lname,
                    'email' => $res->email,
                    'mobile' => $res->mobile,
                    'logged_in' => TRUE
                ]);

                session_write_close();
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Invalid credentials.');
                redirect('loginpage');
            }
        }
    }
    public function login_with_otp()
    {
        $mobile = $this->input->get('mobile');
        $user = $this->db->where('mobile', $mobile)->get('user_table')->row();

        if ($user) {
            $this->session->set_userdata([
                'user_id' => $user->user_id,
                'fname' => $user->fname,
                'lname' => $user->lname,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'logged_in' => TRUE
            ]);
            redirect('/');
        } else {
            $this->session->set_flashdata('message', 'Account not found.');
            redirect('loginpage');
        }
    }

    public function send_loginotp()
    {
        $phone = $this->input->post('phone');

        // Validate mobile number
        if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '❌ Invalid phone number. Please enter a valid 10-digit number.'
                ]));
        }

        // Check if user exists
        $user = $this->db->where('mobile', $phone)->get('user_table')->row();
        $is_new = $user ? false : true;

        // Send OTP via 2Factor
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/{$phone}/AUTOGEN/OTP1";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'session_id' => $result['Details'],
                    'is_new' => $is_new, // ✅ tell frontend if this is a new user
                    'message' => "✅ OTP sent to {$phone}"
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => "❌ Failed to send OTP: " . ($result['Details'] ?? 'Unknown error')
                ]));
        }
    }
    public function send_temp_loginotp()
{
    $phone = $this->input->post('phone');

    // Validate mobile number
    if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'error',
                'message' => '❌ Invalid phone number. Please enter a valid 10-digit number.'
            ]));
    }

    // Check if user exists
    $user = $this->db->where('mobile', $phone)->get('user_table')->row();
    $is_new = $user ? false : true;

    // Instead of calling OTP API, use static OTP
    $static_otp = '101010';

    // Optionally: Save OTP in session for later verification
    $this->session->set_userdata('login_otp', $static_otp);
    $this->session->set_userdata('otp_phone', $phone);

    // Return success response
    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => 'success',
            'session_id' => 'manual-test', // Static session ID placeholder
            'otp' => $static_otp, // Send OTP only for testing; remove in production
            'is_new' => $is_new,
            'message' => "✅ Static OTP ($static_otp) generated for {$phone}"
        ]));
}



    public function verify_loginotp()
    {
        $otp = $this->input->post('otp');
        $session_id = $this->input->post('session_id');
        $phone = $this->input->post('phone');
        $name = $this->input->post('name'); // only for new users

        // Verify OTP
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/VERIFY/{$session_id}/{$otp}";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            // Check if user exists
            $user = $this->db->where('mobile', $phone)->get('user_table')->row();

            if (!$user) {
                // Create new account
                $insert_data = [
                    'fname' => $name,
                    'mobile' => $phone,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('user_table', $insert_data);
                $user_id = $this->db->insert_id();

                // Fetch new user
                $user = $this->db->where('user_id', $user_id)->get('user_table')->row();
            }

            // Login the user
            $this->session->set_userdata([
                'user_id' => $user->user_id,
                'fname' => $user->fname,
                'lname' => $user->lname ?? '',
                'email' => $user->email ?? '',
                'mobile' => $user->mobile,
                'logged_in' => TRUE
            ]);

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => "✅ Logged in successfully"
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => "❌ Invalid OTP. Please try again."
                ]));
        }
    }
    public function verify_temp_loginotp()
{
    $otp = $this->input->post('otp');
    $phone = $this->input->post('phone');
    $name = $this->input->post('name'); // only for new users

    // Static OTP for testing
    $static_otp = '101010';

    // Check OTP
    if ($otp === $static_otp) {
        // Check if user exists
        $user = $this->db->where('mobile', $phone)->get('user_table')->row();

        if (!$user) {
            // Create new account
            $insert_data = [
                'fname' => $name,
                'mobile' => $phone,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('user_table', $insert_data);
            $user_id = $this->db->insert_id();

            // Fetch new user
            $user = $this->db->where('user_id', $user_id)->get('user_table')->row();
        }

        // Login the user
        $this->session->set_userdata([
            'user_id' => $user->user_id,
            'fname' => $user->fname,
            'lname' => $user->lname ?? '',
            'email' => $user->email ?? '',
            'mobile' => $user->mobile,
            'logged_in' => TRUE
        ]);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'success',
                'message' => "✅ Logged in successfully"
            ]));
    } else {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'error',
                'message' => "❌ Invalid OTP. Please try again."
            ]));
    }
}


    public function userlogout()
    {
        $this->session->sess_destroy();
        delete_cookie('email'); // Also clear email cookie on logout
        delete_cookie('password');
        redirect('/');
    }


    public function add_new_address()
    {
        $this->load->view('add_address.php');
    }

    public function forgotPassword()
    {
        $phone = $this->input->post('phone');

        // Validate mobile number
        if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
            $this->session->set_flashdata('error', '❌ Invalid phone number. Please enter a valid 10-digit number.');
            redirect('forgotPasswordPage');
            return;
        }

        // Check if user exists
        $user = $this->db->where('mobile', $phone)->get('user_table')->row();

        if (!$user) {
            $this->session->set_flashdata('error', '⚠️ Mobile number not registered.');
            redirect('forgotPasswordPage');
            return;
        }

        // Send OTP via 2Factor
        $apiKey = $this->api_key; // You should define this in constructor or config
        $url = "https://2factor.in/API/V1/{$apiKey}/SMS/{$phone}/AUTOGEN/OTP1";

        $response = file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            // Store session_id and phone in session or pass to next page
            $this->session->set_userdata([
                'otp_session_id' => $result['Details'],
                'reset_phone' => $phone
            ]);
            // print_r($user);
            // die();
            $this->session->set_flashdata('success', '✅ OTP sent to your mobile.');
            redirect('VerifyOtpPage/' . $user->user_id);  // Adjust this as needed
        } else {
            $this->session->set_flashdata('error', '❌ Failed to send OTP. Please try again later.');
            redirect('forgotPasswordPage');
        }
    }

    public function verifyotp()
    {
        $id = $this->input->post('id'); // user ID
        $otp = $this->input->post('otp');
        $session_id = $this->input->post('session_id');
        // print_r($id);
        // Debugging (optional - for development)
        // log_message('error', "verifyotp() called with ID: $id, OTP: $otp, SID: $session_id");

        if (empty($session_id) || empty($otp)) {
            $this->session->set_flashdata('error', '⚠️ Missing OTP or session ID.');
            redirect('VerifyOtpPage/' . $id);
            return;
        }

        // Call 2Factor API to verify OTP
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/VERIFY/{$session_id}/{$otp}";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            // OTP Verified
            $this->session->set_flashdata('success', '✅ OTP verified! Please set your new password.');
            redirect('SetPasswordPage/' . $id);
        } else {
            // OTP failed
            $message = !empty($result['Details']) ? $result['Details'] : 'Invalid OTP. Please try again.';
            $this->session->set_flashdata('error', '❌ ' . $message);
            redirect('VerifyOtpPage/' . $id);
        }
    }

    public function setnewpassword()
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[8]|max_length[15]',
            [
                'required' => 'The Password is Required.',
                'min_length' => 'Password must be at least 8 characters.',
                'max_length' => 'Password must not exceed 15 characters.'
            ]
        );
        $this->form_validation->set_rules(
            'confirm_password',
            'Confirm Password',
            'required|trim|matches[password]',
            [
                'required' => 'The Confirm Password is Required.',
                'matches' => 'Password and Confirm Password do not match.',
            ]
        );
        if ($this->form_validation->run() == FALSE) {

            $id = $this->input->post('id');
            $data = array(
                'id' => $id
            );
            $this->load->view('../views/setpassword.php', $data);
            return;
        } else {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            if ($password == $confirm_password) {
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);  // Hashing the password before storing it in the database
                $data = array(
                    'password' => $hashpassword
                );
                $res = $this->usermodel->update_password('user_table', $data, $id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Password changed successfully');
                    redirect('loginpage');
                } else {
                    $this->session->set_flashdata('success', 'Something went wrong');
                    redirect('SetPasswordPage/' . $id);
                }
            } else {
                $this->session->set_flashdata('success', 'Password and Confirm Password does not match');
                redirect('SetPasswordPage/' . $id);
            }
        }
    }

    public function cart()
    {
        $user_id = $this->session->userdata('user_id');
        $result = $this->usermodel->fetch_cartdata('cart_table', $user_id);
        if (!$result) {
            $quantity = 0;
        } else {
            $quantity = $result->quantity;
        }
        $this->load->view('../views/cart.php', array('quantity' => $quantity));
    }

    public function update_address()
    {

        $new_address = $this->input->post('address');
        $id = $this->session->userdata('user_id');
        if (!empty($new_address)) {
            $res = $this->usermodel->update_user_address('user_table', $id, $new_address);
            if ($res) {
                $this->session->set_flashdata('success', 'Address updated successfully!');
                redirect('cart_data');
            } else {
                $this->session->set_flashdata('error', 'Failed to update address!');
                redirect('cart_data');
            }
        } else {
            $this->session->set_flashdata('error', 'Address cannot be empty!');
            redirect('cart_data');
        }
    }

    public function delete_product_from_cart()
    {
        $this->load->helper('cookie');
        $cart_token = $this->input->post('cart_token');
        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

        $updated_cart = array_filter($cart_items, function ($item) use ($cart_token) {
            return $item['cart_token'] !== $cart_token;
        });

        set_cookie('guest_cart', json_encode(array_values($updated_cart)), 86400 * 7);
        // }

        redirect('new_cart_page');
    }


    public function add_data_into_cart()
    {
        $this->load->helper('cookie');

        $user_id = $this->session->userdata('user_id');
        $product_id = $this->input->post('product_id');
        $product_price = $this->input->post('product_price');
        $name = $this->input->post('name');
        $quantity = $this->input->post('quantity');
        $pack_quantity = $this->input->post('pack_quantity');
        $pack_price = $this->input->post('pack_price');
        $pack_id = $this->input->post('pack_id');

        if (empty($product_id) || empty($quantity) || empty($pack_price)) {
            show_error('Missing product details. Please try again.');
        }

        if (empty($pack_quantity)) {
            $pack_quantity = 1;
        }

        if (empty($pack_id)) {
            $pack_id = 0;
        }
        $cart_token = uniqid('guest_', true);
        $cart_items[] = [
            'cart_token'    => $cart_token,
            'product_id'    => $product_id,
            'product_name'    => $name,
            'product_price'    => $product_price,
            'pack_id'       => $pack_id,
            'quantity'      => $quantity,
            'pack_quantity' => $pack_quantity,
            'pack_price'    => $pack_price,
        ];

        // //Show for debug only
        // echo "<pre>";
        // print_r($cart_items);
        // die();

        // Final save
        set_cookie('guest_cart', json_encode(array_values($cart_items)), 86400 * 7);
        redirect('new_cart_page');
    }



    public function migrate_guest_cart_to_user_cart($user_id)
    {
        $this->load->helper('cookie');
        $cookie_cart = get_cookie('guest_cart');
        if ($cookie_cart) {
            $cart_items = json_decode($cookie_cart, true);

            foreach ($cart_items as $item) {
                $data = array(
                    'user_id'    => $user_id,
                    'product_id' => $item['product_id'],
                    'quantity'   => $item['quantity'],
                    'date'       => date('Y-m-d H:i:s')
                );

                $check = $this->usermodel->check_product_already_have('cart_table', $item['product_id'], $user_id);
                if ($check) {
                    $this->usermodel->update_cart_product('cart_table', $item['product_id'], $user_id, $data);
                } else {
                    $this->usermodel->add_product_into_cart('cart_table', $data);
                }
            }
        }
    }

    public function payment_processing()
    {
        $this->load->model('Order_model');
        $api = new Api('rzp_test_J4DBKJFYTiyeCf', 'AAbHCSGlDA2T2ftj8EexinK9');
        $razorpay_payment_id = $this->input->get('payment_id');
        $razorpay_order_id   = $this->input->get('order_id');
        $razorpay_signature  = $this->input->get('signature');


        $attributes  = array(
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        );

        try {
            $api->utility->verifyPaymentSignature($attributes);
            redirect('payment_process');
        } catch (SignatureVerificationError $e) {
            // ❌ Signature is invalid
            log_message('error', 'Razorpay Signature Verification Failed: ' . $e->getMessage());
            redirect('order/failure');
        }
    }

    public function payment_process()
    {
        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');
        $amount = $this->session->userdata('amount');
        $cookie_cart = get_cookie('guest_cart');
        if ($cookie_cart) {
            $cart_items = json_decode($cookie_cart, true);
            $product_id = $cart_items[0]['product_id'];
            $quantity = $cart_items[0]['quantity'];
            $product_price = $this->usermodel->get_product_price($product_id);

            $cart_data = [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ];

            $check_exist = $this->usermodel->check_product_exist('cart_table', $user_id, $product_id);
            if ($check_exist) {
                $this->usermodel->update_cart_product('cart_table', $product_id, $user_id, $cart_data);
            } else {
                $cart_id = $this->usermodel->add_product_into_cart('cart_table', $cart_data);
            }
        }

        $order_data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'product_quantity' => $quantity,
            // 'status' => 'pending',
            'product_price' => $product_price,
            'total_price' => $amount,
            'date' => date('Y-m-d H:i:s')
        ];
        $order_id = $this->usermodel->insert_order_data('order_table', $order_data);
        if (!$order_id) {
            echo "Order insertion failed!";
            return;
        }
        $razorpay_order_id = $this->session->userdata('razorpay_order_id');
        $this->Order_model->save_razorpay_order($order_id, $razorpay_order_id);


        $payment_data = [
            'user_id' => $user_id,
            'order_id' => $order_id,
            'amount' => $amount,
            'date' => date('Y-m-d H:i:s'),
        ];

        if (!$this->usermodel->insert_payment_data('payment_table', $payment_data)) {
            echo "Payment data not inserted!";
            return;
        }

        redirect('success');
    }


    public function payment_done()
    {
        $this->load->view('header.php');
        $this->load->view('paymentdone.php');
    }



    public function cancel_order()
    {
        $user_id = $this->session->userdata('user_id');
        $order_id = $this->input->post('order_id');

        $res = $this->usermodel->cancel_order('payment_table', $order_id, $user_id);

        if ($res) {
            echo "success";
        } else {
            echo "failed";
        }
    }



    public function register_first()
    {
        $this->load->view('register2.php');
    }


    public function user_reviews()
    {
        $slug = $this->input->get('slug');
        if (!$slug) {
            show_404(); // or redirect with error message
        }

        $this->load->model('usermodel'); // if not autoloaded
        $data['reviews'] = $this->usermodel->fetch_reviews_by_slug($slug);

        $this->load->view('header.php');
        $this->load->view('reviews.php', $data);
    }
    public function billing()
    {
        if (!$this->session->userdata('email')) {
            redirect('/');
            return;
        }

        $this->load->helper('cookie');
        $this->load->model('usermodel');
        $this->load->model('payment_model');

        $buy_now_cookie = get_cookie('buy_now');
        $cart_cookie = get_cookie('cart'); // or 'guest_cart'

        $cart_items = [];

        if (!empty($buy_now_cookie)) {
            $item = json_decode($buy_now_cookie, true);
            if (is_array($item) && isset($item['product_id'])) {
                $cart_items[] = $item;
            }
        } elseif (!empty($cart_cookie)) {
            $cart_items = json_decode($cart_cookie, true);
            // If stored as object with keys (e.g. cart["product_12"]), convert to array:
            if (is_object($cart_items)) {
                $cart_items = (array)$cart_items;
            }
        }

        // ✅ Get cart total if set (optional cookie)
        $total = get_cookie('total_cart');
        $cart_total = $total ? json_decode($total, true) : [];

        $user_id = $this->session->userdata('user_id');
        $address_id = $this->session->userdata('selected_address_id');
        $user_address = $this->usermodel->fetch_user_address_by_address_id($address_id);
        $user_info = $user_id ? $this->payment_model->get_user_by_id($user_id) : null;

        // ✅ Fetch product details from DB
        $products_info = [];
        foreach ($cart_items as $item) {
            $product_id = is_array($item) ? $item['product_id'] : (isset($item->product_id) ? $item->product_id : null);
            if ($product_id) {
                $product = $this->payment_model->get_single_record('product_table', $product_id);
                if ($product) {
                    $products_info[$product_id] = $product;
                }
            }
        }

        $response = [
            'cart_items'    => $cart_items,
            'cart_total'    => $cart_total,
            'user_info'     => $user_info,
            'products_info' => $products_info,
            'user_address'  => $user_address,
        ];

        $this->load->view('billing.php', $response);
    }


    public function submit_review()
    {
        $uploaded_paths = [];

        if (!empty($_FILES['media_files']['name'][0])) {
            $filesCount = count($_FILES['media_files']['name']);
            $this->load->library('upload');

            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES['media_files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['media_files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['media_files']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['media_files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['media_files']['size'][$i];

                $originalName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $_FILES['file']['name']);
                $config['upload_path']   = FCPATH . 'uploads/reviews/';
                $config['allowed_types'] = 'jpg|jpeg|png|mp4|mov|avi';
                $config['max_size']      = 51200;
                $config['file_name']     = uniqid('file_', true) . '_' . $originalName;
                $config['overwrite']     = false;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $uploaded_paths[] = 'uploads/reviews/' . $data['file_name'];
                } else {
                    echo "Error: " . $this->upload->display_errors() . "<br>";
                }
            }
        } else {
            echo "No files selected.<br>";
        }
        $media_json = json_encode($uploaded_paths);
        $user_id = $this->session->userdata('user_id');
        $product_id = $this->input->post('product_id');
        $order_id = $this->input->post('order_id');
        $rating = $this->input->post('rating');
        $message = $this->input->post('message');



        $data = array(
            'user_id' => $user_id,
            'product_id' => $product_id,
            'order_id' => $oder_id,
            'rating' => $rating,
            'message' => $message,
            'file_path' => $media_json,
            'date' => date('Y-m-d H:i:s')
        );
        $result = $this->usermodel->insert_review('reviews', $data);
        if ($result) {
            $res = $this->usermodel->update_review_proof($order_id);
            if ($res) {
                $this->session->set_flashdata('success', 'Thank you for your feedback!');
            } else {
                $this->session->set_flashdata('error', 'Error in updating review proof');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to submit your review.');
        }
        redirect('add_your_review');
    }

    // public function save_checkout_information()
    // {
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');
    //     $this->load->library('session');

    //     if (!$this->session->userdata('user_id')) {
    //         $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
    //             'required' => 'The Email is Required.',
    //             'valid_email' => 'Please enter a valid email address.'
    //         ]);
    //         $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[15]', [
    //             'required' => 'The Password is Required.',
    //             'min_length' => 'Password must be at least 8 characters.',
    //             'max_length' => 'Password must not exceed 15 characters.'
    //         ]);
    //     }

    //     $this->form_validation->set_rules('fname', 'First Name', 'required|trim|alpha', [
    //         'required' => 'The First Name is Required.',
    //         'alpha' => 'The First Name must contain only letters.'
    //     ]);
    //     $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha', [
    //         'required' => 'The Last Name is Required.',
    //         'alpha' => 'The Last Name must contain only letters.'
    //     ]);
    //     $this->form_validation->set_rules('mobile', 'Phone', 'required|trim|numeric', [
    //         'required' => 'The Phone Number is Required.',
    //         'numeric' => 'Enter a valid Mobile Number'
    //     ]);

    //     $this->form_validation->set_rules('city', 'City', 'required|trim', [
    //         'required' => 'The City is Required.'
    //     ]);
    //     $this->form_validation->set_rules('state', 'State', 'required|trim', [
    //         'required' => 'The State is Required.'
    //     ]);
    //     $this->form_validation->set_rules('country', 'Country', 'required|trim', [
    //         'required' => 'The Country is Required.'
    //     ]);
    //     $this->form_validation->set_rules('pincode', 'Pin Code', 'required|trim|numeric|exact_length[6]', [
    //         'required' => 'The Pin Code is required.',
    //         'numeric' => 'Enter a valid numeric pin code.',
    //         'exact_length' => 'Pin Code must be exactly 6 digits.'
    //     ]);
    //     $this->form_validation->set_rules('address', 'Address', 'required|trim', [
    //         'required' => 'The Address is Required.'
    //     ]);

    //     if ($this->form_validation->run() == FALSE) {

    //         $user_id = $this->session->userdata('user_id');
    //         $cookie_cart = get_cookie('guest_cart');

    //         $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];
    //         $data['is_guest'] = true;

    //         $detailed_cart = [];
    //         foreach ($cart_items as $item) {
    //             $product = $this->Order_model->get_the_product_by_id($item['product_id']);
    //             if ($product) {
    //                 $product->quantity = $item['quantity'];
    //                 $product->cart_token = $item['cart_token'];
    //                 $detailed_cart[] = $product;
    //             }
    //         }
    //         $data['cart_data'] = $detailed_cart;
    //         $this->load->view('header');
    //         $this->load->view('order-summery', $data);
    //         $this->load->view('footer');
    //         return;
    //     }

    //     // Rest of your code (form processing)
    //     $fname   = htmlspecialchars($this->input->post('fname', TRUE));
    //     $lname   = htmlspecialchars($this->input->post('lname', TRUE));
    //     $mobile  = htmlspecialchars($this->input->post('mobile', TRUE));
    //     $city    = htmlspecialchars($this->input->post('city', TRUE));
    //     $district = htmlspecialchars($this->input->post('district', TRUE));
    //     $state   = htmlspecialchars($this->input->post('state', TRUE));
    //     $country = htmlspecialchars($this->input->post('country', TRUE));
    //     $pincode = htmlspecialchars($this->input->post('pincode', TRUE));
    //     $address = htmlspecialchars($this->input->post('address', TRUE));
    //     $email   = htmlspecialchars($this->input->post('email', TRUE));
    //     $pwd     = $this->input->post('password', TRUE) ?? '';
    //     $password = password_hash($pwd, PASSWORD_DEFAULT);
    //     $type   = htmlspecialchars($this->input->post('type', TRUE));
    //     $grand_total   = htmlspecialchars($this->input->post('total_amount', TRUE));
    //     $cart_token = uniqid('guest_', true);
    //     $total[] = [
    //         'cart_token'    => $cart_token,
    //         'grand_total'   => $grand_total,

    //     ];
    //     set_cookie('total_cart', json_encode(array_values($total)), 86400 * 7);

    //     if (empty($email) && empty($pwd)) {
    //         $email = $this->session->userdata('email');
    //         $user_id = $this->session->userdata('user_id');
    //         // $data = [
    //         //     'mobile'  => $mobile,
    //         // ];
    //         $address_data = [
    //             'user_id' => $user_id,
    //             'fname'   => $fname,
    //             'lname'   => $lname,
    //             'mobile'  => $mobile,
    //             'city'    => $city,
    //             'district' => $district,
    //             'state'   => $state,
    //             'country' => $country,
    //             'address' => $address,
    //             'pincode' => $pincode,
    //             'address_type' => $type
    //         ];

    //         // $result = $this->usermodel->update_user_details_via_checkout('user_table', $data, $user_id);
    //         $data = $this->usermodel->add_new_address('user_address', $address_data);
    //         if ($data) {
    //             redirect('payment');
    //         } else {
    //             $this->session->set_flashdata('error', 'Something went wrong');
    //             redirect('order-summery');
    //         }
    //     } else {
    //         $data = [
    //             'fname'   => $fname,
    //             'lname'   => $lname,
    //             'mobile'  => $mobile,
    //             'email'   => $email,
    //             'password' => $password
    //         ];
    //         // Step 1: Check if email exists
    //         $email_exists = $this->usermodel->check_if_email_exists('user_table', $email);

    //         if ($email_exists) {
    //             // Step 2: Verify password
    //             $db_password_hash = $this->usermodel->get_user_password_by_email('user_table', $email);
    //             if (password_verify($pwd, $db_password_hash)) {
    //                 // Password matched
    //                 $user_id = $this->usermodel->get_user_id_by_email('user_table', $email);

    //                 $address_data = [
    //                     'user_id' => $user_id,
    //                     'fname'   => $fname,
    //                     'lname'   => $lname,
    //                     'mobile'  => $mobile,
    //                     'district' => $district,
    //                     'city'    => $city,
    //                     'state'   => $state,
    //                     'country' => $country,
    //                     'address' => $address,
    //                     'pincode' => $pincode,
    //                     'address_type' => $type
    //                 ];
    //                 $data = $this->usermodel->add_new_address('user_address', $address_data);
    //                 // Optional: Reactivate deleted account
    //                 $check_account_status = $this->usermodel->check_account_status('user_table', $email);
    //                 if ($check_account_status == 'Deleted') {
    //                     $account_status = [
    //                         'password' => $password,
    //                         'account_status' => ''
    //                     ];
    //                     $this->usermodel->update_userdata_with_account_status('user_table', $email, $account_status);
    //                 }

    //                 // $this->usermodel->update_user_details_via_checkout('user_table', $data, $user_id);
    //                 $this->session->set_userdata([
    //                     'user_id' => $user_id,
    //                     'email' => $email,
    //                     'logged_in' => TRUE
    //                 ]);
    //                 redirect('payment');
    //             } else {
    //                 // Password did not match — Show error
    //                 $this->session->set_flashdata('error', 'Invalid Credentials');
    //                 redirect('order-summery');
    //             }
    //         } else {
    //             // Email does not exist — Create new user
    //             $fetch_inserted_uid = $this->usermodel->save_checkout_data_now('user_table', $data);
    //             if ($fetch_inserted_uid) {
    //                 $this->session->set_userdata([
    //                     'user_id' => $fetch_inserted_uid,
    //                     'email' => $email,
    //                     'logged_in' => TRUE
    //                 ]);
    //                 redirect('payment');
    //             }
    //         }
    //     }
    // }

    // public function check_credentials()
    // {
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     $user = $this->usermodel->get_user_by_email('user_table', $email);
    //     $user_id = $user->user_id;

    //     if ($user && password_verify($password, $user->password)) {
    //         $fetch_address = $this->usermodel->fetch_all_address('user_address', $user_id);
    //         if (!empty($fetch_address)) {
    //             echo json_encode([
    //                 'status' => 'valid',
    //                 'message' => 'address existed',
    //                 'data' => $fetch_address
    //             ]);
    //         } else {
    //             echo json_encode([
    //                 'status' => 'valid',
    //                 'message' => 'address not existed'
    //             ]);
    //         }
    //     } else {
    //         echo json_encode([
    //             'status' => 'Invalid',
    //         ]);
    //     }
    // }
    public function save_checkout_information()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        // Validation rules for all users
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|alpha', [
            'required' => 'First Name is required.',
            'alpha' => 'First Name must contain only letters.'
        ]);

        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha', [
            'required' => 'Last Name is required.',
            'alpha' => 'Last Name must contain only letters.'
        ]);

        $this->form_validation->set_rules('mobile', 'Phone', 'required|trim|numeric|min_length[10]|max_length[13]', [
            'required' => 'Phone Number is required.',
            'numeric' => 'Enter a valid Mobile Number',
            'min_length' => 'Invalid Number',
            'max_length' => 'Invalid Number'
        ]);

        $this->form_validation->set_rules('city', 'City', 'required|trim', [
            'required' => 'City is required.'
        ]);

        $this->form_validation->set_rules('state', 'State', 'required|trim', [
            'required' => 'State is required.'
        ]);

        $this->form_validation->set_rules('country', 'Country', 'required|trim', [
            'required' => 'Country is required.'
        ]);

        $this->form_validation->set_rules('pincode', 'Pin Code', 'required|trim|numeric|exact_length[6]', [
            'required' => 'Pin Code is required.',
            'numeric' => 'Enter a valid numeric pin code.',
            'exact_length' => 'Pin Code must be exactly 6 digits.'
        ]);

        $this->form_validation->set_rules('address', 'Address', 'required|trim', [
            'required' => 'Address is required.'
        ]);

        $this->form_validation->set_rules('type', 'Address Type', 'required|in_list[Home,Work]', [
            'required' => 'Address Type is required.'
        ]);

        // Additional validation for guest users
        if (!$this->session->userdata('user_id')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
                'required' => 'Email is required.',
                'valid_email' => 'Please enter a valid email address.'
            ]);

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[15]', [
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 8 characters.',
                'max_length' => 'Password must not exceed 15 characters.'
            ]);
        }

        if ($this->form_validation->run() == FALSE) {
            // Return validation errors
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            echo json_encode($response);
            return;
        }

        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');

        // if($user_id)
        // {
        //     $user_data=$this->usermodel->get_user_by_id('user_table', $user_id);
        //     $email=$user_data->email;
        //     $password=$user_data->password;
        // }

        // Process the form data
        $fname = htmlspecialchars($this->input->post('fname', TRUE));
        $lname = htmlspecialchars($this->input->post('lname', TRUE));
        $mobile = htmlspecialchars($this->input->post('mobile', TRUE));
        $city = htmlspecialchars($this->input->post('city', TRUE));
        $district = htmlspecialchars($this->input->post('district', TRUE));
        $state = htmlspecialchars($this->input->post('state', TRUE));
        $country = htmlspecialchars($this->input->post('country', TRUE));
        $pincode = htmlspecialchars($this->input->post('pincode', TRUE));
        $address = htmlspecialchars($this->input->post('address', TRUE));
        $type = htmlspecialchars($this->input->post('type', TRUE));
        if (empty($email) && empty($password)) {
            $email = htmlspecialchars($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE) ?? '';
        }
        $grand_total = htmlspecialchars($this->input->post('total_amount', TRUE));

        // $data=array(
        //     'fname' =>$fname,
        //     'lname' =>$lname,
        //     'mobile' =>$mobile,
        //     'city' =>$city,
        //     'district' =>$district,
        //     'state' =>$state,
        //     'country' =>$country,
        //     'pincode' =>$pincode,
        //     'address' =>$address,
        //     'type' =>$type,
        //     'email' =>$email,
        //     'password' =>$password,
        //     'grand_total' =>$grand_total
        // );
        // print_r($data);
        // die();
        // Handle logged-in users
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');

            $address_data = [
                'user_id' => $user_id,
                'fname' => $fname,
                'lname' => $lname,
                'mobile' => $mobile,
                'city' => $city,
                'district' => $district,
                'state' => $state,
                'country' => $country,
                'address' => $address,
                'pincode' => $pincode,
                'address_type' => $type
            ];

            // Save the address
            $result = $this->usermodel->add_new_address('user_address', $address_data);

            if ($result) {
                // Success: fetch addresses
                $addresses = $this->usermodel->fetch_all_address('user_address', $user_id);
                $response = [
                    'status' => 'success',
                    'data' => $addresses
                ];

                if ($this->input->is_ajax_request()) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                    return;
                } else {
                    $this->session->set_flashdata('success', 'Address Saved Successfully!');
                    redirect('order-summery');
                }
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to save address. Please try again.'
                ];

                if ($this->input->is_ajax_request()) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                    return;
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong!');
                    redirect('order-summery');
                }
            }
        }
        // Handle guest users
        else {
            // First check if email exists
            $email_exists = $this->usermodel->check_if_email_exists('user_table', $email);

            if ($email_exists) {
                $response = [
                    'status' => 'email_exists',
                    'message' => 'This email is already registered. Please login instead.'
                ];
                echo json_encode($response);
                return;
            }

            // Create new account
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'mobile' => $mobile,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $user_id = $this->usermodel->save_checkout_data_now('user_table', $data);

            if ($user_id) {
                // Save address
                $address_data = [
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'mobile' => $mobile,
                    'district' => $district,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'address' => $address,
                    'pincode' => $pincode,
                    'address_type' => $type
                ];

                $this->usermodel->add_new_address('user_address', $address_data);

                // Set session and return success
                $this->session->set_userdata([
                    'user_id' => $user_id,
                    'email' => $email,
                    'logged_in' => TRUE
                ]);

                $addresses = $this->usermodel->fetch_all_address('user_address', $user_id);
                $response = [
                    'status' => 'success',
                    'data' => $addresses
                ];
                echo json_encode($response);
                return;
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to create account. Please try again.'
                ];
                echo json_encode($response);
                return;
            }
        }
    }

    // Add this new function to check email
    public function check_email()
    {
        $email = $this->input->post('email');
        $exists = $this->usermodel->check_if_email_exists('user_table', $email);

        echo json_encode([
            'exists' => $exists
        ]);
    }

    // New function to fetch user addresses for AJAX
    public function fetch_user_addresses()
    {
        if (!$this->session->userdata('user_id')) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $addresses = $this->usermodel->fetch_all_address('user_address', $user_id);

        if (!empty($addresses)) {
            echo json_encode([
                'status' => 'success',
                'data' => $addresses
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'data' => []
            ]);
        }
    }
    public function delete_address()
    {
        if (!$this->session->userdata('user_id')) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $address_id = $this->input->post('address_id');

        if (!$address_id) {
            echo json_encode(['status' => 'error', 'message' => 'Address ID is missing']);
            return;
        }

        // Ensure the address belongs to the logged-in user
        $this->db->where('id', $address_id);
        $this->db->where('user_id', $user_id);

        // Soft delete: update status
        $deleted = $this->db->update('user_address', ['status' => 'deleted']);

        if ($deleted) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete address']);
        }
    }

    // Updated check_credentials function
    public function check_credentials()
    {
        $phone = $this->input->post('phone');
        // Validate mobile format
       if (!preg_match('/^[6-9]\d{9}$/', $phone)) {

            echo json_encode([
                'status' => 'error',
                'message' => '❌ Invalid phone number'
            ]);
            return;
        }

        // Check if user exists
        $user = $this->usermodel->get_user_by_email('user_table', $phone);
        $is_new = $user ? false : true;

        // Send OTP via 2Factor
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/{$phone}/AUTOGEN/OTP1";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            echo json_encode([
                'status' => 'otp_sent',
                'session_id' => $result['Details'],
                'is_new' => $is_new,
                'message' => "✅ OTP sent to {$phone}"
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "❌ Failed to send OTP"
            ]);
        }
    }
    public function verify_credentials()
    {
        $otp = $this->input->post('otp');
        $session_id = $this->input->post('session_id');
        $phone = $this->input->post('phone');
        $name = $this->input->post('name'); // Only for new users

        // Verify OTP
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/VERIFY/{$session_id}/{$otp}";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            $user = $this->usermodel->get_user_by_email('user_table', $phone);

            if (!$user) {
                // Create new user
                $this->db->insert('user_table', [
                    'fname' => $name,
                    'mobile' => $phone,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                $user_id = $this->db->insert_id();
                $user = $this->db->where('user_id', $user_id)->get('user_table')->row();
            }

            // Set session
            $this->session->set_userdata([
                'user_id' => $user->user_id,
                'mobile' => $user->mobile,
                'fname' => $user->fname
            ]);

            // Fetch address
            $fetch_address = $this->usermodel->fetch_all_address('user_address', $user->user_id);

            if (!empty($fetch_address)) {
                echo json_encode([
                    'status' => 'valid',
                    'message' => 'address existed',
                    'data' => $fetch_address
                ]);
            } else {
                echo json_encode([
                    'status' => 'valid',
                    'message' => 'address not existed'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "❌ Invalid OTP"
            ]);
        }
    }

    public function selected_address()
    {
        $address_id = $this->input->post('address_id');
        if ($address_id) {
            $this->session->set_userdata('selected_address_id', $address_id);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Address ID missing']);
        }
    }

    public function DeleteAccount()
    {
        $this->load->view('header.php');
        $this->load->view('delete_user_account.php');
        $this->load->view('footer.php');
    }
    public function DeleteUserAccount()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if (!empty($email && $password)) {
            $user_exist = $this->usermodel->verify_for_delete_user($email, $password);
            if ($user_exist) {
                $data = array(
                    'account_status' => 'Deleted'
                );
                $delete_user = $this->usermodel->delete_user('user_table', $email, $data);
                if ($delete_user) {
                    $this->session->set_flashdata('success', 'Account Deleted Successfully!');
                    redirect('support/delete-account');
                } else {
                    $this->session->set_flashdata('error', 'Something Went Wrong Try Again!');
                    redirect('support/delete-account');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
                redirect('support/delete-account');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Enter A Valid Emial or Password');
            redirect('support/delete-account');
        }
    }

    public function otp_panel()
    {
        $this->load->view('test_otp', ['session_id' => '', 'message' => '', 'show_otp_form' => false, 'phone' => '']);
    }

    public function send_otp()
    {
        $phone = $this->input->post('phone');

        // Validate mobile number
        if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '❌ Invalid phone number. Please enter a valid 10-digit number.'
                ]));
        }

        // Check if phone number already exists
        $exists = $this->db->where('mobile', $phone)->get('user_table')->num_rows();

        if ($exists > 0) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '⚠️ This mobile number is already registered.'
                ]));
        }

        // Proceed to send OTP via 2Factor
        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/{$phone}/AUTOGEN/OTP1";
        $response = file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'session_id' => $result['Details'],
                    'message' => "✅ OTP sent to {$phone}"
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => "❌ Failed to send OTP: " . ($result['Details'] ?? 'Unknown error')
                ]));
        }
    }



    public function verify_otp()
    {
        $otp = $this->input->post('otp');
        $session_id = $this->input->post('session_id');

        $url = "https://2factor.in/API/V1/{$this->api_key}/SMS/VERIFY/{$session_id}/{$otp}";
        $response = @file_get_contents($url);
        $result = json_decode($response, true);

        if (!empty($result['Status']) && $result['Status'] === 'Success') {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => "✅ OTP verified successfully!"
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => "❌ Invalid OTP. Please try again."
                ]));
        }
    }

    public function get_cart_count()
    {
        $this->load->library('cart');
        $count = $this->cart->total_items();

        echo json_encode(['count' => $count]);
    }
}
