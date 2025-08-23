<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ambrosia_main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
        $this->load->model('admin_model');
        $this->load->model('alternative_model');
        // $this->load->library('session');
    }


    public function test_page(){

    // ---------- Deleted Views ----------
    // $this->load->view('../views/test_otp.php');
    // $this->load->view('../views/payment_failure.php');
    // $this->load->view('../views/add_coupon.php');
    // $this->load->view('../views/order_place.php');
    // $this->load->view('../views/demo_login.php'); // temporary
    // $this->load->view('../views/my_cart.php');
    // $this->load->view('../views/cart.php');
    // $this->load->view('../views/paymentdone.php');
    // $this->load->view('../views/benefit.php');
    // $this->load->view('../views/benefits.php');






    
    // ---------- Not Needed (for now) ----------
    // $this->load->view('../views/forgotpassword.php');
    // $this->load->view('../views/verifyotp.php');
    // $this->load->view('../views/setpassword.php');
    // $this->load->view('../views/ReviewPage.html');
    // $this->load->view('../views/delete_user_account.php');
    // $this->load->view('../views/register.php');
    // $this->load->view('../views/reviews.php'); // description page




    // ---------- Currently Important ----------
    // $this->load->view('../views/description.php');
    // $this->load->view('../views/user_information.php');


}
    public function free_diagnosis(){
        $this->load->view('../views/freediagnosis.html');
    }
    public function test_diagnosis(){
        $this->load->view('../views/Diagnosis.html');
    }

    public function language()
    {
        $this->load->view('../views/language.php');
        //    
    }
    public function registerpage()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/register.php');
    }
      public function test_login()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/demo_login.php');
        $this->load->view('../views/footer.php');

    }
    public function order_without_register()
    {
        $user_id = $this->session->userdata('user_id');
        echo $user_id;
        if (empty($user_id)) {
            $this->session->set_flashdata('registermessage', 'Enter your details first for furthur process.');
            redirect('register');
        } else {
            $this->session->set_flashdata('message', 'Select your product and product quantity from here');
            redirect('all_products');
        }
    }
    public function loginpage()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/login.php');
        $this->load->view('../views/footer.php');

    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        $header_data['user'] = $this->usermodel->get_user_data_by_id($user_id);

        $header_data['custom_css'] = ['assets/css/home.css'];

        $page_data['banner'] = $this->admin_model->get_active_banners();

        $footer_data['custom_js'] = ['assets/js/home.js'];

        $this->load->view('header', $header_data);     // <head> + user + CSS
        $this->load->view('home', $page_data);         // main content (banners etc.)
        $this->load->view('footer', $footer_data);     // JS scripts
    }
    public function about_us()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/about_us.php');
        $this->load->view('../views/footer.php');
    }


    public function failure()
    {
        // $this->load->view('../views/header.php');
        $this->load->view('../views/payment_failure.php');
        // $this->load->view('../views/footer.php');
    }

    public function terms_conditions()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/terms_conditions.php');
        $this->load->view('../views/footer.php');
    }
    public function privacy_policy()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/privacy_policy.php');
        $this->load->view('../views/footer.php');
    }
    public function shipping_policy()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/shipping_policy.php');
        $this->load->view('../views/footer.php');
    }
    public function cancellation_policy()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/cancellation_policy.php');
        $this->load->view('../views/footer.php');
    }
    public function our_products()
    {
        $data['products'] = $this->admin_model->fetch_add_product_data();
        $this->load->view('../views/header.php');
        $this->load->view('../views/all_products.php', $data);
        $this->load->view('../views/our_services.php', $data);
        $this->load->view('../views/footer.php');
    }
    public function add_your_review()
    {
        $user_id = $this->session->userdata('user_id');
        $data['orders'] = $this->usermodel->fetch_order_data_by_id($user_id);
        $this->load->view('add_review.php', $data);
    }
    public function all_products()
    {
        $this->session->set_flashdata('message', 'Select your product and product quantity from here');
        $data['products'] = $this->admin_model->fetch_add_product_data();
        $this->load->view('../views/all_products.php', $data);
    }
    public function cart_data()
    {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            $user_id = $this->input->cookie('guest_user_id', TRUE);
        }
        $data['cart_data'] = $this->usermodel->fetch_all_cart_data('cart_table', $user_id);
        $this->load->view('../views/header.php');
        $this->load->view('../views/cart.php', $data);
    }

    public function contact_us()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/contact_us.php');
        $this->load->view('../views/footer.php');
    }
    public function payment()
    {

        $this->load->view('../views/header.php');
        $this->load->view('../views/payment_page.php');
    }

    public function apply_coupon()
    {
        date_default_timezone_set('Asia/Kolkata');
        $this->load->helper('cookie');

        $buy_now = $this->input->cookie('buy_now', TRUE);
        $cart_cookie = $this->input->cookie('cart', TRUE);

        $coupon_code = $this->input->post('coupon_code');
        $total_price = 0;

        // ✅ BUY NOW FLOW
        if (!empty($buy_now)) {
            $item = json_decode($buy_now, true);

            $product_id = $item['product_id'] ?? null;
            $quantity   = $item['quantity'] ?? 1;
            $price      = $item['price'] ?? 0;

            $total_price += ($price * $quantity);
        }

        // ✅ CART FLOW (multiple items)
        elseif (!empty($cart_cookie)) {
            $cart_items = json_decode($cart_cookie, true);

            foreach ($cart_items as $key => $item) {
                $quantity = $item['quantity'] ?? 1;
                $price    = $item['price'] ?? 0;

                $total_price += ($price * $quantity);
            }
        }

        // 🚫 No cart data found
        if ($total_price <= 0) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '❌ No valid cart data found to apply coupon.'
                ]));
        }

        // ✅ Fetch matching coupon by code
        $coupon_data = $this->admin_model->fetch_coupon_by_code('coupon_tbl', $coupon_code);

        if (empty($coupon_data)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '❌ Invalid or expired coupon code.'
                ]));
        }

        $coupon = $coupon_data[0];
        $discount = $coupon->discount;
        $expiry_date = $coupon->expiry_date;
        $current_date = date('Y-m-d');

        // ✅ Date comparison
        if ($current_date > $expiry_date) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => '❌ This coupon has expired.'
                ]));
        }

        // ✅ Calculate discount
        $coupon_discount = ($total_price * $discount) / 100;

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'success',
                'message' => '✅ Coupon Applied! Discount: ₹' . number_format($coupon_discount, 2),
                'discount_amount' => $coupon_discount,
                'cart_total' => $total_price,
                'discount_percent' => $discount
            ]));
    }

    public function edit_user_information()
    {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            $user_id = $this->input->cookie('guest_user_id', TRUE);
        }
        $data['cart_data'] = $this->usermodel->fetch_all_cart_data('cart_table', $user_id);
        $this->load->view('../views/header.php');
        $this->load->view('../views/edit_user_information.php', $data);
    }

    public function order_popup()
    {
        $user_id = $this->session->userdata('user_id');

        $res = $this->usermodel->fetch_order_data($user_id);
        $data = [
            'orders' => $res['orders'] ?? [],
            'stats'  => $res['stats'] ?? (object) [
                'total_orders' => 0,
                'pending_orders' => 0,
                'delivered_orders' => 0,
                'processing_orders' => 0
            ]
        ];
        $this->load->view('../views/order_history.php', $data);
    }
    public function VerifyOtpPage($user_id)
    {
        $data = array(
            'user_id' => $user_id
        );
        $this->load->view('../views/verify_otp.php', $data);
    }
    public function SetPassword($id)
    {
        $data = array(
            'id' => $id
        );
        $this->load->view('../views/setpassword.php', $data);
    }
    public function forgotPassword()
    {
        $this->load->view('../views/forgotpassword.php');
    }
    public function send_email()
    {
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->config->load('email', TRUE);
        $this->email->initialize($this->config->item('email'));
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('sub');
        $message = $this->input->post('message');
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            $this->session->set_flashdata('message', 'Please fill all the details!');
            $this->session->set_flashdata('message_type', 'error');
            redirect('contact_us');
        } else {
            $this->config->load('email'); // ✅ Load config file
            $this->email->initialize($this->config->item('email'));
            $this->email->from($email);
            $this->email->reply_to($email, $name);
            $this->email->to('care@ambrosiaayurved.in');
            $this->email->subject('New Query from Ambrosia Ayurved');
            $email_message = "
                <h2>Query Details</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            ";
            $this->email->message($email_message);
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Email sent successfully!');
                $this->session->set_flashdata('message_type', 'success');
                // echo "email send succesfukly";
                // die();
                redirect('contact_us');
            } else {
                log_message('error', $this->email->print_debugger()); // ✅ Log errors for debugging
                $this->session->set_flashdata('message', 'Failed to send email.');
                $this->session->set_flashdata('message_type', 'error');
                redirect('contact_us');
            }
        }
    }
    public function user_profile()
    {
        $this->load->view('header.php');
        $this->load->view('user_profile.php');
    }
    public function new_cart()
    {
        $this->load->view('cart.php');
    }
    public function check_path()
    {
        $this->load->view('check_path.php');
    }
    public function get_cart_count()
    {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            $user_id = $this->input->cookie('guest_user_id', TRUE);
        }
        if ($user_id) {
            $cart_count = $this->Usermodel->count_cart_items($user_id);
            echo $cart_count ? $cart_count : 0;  // Always return a number
        } else {
            echo 0;
        }
    }

    public function view($slug)
    {
        // print_r($slug);
        // die();
        $product_data = $this->usermodel->get_product_by_slug($slug);
        // echo "<pre>";
        // print_r($product_data);
        // die();

        if (!$product_data) {
            show_404(); // Return 404 if no product found
        }
        $product['product_data'] = $product_data;
        $product['pack'] = $this->usermodel->get_packs_by_product_id($product_data->product_id);
        $product['reviews'] = $this->usermodel->fetch_reviews_by_product($product_data->product_id);
        $product['product_usage'] = $this->usermodel->get_usage_by_product_id($product_data->product_id, 'product_usage');
        $product['product_benefits'] = $this->usermodel->get_usage_by_product_id($product_data->product_id, 'product_benefits');
        $product['product_faq'] = $this->usermodel->get_usage_by_product_id($product_data->product_id, 'product_faq');
        $product['alternate_orderflow_status'] = $this->alternative_model->get_alternate_orderflow_status('alternate-order-flow');

        // echo "<pre>";
        // print_r($product);
        // die();
        // echo" alternative order flow status is ";
        // print_r($product['alternate_orderflow_status']);
        // die();
        $this->load->view('header.php');
        $this->load->view('description.php', $product);
        $this->load->view('footer.php');
    }

    public function place_order()
    {
        $this->load->view('order_place.php');
    }
    public function thanku()
    {
        // $this->load->view('thanku.php');
        $this->load->view('Payment.php');


    }
    public function sound_autoplay(){
        $this->load->view('sound_autoplay.php');

    }
    public function add_coupon()
    {
        $this->load->view('add_coupon.php');
    }
    public function header_page()
    {
        $this->load->view('header.php');
    }
}
