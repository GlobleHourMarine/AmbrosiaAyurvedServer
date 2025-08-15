<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

    private $token;
    // protected $CI;

    public function __construct()
    {
        // if (!$internal_call) {
            parent::__construct();
            // $this->CI =& get_instance();
            $this->load->helper('url');
            $this->load->model('Order_model');
            $this->load->model('usermodel');

            $this->load->model('tracking_model');
            $this->load->library('session');

            $this->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjY4NTkzMDcsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzU0ODk3ODQ5LCJqdGkiOiJFMGNDY1dHR3p1SW14cEkzIiwiaWF0IjoxNzU0MDMzODQ5LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTc1NDAzMzg0OSwiY2lkIjo2NTE3MTM5LCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.J_Vh3SPuQGJZj78V-khDOYGYr3nRyvVzG2MRvqG8K44";

            // if (!$this->input->is_cli_request() && !$this->session->userdata('email')) {
            //     redirect(site_url('/'));
            //     exit;
            // }
        // }
    }

    // public function index() {

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS =>'{
    //         "email": "yogesh4java44@gmail.com",
    //         "password": "%&^#%RiqI29HYN^o"
    //     }',
    //     CURLOPT_HTTPHEADER => array(
    //         'Content-Type: application/json'
    //     ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     redirect('create-order');
    // }

    public function track_order()
    {
        $order_id = $this->session->userdata('merchantOrderId');
        file_put_contents(APPPATH . 'logs/Order_id_for_track_single_order.log', print_r($order_id, true), FILE_APPEND);
        $response['data'] = $this->tracking_model->fetch_track_data('track_order', $order_id);
        file_put_contents(APPPATH . 'logs/Fetched_data_foe_single_order_user.log', print_r($response, true), FILE_APPEND);
        $this->load->view('track_order.php', $response);
    }

    public function view_cart()
    {
        $this->load->model('Order_model');
        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];
        echo "<pre>";
        print_r($cart_items);
        echo "</pre>";
        $detailed_cart = [];

        foreach ($cart_items as $item) {
            $product = $this->Order_model->get_the_product_by_id($item['product_id']);
            if ($product) {
                $detailed_cart[] = [
                    'product_id' => $item['product_id'],
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->price * $item['quantity'],
                ];
            }
        }
    }

    public function create_order($data = null)
    {
        $order_id = $this->session->userdata('merchantOrderId');
        $data=$this->usermodel->fetch_order_data_for_shiprocket('create_order_data',$order_id);

        file_put_contents(APPPATH . 'logs/create_order_data_from_tracking_data.log', print_r($data, true), FILE_APPEND);

        $data['product_data']=json_decode($data['product_data']);
        file_put_contents(APPPATH . 'logs/Decoded_data_of_cart_data.log', print_r($data['product_data'], true), FILE_APPEND);
        $order_items = [];

        if (!empty($data['product_data']) && is_object($data['product_data'])) {
            $product_data_array = json_decode(json_encode($data['product_data']), true); // convert object to array

            foreach ($product_data_array as $item) {
                $order_items[] = [
                    "name" => $item['name'],
                    "sku" => "sku_" . $item['product_id'],
                    "units" => (int)$item['quantity'],
                    "selling_price" => (float)$item['price'],
                    "discount" => 0,
                    "tax" => 0,
                    "hsn" => "441122"
                ];
            }

        }

        file_put_contents(APPPATH . 'logs/verify_shiproket.log', print_r($order_items, true), FILE_APPEND);
        file_put_contents(APPPATH . 'logs/verify_data.log', print_r($data, true), FILE_APPEND);

        // echo "<pre>";
        // print_r($order_items);
        // print_r($data);
        
        // die();

        $payload = [
            "order_id" => $data['order_id'],
            "order_date" => date('Y-m-d H:i:s'),
            "pickup_location" => "warehouse",
            "comment" => "Ambrosia Ayurved",
            "billing_customer_name" => $data['fname'],
            "billing_last_name" => $data['lname'],
            "billing_address" => $data['address'],
            "billing_address_2" => " ",
            "billing_city" => $data['city'],
            "billing_pincode" => $data['pincode'],
            "billing_state" => $data['state'],
            "billing_country" => $data['country'],
            "billing_email" => $data['email'],
            "billing_phone" => $data['phone'],
            "shipping_is_billing" => true,
            "shipping_customer_name" => "",
            "shipping_last_name" => "",
            "shipping_address" => "",
            "shipping_address_2" => "",
            "shipping_city" => "",
            "shipping_pincode" => "",
            "shipping_country" => "",
            "shipping_state" => "",
            "shipping_email" => "",
            "shipping_phone" => "",
            "order_items" => $order_items,
            "payment_method" => $data['payment_method'] ?? "Prepaid",
            "shipping_charges" => 0,
            "giftwrap_charges" => 0,
            "transaction_charges" => 0,
            "total_discount" => 0,
            "sub_total" => $data['subtotal'],
            "length" => 2,
            "breadth" => 2,
            "height" => 2,
            "weight" => 0.1
        ];
        file_put_contents(APPPATH . 'logs/payload_data_form_payment_controller.log', print_r($payload, true), FILE_APPEND);


        file_put_contents(APPPATH . 'logs/Generated_Token.log', print_r($this->token, true), FILE_APPEND);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->token
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $response_data = json_decode($response, true);

        file_put_contents(APPPATH . 'logs/Response_from_cerate_order_function.log', print_r($response_data, true), FILE_APPEND);
        if (!empty($response_data['shipment_id'])) {
            $awbResponse = $this->create_awb($response_data['shipment_id']);
            file_put_contents(APPPATH . 'logs/Create_AWB_token.log', print_r($awbResponse, true), FILE_APPEND);

            if (isset($awbResponse['awb_assign_status']) && $awbResponse['awb_assign_status'] === 1) {
                $awb_code = $awbResponse['response']['data']['awb_code'];
                $pickup_response = $this->request_for_shipment($response_data['shipment_id']);
                file_put_contents(APPPATH . 'logs/Check_request_for_shipment.log', print_r($pickup_response, true), FILE_APPEND);

                if (isset($pickup_response['pickup_status']) && $pickup_response['pickup_status'] === 1) {
                    $tracking_response = $this->tracking_through_awb($awb_code);
                    file_put_contents(APPPATH . 'logs/tracking_details.log', print_r($tracking_response, true), FILE_APPEND);

                    if (!empty($tracking_response)) {
                        $this->save_tracking_data_in_database($tracking_response);
                        return;
                    }
                } else {
                    echo json_encode([
                        'error' => 'Pickup Failed',
                        'response' => $pickup_response
                    ]);
                    return;
                }
            } else {
                echo json_encode([
                    'error' => 'AWB not assigned',
                    'message' => $awbResponse['response']['message'] ?? 'AWB could not be assigned.',
                    'response' => $awbResponse
                ]);
                return;
            }
        } else {
            echo json_encode([
                'error' => 'Order creation failed',
                'message' => $response_data['message'] ?? 'Unknown error during order creation.',
                'response' => $response_data
            ]);
            return;
        }
    }


    public function create_awb($shipment_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/assign/awb',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(["shipment_id" => $shipment_id]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer' . $this->token,
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function request_for_shipment($shipment_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/generate/pickup',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(["shipment_id" => $shipment_id]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer' . $this->token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    public function tracking_through_awb($awb_code)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/track/awb/' . $awb_code,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer' . $this->token,
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function save_tracking_data_in_database($tracking_response)
    {
        $order_id = $this->session->userdata('merchantOrderId');

        $data = [
            'order_id'             => $order_id,
            'awb_code'             => $tracking_response['tracking_data']['shipment_track'][0]['awb_code'],
            'shiprocket_order_id'  => $tracking_response['tracking_data']['shipment_track'][0]['order_id'],
            'shipment_id'          => $tracking_response['tracking_data']['shipment_track'][0]['shipment_id'],
            'courier_company'      => $tracking_response['tracking_data']['shipment_track'][0]['courier_name'],
            'expected_delivery_date' => $tracking_response['tracking_data']['shipment_track'][0]['edd'],
            'track_status'         => $tracking_response['tracking_data']['track_status'],
            'current_status'       => $tracking_response['tracking_data']['shipment_track'][0]['current_status'],
        ];
        file_put_contents(APPPATH . 'logs/Save_tracking_data_in_database_log_file.log', print_r($data, true), FILE_APPEND);

        $res = $this->tracking_model->save_awb_number('track_order', $data);

        if ($res) {
            redirect('track-order');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect('track-order');
        }
    }
    public function update_tracking_status()
    {
        $orders = $this->tracking_model->get_all_orders('track_order');
        file_put_contents(APPPATH . 'logs/All_orders_for_update_tracking_data.log', print_r($orders, true), FILE_APPEND);

        if ($orders) {
            foreach ($orders as $order) {
                $awb_code = $order['awb_code'];
                $tracking_response = $this->tracking_through_awb($awb_code);
                if (!empty($tracking_response['tracking_data']['shipment_track'])) {
                    $data = [
                        'order_id' => $order['order_id'],
                        'awb_code' => $tracking_response['tracking_data']['shipment_track'][0]['awb_code'],
                        'shiprocket_order_id' => $tracking_response['tracking_data']['shipment_track'][0]['order_id'],
                        'shipment_id' => $tracking_response['tracking_data']['shipment_track'][0]['shipment_id'],
                        'courier_company' => $tracking_response['tracking_data']['shipment_track'][0]['courier_name'],
                        'expected_delivery_date' => $tracking_response['tracking_data']['shipment_track'][0]['edd'],
                        'track_status' => $tracking_response['tracking_data']['track_status'],
                        'current_status' => $tracking_response['tracking_data']['shipment_track'][0]['current_status'],
                    ];
                    $this->tracking_model->update_tracking_data('track_order', $data, $order['order_id']);
                }
                file_put_contents(APPPATH . 'logs/tracking_update.log', date('Y-m-d H:i:s') . " - AWB: $awb_code - " . print_r($tracking_response, true) . PHP_EOL, FILE_APPEND);
            }
            // echo json_encode(['status' => 'success', 'data' => $data, 'message' => 'Tracking status updated for all orders']);
        }
        // else {
        //     echo json_encode(['status' => 'error', 'message' => 'No orders found in track_order table']);
        // }
    }
}
