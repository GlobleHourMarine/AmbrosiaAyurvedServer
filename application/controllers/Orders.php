<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('admin_model');
    }
    public function order($offset = 0)
    {
        $user_id = $this->session->userdata('user_id');
        $per_page = 5;

        $this->load->library('pagination');

        // Total number of user orders
        $total_rows = $this->order_model->count_user_orders($user_id);

        $config = [
            'base_url' => base_url('order'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'uri_segment' => 2,
            'use_page_numbers' => false,

            'full_tag_open' => '<ul class="pagination justify-content-center">',
            'full_tag_close' => '</ul>',

            'first_link' => 'First',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',

            'last_link' => 'Last',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',

            'next_link' => '&raquo;',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',

            'prev_link' => '&laquo;',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',

            'cur_tag_open' => '<li class="page-item active"><a href="#" class="page-link">',
            'cur_tag_close' => '</a></li>',

            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',

            'attributes' => ['class' => 'page-link']
        ];

        $this->pagination->initialize($config);

        // Fetch orders with pagination
        $res = $this->order_model->fetch_order_data($user_id, $per_page, $offset);

        $data = [
            'orders' => $res['orders'] ?? [],
            'stats'  => $res['stats'] ?? (object)[
                'total_orders' => 0,
                'pending_orders' => 0,
                'delivered_orders' => 0,
                'processing_orders' => 0,
                'shipped_orders' => 0
            ],
            'pagination_links' => $this->pagination->create_links()
        ];

        $this->load->view('../views/header.php');
        $this->load->view('../views/order_history.php', $data);
    }

    public function new_cart_page()
    {
        $this->load->helper('cookie');

        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];
        $data['is_guest'] = true;

        $detailed_cart = [];

        foreach ($cart_items as $item) {
            $product_data = $this->order_model->get_the_product_by_id2($item['product_id'], 'product_table');

            if ($item['pack_id'] != 0) {
                $pack_data = $this->order_model->get_the_product_id($item['pack_id'], 'tbl_pack');

                if ($pack_data && $product_data) {
                    $pack_data->quantity = $item['quantity'];
                    $pack_data->cart_token = $item['cart_token'];
                    $pack_data->product_id = $item['product_id'];
                    $pack_data->is_pack = true;
                    $pack_data->product_data = $product_data; // Optional reference
                    $product_data->product_name = $product_data->product_name;
                    $detailed_cart[] = $pack_data;
                }
            } else {
                if ($product_data) {
                    $product_data->quantity = $item['quantity'];
                    $product_data->cart_token = $item['cart_token'];
                    $product_data->is_pack = false;
                    $product_data->price = $item['pack_price']; // price sent via form
                    $product_data->product_name = $product_data->product_name;
                    $detailed_cart[] = $product_data;
                }
            }
        }

        $data['cart_data'] = $detailed_cart;
        // $this->load->view('../views/header.php');
        $this->load->view('../views/cart.php', $data);
    }
    // public function new_cart_page()
    // {
    //     $this->load->helper('cookie');
    //     $cookie_cart = get_cookie('guest_cart');
    //     $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

    //     $detailed_cart = [];
    //     $total_price = 0;
    //     $total_items = 0;

    //     foreach ($cart_items as $item) {
    //         $product_data = $this->order_model->get_the_product_by_id2($item['product_id'], 'product_table');

    //         if ($product_data) {
    //             $item_total = $item['quantity'] * $item['pack_price'];
    //             $total_price += $item_total;
    //             $total_items += $item['quantity'];

    //             $detailed_cart[] = [
    //                 'rowid' => $item['cart_token'],
    //                 'id' => $item['product_id'],
    //                 'name' => $product_data->product_name,
    //                 'qty' => $item['quantity'],
    //                 'price' => $item['pack_price'],
    //                 'image_url' => !empty($product_data->image) ? base_url('uploads/products/' . $product_data->image) : base_url('assets/images/no-image.png'),
    //                 'subtotal' => $item_total
    //             ];
    //         }
    //     }

    //     // Return as JSON
    //     header('Content-Type: application/json');
    //     // echo json_encode([
    //     //     'success' => true,
    //     //     'items' => $detailed_cart,
    //     //     'total_price' => $total_price,
    //     //     'total_items' => $total_items
    //     // ]);
    //     // exit;
    // }

    public function remove_from_cart()
    {
        $this->load->helper('cookie');
        $rowid = $this->input->post('rowid');

        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

        // Remove item with matching cart_token
        $cart_items = array_filter($cart_items, function ($item) use ($rowid) {
            return $item['cart_token'] !== $rowid;
        });

        set_cookie('guest_cart', json_encode(array_values($cart_items)), 86400 * 30);

        echo json_encode(['success' => true]);
        exit;
    }

    public function update_cart_item()
    {
        $this->load->helper('cookie');
        $rowid = $this->input->post('rowid');
        $qty = (int)$this->input->post('qty');

        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

        foreach ($cart_items as &$item) {
            if ($item['cart_token'] === $rowid) {
                $item['quantity'] = $qty;
                break;
            }
        }

        set_cookie('guest_cart', json_encode($cart_items), 86400 * 30);

        echo json_encode(['success' => true]);
        exit;
    }

    public function get_cart_count()
    {
        $this->load->helper('cookie');
        $cookie_cart = get_cookie('guest_cart');
        $cart_items = $cookie_cart ? json_decode($cookie_cart, true) : [];

        $count = 0;
        foreach ($cart_items as $item) {
            $count += $item['quantity'];
        }

        echo json_encode(['count' => $count]);
        exit;
    }
    public function user_information()
    {
        $buy_now = $this->input->cookie('buy_now', TRUE);
        $cart_cookie = $this->input->cookie('cart', TRUE);

        $data['is_guest'] = true;
        $detailed_cart = [];

        // 🛒 Buy Now Flow
        if (!empty($buy_now)) {
            $item = json_decode($buy_now, true);

            $product_id = $item['product_id'] ?? null;
            $quantity   = $item['quantity'] ?? 1;
            $price      = $item['price'] ?? 0;

            if (!empty($item['pack_id'])) {
                // Pack item
                $pack_data    = $this->order_model->get_the_product_id($item['pack_id'], 'tbl_pack');
                $product_data = $this->order_model->get_the_product_by_id2($product_id, 'product_table');

                if ($pack_data && $product_data) {
                    $pack_data->quantity      = $quantity;
                    $pack_data->cart_token    = '';
                    $pack_data->product_id    = $product_id;
                    $pack_data->is_pack       = true;
                    $pack_data->product_data  = $product_data;
                    $pack_data->price         = $price;
                    $detailed_cart[]          = $pack_data;
                }
            } else {
                // Normal product
                $product_data = $this->order_model->get_the_product_by_id2($product_id, 'product_table');
                if ($product_data) {
                    $product_data->quantity   = $quantity;
                    $product_data->cart_token = '';
                    $product_data->is_pack    = false;
                    $product_data->price      = $price;
                    $detailed_cart[]          = $product_data;
                }
            }
        }

        // 🧺 Cart Flow (multiple items)
        elseif (!empty($cart_cookie)) {
            $cart_items = json_decode($cart_cookie, true);

            foreach ($cart_items as $key => $item) {
                $quantity = $item['quantity'] ?? 1;
                $price    = $item['price'] ?? 0;
                $pack_id  = $item['pack_id'] ?? null;
                $product_id = $item['product_id'] ?? $key; // fallback

                if (!empty($pack_id)) {
                    $pack_data    = $this->order_model->get_the_product_id($pack_id, 'tbl_pack');
                    $product_data = $this->order_model->get_the_product_by_id2($product_id, 'product_table');

                    if ($pack_data && $product_data) {
                        $pack_data->quantity      = $quantity;
                        $pack_data->cart_token    = '';
                        $pack_data->product_id    = $product_id;
                        $pack_data->is_pack       = true;
                        $pack_data->product_data  = $product_data;
                        $pack_data->price         = $price;
                        $detailed_cart[]          = $pack_data;
                    }
                } else {
                    $product_data = $this->order_model->get_the_product_by_id2($product_id, 'product_table');
                    if ($product_data) {
                        $product_data->quantity   = $quantity;
                        $product_data->cart_token = '';
                        $product_data->is_pack    = false;
                        $product_data->price      = $price;
                        $detailed_cart[]          = $product_data;
                    }
                }
            }
        }

        $data['cart_data'] = $detailed_cart;

        $this->load->view('../views/header.php');
        $this->load->view('user_information.php', $data);
        $this->load->view('../views/footer.php');
    }

    public function save_address()
    {
        $this->load->helper('security');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('pincode', 'PIN Code', 'required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('addressType', 'Address Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        $data = [
            'user_id'     => $this->session->userdata('user_id'), // assuming login
            'fname'  => $this->input->post('first_name', true),
            'lname'   => $this->input->post('last_name', true),
            'mobile'       => $this->input->post('phone', true),
            'address'     => $this->input->post('address', true),
            'city'        => $this->input->post('city', true),
            'district'    => $this->input->post('district', true),
            'state'       => $this->input->post('state', true),
            'country'     => $this->input->post('country', true),
            'pincode'     => $this->input->post('pincode', true),
            'address_type' => $this->input->post('addressType', true),
        ];
        $saved = $this->order_model->insert_address($data);

        if ($saved) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save address']);
        }
    }
    public function test_insert()
    {
        $data = [
            'user_id' => 10046,
            'fname' => 'Test',
            'lname' => 'User',
            'mobile' => '9999999999',
            'address' => 'Test Address',
            'city' => 'Test City',
            'district' => 'Test District',
            'state' => 'Test State',
            'country' => 'India',
            'pincode' => '123456',
            'address_type' => 'home',
        ];

        $this->load->model('order_model');
        if ($this->order_model->insert_address($data)) {
            echo "Insert Success";
        } else {
            echo "Insert Failed";
            print_r($this->db->error());
        }
    }
}
