<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Razorpay\Api\Api;

class Razorpay extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('usermodel');

    }

    public function index($order_id = null) {
        $data['order_id'] = $order_id;
        $this->load->view('razorpay_payment', $data); // View with Razorpay button
    }

    public function create_order() {
     

        header('Content-Type: application/json'); // Make sure response is JSON

        require_once(APPPATH . '../vendor/autoload.php');

        $api = new Api('rzp_test_J4DBKJFYTiyeCf', 'AAbHCSGlDA2T2ftj8EexinK9');

        // Get order ID from frontend
        // $your_order_id = $this->input->post('your_order_id');
        // $your_order_id="604";
        $amount = $this->count_product_item(); // in paise
        $real_amount=$amount/100;
        try {
            $orderData = [
                // 'receipt' => $your_order_id,
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1
            ];

            $razorpayOrder = $api->order->create($orderData);
            // Save to database if needed
            // $this->Order_model->save_razorpay_order($your_order_id, $razorpayOrder['id']);

            $payment_data=array(
                'razorpay_order_id'=>$razorpayOrder['id'],
                'amount'=>$real_amount,
            );
            $this->session->set_userdata($payment_data);

            $response = [
                'order_id' => $razorpayOrder['id'],
                'amount' => $amount // in paise
            ];
        
            echo json_encode($response);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function count_product_item() {
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
    
        return $total * 100; // Return in paisa (multiply ₹ to paise)
    }
    
}
