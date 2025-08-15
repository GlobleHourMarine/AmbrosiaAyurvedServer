<?php
class Shiprocket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Shiprocket_model');
    }

    public function place_order() {
        $orderData = [
            "order_id" => "ORDER" . time(),
            "order_date" => date('Y-m-d'),
            "pickup_location" => "Primary",
            "billing_customer_name" => "John",
            "billing_last_name" => "Doe",
            "billing_address" => "123 Main St",
            "billing_city" => "Delhi",
            "billing_pincode" => "110001",
            "billing_state" => "Delhi",
            "billing_country" => "India",
            "billing_email" => "john@example.com",
            "billing_phone" => "9999999999",
            "order_items" => [
                [
                    "name" => "T-shirt",
                    "sku" => "SKU123",
                    "units" => 1,
                    "selling_price" => 500
                ]
            ],
            "payment_method" => "Prepaid",
            "shipping_charges" => 50,
            "sub_total" => 500,
            "length" => 10,
            "breadth" => 10,
            "height" => 10,
            "weight" => 1
        ];

        echo "<pre>";
        print_r($orderData);
        die();

        $result = $this->Shiprocket_model->create_order($orderData);
        echo "<pre>";
        print_r($result);
    }

    public function track($awb) {
        $result = $this->Shiprocket_model->track_order($awb);
        echo "<pre>";
        print_r($result);
    }

    public function cancel($order_id) {
        $result = $this->Shiprocket_model->cancel_order($order_id);
        echo "<pre>";
        print_r($result);
    }
}

?>