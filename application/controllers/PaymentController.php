<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhonePe\payments\v2\standardCheckout\StandardCheckoutClient;
use PhonePe\payments\v2\models\request\builders\StandardCheckoutPayRequestBuilder;
use PhonePe\payments\v2\models\request\builders\StandardCheckoutRefundRequestBuilder;
use PhonePe\Env;

class PaymentController extends CI_Controller
{

    private $client;

    public function __construct()
    {
        parent::__construct();
        // if(!$this->session->userdata('email'))
        // {
        //     redirect('/');
        // }

        require_once(APPPATH . '../vendor/autoload.php');

        // Load your credentials from config or hardcoded
        // $merchantOrderId = "ORDER_" . time();
        $clientId      = 'SU2506031142531039239175';
        $clientSecret  = '0f0dbd9d-0d6d-46c0-ba46-e85a4bc65b66';
        $clientVersion = 1;

        // Singleton client init
        if ($this->client === null) {
            $this->client = StandardCheckoutClient::getInstance(
                $clientId,
                $clientVersion,
                $clientSecret,
                Env::PRODUCTION
            );
        }
    }
    public function initiate_payment()
    {
        $merchantOrderId = "ORDER_" . time(); // Unique order ID
        // $amount = $this->get_amount();
        $amount = 100;
        // $redirectUrl = base_url('PaymentController/payment_redirect?merchantOrderId=' . $merchantOrderId);
        $redirectUrl = 'https://ambrosiaayurved.in/PaymentController/insert_order?merchantOrderId=' . $merchantOrderId;
        $message = "Test order payment";

        try {
            // Build the payment request
            $payRequest = StandardCheckoutPayRequestBuilder::builder()
                ->merchantOrderId($merchantOrderId)
                ->amount($amount)
                ->redirectUrl($redirectUrl)
                ->message($message)
                ->build();

            // Call the pay() method to initiate payment
            $payResponse = $this->client->pay($payRequest);

            if ($payResponse->getState() === "PENDING") {

                redirect($payResponse->getRedirectUrl());
            } else {
                echo "Payment initiation failed: " . $payResponse->getState();
            }
        } catch (\PhonePe\common\exceptions\PhonePeException $e) {
            echo "Error initiating payment: " . $e->getMessage();
        }
    }

    public function status()
    {
        $this->load->model('Payment_model');
        $merchantOrderId = $this->input->get('merchantOrderId');
        $get_status = $this->Payment_model->get_payment_status($merchantOrderId);
        $status = $get_status[0]->status;
        if ($status === 'COMPLETED') {
            $this->insert_order();
        } else {
            redirect('failure');
        }
    }


    public function callback()
    {
        $this->load->model('Payment_model');

        define('PHONEPE_WEBHOOK_USERNAME', 'AmbrosiaAyurved');
        define('PHONEPE_WEBHOOK_PASSWORD', 'Ambrosia123');

        function getExpectedAuthHeader($username, $password)
        {
            return hash('sha256', $username . ':' . $password);
        }

        $headers = getallheaders();
        $headers['Authorization'] = "3135735958ebcdc28a3e6665699d09ea5645fbca17db5ed7374fa4f5be0ecbee";
        $incomingAuth = $headers['Authorization'] ?? $headers['authorization'] ?? null;
        $expectedAuth = getExpectedAuthHeader(PHONEPE_WEBHOOK_USERNAME, PHONEPE_WEBHOOK_PASSWORD);

        if (!$incomingAuth || trim($incomingAuth) !== $expectedAuth) {
            file_put_contents(APPPATH . 'logs/webhook_auth.log', "Auth failed\n", FILE_APPEND);
            http_response_code(403);
            exit('Invalid or missing Authorization');
        }

        $rawPayload = file_get_contents('php://input');
        file_put_contents(APPPATH . 'logs/debug_raw.log', $rawPayload, FILE_APPEND);

        $payload = json_decode($rawPayload, true);
        file_put_contents(APPPATH . 'logs/debug.log', "Decoded:\n" . print_r($payload, true), FILE_APPEND);


        $paymentData = $payload['payload'] ?? null;
        $orderState = $paymentData['state'] ?? null;

        // Only continue if state is COMPLETED or FAILED
        if ($orderState === 'COMPLETED' || $orderState === 'FAILED') {
            file_put_contents(
                APPPATH . 'logs/phonepe_check.log',
                date('Y-m-d H:i:s') . " | State: $orderState | Full: " . json_encode($payload) . "\n\n",
                FILE_APPEND
            );
            $url = site_url('PaymentController/saved_payment_data'); // No base_url here
            $headers = ['Content-Type: application/json'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paymentData));

            $response = curl_exec($ch);

            if ($response === false) {
                $error = curl_error($ch);
                file_put_contents(APPPATH . 'logs/curl_error.log', "cURL Error: $error\n", FILE_APPEND);
            } else {
                file_put_contents(APPPATH . 'logs/internal_api_response.log', $response . "\n", FILE_APPEND);
            }

            curl_close($ch);

            http_response_code(200);
            echo ($orderState === 'COMPLETED') ? 'Payment success' : 'Payment failed';
        }
    }

    public function saved_payment_data()
    {

        $this->load->model('Payment_model');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        //    $data['user_id'] = $this->session->userdata('user_id');
        // $data = [
        //     'user_id' => $this->session->userdata('user_id'),
        // ];
        // Logging
        file_put_contents(APPPATH . 'logs/.saved_payment_datalog.log', print_r($data, true), FILE_APPEND);

        // Store in DB
        if (!empty($data)) {
            file_put_contents(APPPATH . 'logs/insert_data_debug.log', "Inserting...\n", FILE_APPEND);
            $this->Payment_model->insert_payment_data($data);
        }

        echo json_encode(['status' => 'received', 'success' => true]);
    }

    public function get_amount()
    {
        $this->load->model('Order_model');
        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

        $total = 0;

        foreach ($cart_items as $item) {
            $product = $this->Order_model->get_the_product_by_id($item['product_id']);
            if ($product) {
                $price = (float)$product->price;
                $quantity = (int)$item['quantity'];
                $total += $price * $quantity;
            }
        }
        return $total * 100;
    }

    public function insert_order()
    {
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('usermodel');
        $this->load->model('Payment_model');
        $this->load->model('Order_model');

        $merchantOrderId = $this->input->get('merchantOrderId');
        $get_status = $this->Payment_model->get_payment_status($merchantOrderId);
        $status = $get_status[0]->status ?? null;

        if ($status !== 'COMPLETED') {
            redirect('failure');
            return;
        }

        file_put_contents(APPPATH . 'logs/Check_pmnt_status.log', print_r($status, true), FILE_APPEND);

        $user_id = $this->session->userdata('user_id');
        $address_id = $this->session->userdata('selected_address_id');
        $user_address = $this->usermodel->fetch_user_address_by_address_id($address_id);
        $user_info = $user_id ? $this->usermodel->get_user_by_id('user_table', $user_id) : null;

        $buy_now_cookie = get_cookie('buy_now');
        $cart_cookie = get_cookie('cart');
        $cart_items = [];

        if (!empty($buy_now_cookie)) {
            $item = json_decode($buy_now_cookie, true);
            if (is_array($item) && isset($item['product_id'])) {
                $cart_items[] = $item;
            }
        } elseif (!empty($cart_cookie)) {
            $cart_items = json_decode($cart_cookie, true);
        }

        file_put_contents(APPPATH . 'logs/Check_cart_data_after_payment.log', print_r($cart_items, true), FILE_APPEND);

        $this->session->set_userdata(['merchantOrderId' => $merchantOrderId]);

        $subtotal = 0;
        foreach ($cart_items as $item) {
            if (!isset($item['product_id'])) continue;

            $product_price = isset($item['pack_price']) ? (float)$item['pack_price'] : (float)$item['price'];
            $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
            $subtotal += $product_price * $quantity;

            $order_data = [
                'user_id'          => $user_id,
                'product_id'       => $item['product_id'],
                'order_id'         => $merchantOrderId,
                'pack_id'          => $item['pack_id'] ?? null,
                'address_id'       => $address_id,
                'product_price'    => $product_price,
                'product_quantity' => $quantity,
                'total_price'      => $product_price * $quantity,
                'created_at'       => date('Y-m-d H:i:s'),
            ];

            $insert_id = $this->usermodel->insert_order_data('order_table', $order_data);
            file_put_contents(APPPATH . 'logs/eror_insert.log', print_r($insert_id, true), FILE_APPEND);

            if (!$insert_id) {
                echo "Order insertion failed!";
                return;
            }
        }

        $orderData = [
            'order_id'       => $merchantOrderId,
            'fname'          => $user_address->fname ?? '',
            'lname'          => $user_address->lname ?? '',
            'email'          => $user_info->email ?? '',
            'phone'          => $user_info->mobile ?? '',
            'address'        => $user_address->address ?? '',
            'city'           => $user_address->city ?? '',
            'state'          => $user_address->state ?? '',
            'pincode'        => $user_address->pincode ?? '',
            'country'        => $user_address->country ?? 'India',
            'payment_method' => 'Prepaid',
            'product_data'   => json_encode($cart_items),
            'subtotal'       => $subtotal,
        ];

        $this->usermodel->create_order_data('create_order_data', $orderData);
        redirect('shiprocket');
        // ✅ Load and call Tracking controller manually
        // require_once(APPPATH . 'controllers/Tracking.php');
        // $tracking = new Tracking(true); // ✅ internal call mode
        // $tracking->create_order($orderData);
    }



    public function view_cart()
    {
        $this->load->model('Order_model');

        $buy_now = $this->input->cookie('buy_now', TRUE);
        $cart_cookie = $this->input->cookie('cart', TRUE);

        $detailed_cart = [];

        if (!empty($buy_now)) {
            // Buy Now - Single product
            $item = json_decode($buy_now, true);

            if (is_array($item) && isset($item['product_id'])) {
                $product = $this->Order_model->get_the_product_by_id($item['product_id']);
                if ($product) {
                    $detailed_cart[] = [
                        'product_id' => $item['product_id'],
                        'product_name' => $product->product_name,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                        'subtotal' => $item['price'] * $item['quantity'],
                        'image' => $item['image'] ?? '',
                    ];
                }
            }
        } elseif (!empty($cart_cookie)) {
            // Cart - Multiple products
            $cart_items = json_decode($cart_cookie, true);

            if (is_array($cart_items)) {
                foreach ($cart_items as $key => $item) {
                    if (!isset($item['product_id'])) continue;

                    $product = $this->Order_model->get_the_product_by_id($item['product_id']);
                    if ($product) {
                        $detailed_cart[] = [
                            'product_id' => $item['product_id'],
                            'product_name' => $product->product_name,
                            'price' => $item['price'],
                            'quantity' => $item['quantity'],
                            'subtotal' => $item['price'] * $item['quantity'],
                            'image' => $item['image'] ?? '',
                        ];
                    }
                }
            }
        }

        echo "<pre>";
        print_r($detailed_cart);
        echo "</pre>";
    }
}
