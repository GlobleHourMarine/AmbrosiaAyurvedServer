
<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Uri $uri
 * @property CI_Pagination $pagination
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Security $security
 * @property CI_DB $db
 * @property CI_Email $email
 * @property Your_model_name $api_model
 * @property Your_model_name $Usermodel
 * @property Your_model_name $Investment_model
 * @property Your_model_name $package_model
 */

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('api_model');
        $this->load->model('tracking_model');
        $this->load->model('admin_model');
        $this->load->model('Product_model');
        $this->load->model('Usermodel');
    }
    public function userregister()
    {
        // Set the header to accept JSON input
        header('Content-Type: application/json');

        // Get the JSON input from the Flutter application
        $input_data = json_decode(file_get_contents('php://input'), true);

        // Extract data from the input JSON
        $fname = isset($input_data['fname']) ? $input_data['fname'] : null;
        $lname = isset($input_data['lname']) ? $input_data['lname'] : null;
        $mobile = isset($input_data['mobile']) ? $input_data['mobile'] : null;
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        $password = isset($input_data['password']) ? $input_data['password'] : null;
        $confirm = isset($input_data['ConfirmPassword']) ? $input_data['ConfirmPassword'] : null;

        // Validation (simple example)
        if (!$fname || !$lname || !$mobile || !$email || !$password || $password !== $confirm) {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid input data or passwords do not match.',
            ]);
            return;
        }

        $check = $this->Usermodel->check_user_by_email('user_table', $email);
        if ($check == 1) {
            echo json_encode([
                'status' => false,
                'message' => 'User already exists.',
                // 'data'=>
            ]);
        } else {
            // Prepare the data array for insertion
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'mobile' => $mobile,
                'email' => $email,
                'password' => $hashed_password // Hash the password
            ];

            // Insert data into the database
            $insert = $this->api_model->insertdata('user_table', $data);
            // $id=$this->Usermodel->get_id_by_email($email);
            $register_data = $this->Usermodel->get_register_data_by_email($email);
            // $this->Usermodel->fetch_user_data()
            // Return JSON response
            if ($insert) {
                echo json_encode([
                    'status' => true,
                    'data' => $register_data,
                    'message' => 'Record added successfully.',
                ]);
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'Failed to add record.',

                ]);
            }
        }
    }

    public function userlogin()
    {
        // Set the header to accept JSON input
        header('Content-Type: application/json');
        // Get the JSON input from the Flutter application
        $input_data = json_decode(file_get_contents('php://input'), true);
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        $password = isset($input_data['password']) ? $input_data['password'] : null;
        $res = $this->Usermodel->check_data('user_table', $email);

        if (!empty($res)) {

            // if($res->password==$password)
            if (password_verify($password, $res->password)) {
                $login_data = $this->Usermodel->get_register_data_by_email($email);
                echo json_encode([
                    'status' => 'success',
                    'data' => $login_data,
                    'message' => 'Login Successfull',
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid Email or Password',
                    // 'password'=>$res->password,
                    // 'pass'=>$password
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'User Not exist',
            ]);
        }
    }

    public function userlogout()
    {
        header('Content-Type: application/json');
        $this->session->sess_destroy();
        echo json_encode([
            'status' => 'success',
            'message' => 'Logout Successfull',
        ]);
    }
    public function cartdata()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode($this->input->raw_input_stream, true);
            log_message('debug', 'Data Changes: ' . print_r($input, true));

            $user_id = $input['user_id'];

            $result = $this->Usermodel->fetch_cartdata('cart_table', $user_id);
            $quantity = $result->quantity;
            if ($quantity) {
                $response = array("status" => true, "message" => "Data Fetch Successfully!
                ", "data" => $quantity);
                $this->output->set_content_type('application/json')->set_output(json_encode($response));
            } else {
                $response = array("status" => false, "message" => "Data Not Found !
                ");
                $this->output->set_content_type('application/json')->set_output(json_encode($response));
            }
        } else {
            $response = array("status" => false, "message" => "Invalid request method");
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }

    public function forgotPassword()
    {
        // Set the header to accept JSON input
        header('Content-Type: application/json');
        // Get the JSON input from the Flutter application
        $input_data = json_decode(file_get_contents('php://input'), true);
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        $res = $this->Usermodel->check_email('user_table', $email);
        if ($res == 1) {
            $otp = random_int(100000, 999999);
            $res = $this->Usermodel->update_otp($email, $otp);
            $this->load->library('email');
            $this->email->from('care@ambrosiaayurved.in');
            $this->email->to($email);
            $this->email->subject('Your OTP Code');
            $this->email->message('Your OTP for password recovery is: ' . $otp);
            $id = $this->Usermodel->get_id_by_email($email);
            if ($this->email->send()) {
                echo json_encode([
                    'id' => $id,
                    'status' => 'success',
                    'message' => 'OTP sent successfully.',
                ]);
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'something went wrong.',
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Email not exist.',
            ]);
        }
    }
    public function verifyotp()
    {
        // Set the header to accept JSON input
        header('Content-Type: application/json');

        // Get the JSON input from the Flutter application
        $input_data = json_decode(file_get_contents('php://input'), true);

        // Validate the input data
        $id = isset($input_data['id']) ? $input_data['id'] : null;
        $otp = isset($input_data['otp']) ? $input_data['otp'] : null;

        if (!$id || !$otp) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Invalid input. ID and OTP are required.',
            ]);
            return;
        }

        // Fetch the saved OTP from the database
        $saved_otp = $this->Usermodel->get_otp_by_id($id);
        // Check if the saved OTP matches the provided OTP
        if ($saved_otp === $otp) {
            echo json_encode([
                'status' => 'success',
                'message' => 'OTP verified successfully.',
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Invalid OTP.',
            ]);
        }
    }
    public function fetch_products()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $products = $this->admin_model->fetch_add_product_data();
            if ($products) {
                echo json_encode([
                    'status' => true,
                    'message' => 'Product data fetched successfully',
                    'data' => $products
                ]);
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'No data found.',
                ]);
            }
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid request method'
            ]);
        }
    }

    public function fetch_user_detail()
    {
        // echo "Function is called!<br>";
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_details = $this->Usermodel->fetch_user_data();
            // print_r($user_details);
            // die();
            if ($user_details) {
                echo json_encode([
                    'status' => true,
                    'message' => 'user details fetched sucesfully',
                    'data' => $user_details
                ]);
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'data not found'
                ]);
            }
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid request method'
            ]);
        }
    }

    public function fetch_cart_data()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        // $id=isset($input_data['id']) ? $input_data['id'] : null;
        // $user_id=$this->session->userdata('user_id');
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        // echo $user_id;
        $data = $this->Usermodel->fetch_all_cart_data('cart_table', $user_id);
        if ($data) {
            echo json_encode([
                'status' => true,
                'message' => 'cart data fetched succesfully!',
                'data' => $data,
                'id' => $user_id
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'no data found',
            ]);
        }
    }


    public function setnewpassword()
    {
        // Set the header to accept JSON input
        header('Content-Type: application/json');
        // Get the JSON input from the Flutter application
        $input_data = json_decode(file_get_contents('php://input'), true);
        $id = isset($input_data['id']) ? $input_data['id'] : null;
        $password = isset($input_data['password']) ? $input_data['password'] : null;
        $confirm_password = isset($input_data['confirm_password']) ? $input_data['confirm_password'] : null;
        if (!$id || !$password || !$confirm_password) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'ID, Password and confirm password are required.'
            ]);
            return;
        }
        $check_id = $this->Usermodel->check_id_exist($id);
        if ($check_id == 0) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'ID does not exist.'
            ]);
            return;
        }
        if ($password != $confirm_password) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Password and confirm password do not match.'
            ]);
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'password' => $hashed_password,
            );
            $res = $this->Usermodel->update_password('user_table', $data, $id);
            if ($res) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Password updated succesfully'
                ]);
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Something went wrong'
                ]);
            }
        }
    }
    // public function add_product_into_cart(){
    //     header('Content-Type: application/json');
    //     // header("Access-Control-Allow-Methods: POST");
    //     $input_data = json_decode(file_get_contents('php://input'), true);

    //     $user_id=isset($input_data['user_id']) ? $input_data['user_id'] : null;
    //     $product_id=isset($input_data['product_id']) ? $input_data['product_id'] : null;
    //     $quantity=isset($input_data['quantity']) ? $input_data['quantity'] : null;


    //     if(empty($user_id)||empty($product_id)|| empty($quantity)){
    //         echo json_encode([
    //             'status'=>'failed',
    //             'message'=>'Invalid input'
    //         ]);
    //         return;
    //     }
    //     else{
    //         $data=array(
    //             'user_id'=>$user_id,
    //             'product_id'=>$product_id,
    //             'quantity'=>$quantity,
    //             'date' => date('Y-m-d H:i:s')

    //         );
    //         $res=$this->Usermodel->add_product_into_cart('cart_table',$data);
    //         if($res){
    //             $product_detail=$this->Usermodel->fetch_product_details('product_table',$product_id);
    //             if(empty($product_detail))
    //             {
    //                 echo json_encode([
    //                     'status'=>'failed',
    //                     'message'=>'Product not found'
    //                     ]);
    //             }
    //             else{
    //                 echo json_encode([
    //                     'status'=>'success',
    //                     'message'=>'Product added into cart succesfully',
    //                     'data'=>$product_detail
    //                 ]);
    //             }

    //         }
    //         else{
    //             echo json_encode([
    //                 'status'=>'failed',
    //                 'message'=>'Something went wrong'
    //             ]);
    //         }
    //     }
    // }



    public function add_product_into_cart()
    {
        header('Content-Type: application/json');

        $input_data = json_decode(file_get_contents('php://input'), true);
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $product_id = isset($input_data['product_id']) ? $input_data['product_id'] : null;
        $quantity = isset($input_data['quantity']) ? $input_data['quantity'] : null;

        if (empty($user_id)) {
            $user_id = rand(1000, 9999);
            $user = array('user_id' => $user_id);

            $res = $this->Usermodel->insert_new_user('user_table', $user);
        }

        // Validate required parameters
        if (empty($user_id) || empty($product_id) || empty($quantity)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Invalid input'
            ]);
            return;
        }

        // Check if product exists
        $product_detail = $this->Usermodel->fetch_product_details('product_table', $product_id);
        if (empty($product_detail)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Product not found'
            ]);
            return;
        }

        // Check if the product is already in the cart
        $check_product_quantity = $this->Usermodel->check_product_already_have('cart_table', $product_id, $user_id);

        if ($check_product_quantity) {
            if ($check_product_quantity == $quantity) {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Product already exists in cart'
                ]);
            } else {
                // Update the quantity
                $this->Usermodel->update_cart_product('cart_table', $product_id, $user_id, ['quantity' => $quantity]);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product quantity updated in cart',
                    'data' => $product_detail

                ]);
            }
        } else {
            // Add new product to cart
            $data = array(
                'user_id'    => $user_id,
                'product_id' => $product_id,
                'quantity'   => $quantity,
                'date'       => date('Y-m-d H:i:s')
            );

            $res = $this->Usermodel->add_product_into_cart('cart_table', $data);


            if ($res) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product added into cart successfully',
                    'data' => $product_detail,
                    'user_id' => $user_id

                ]);
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Failed to add product to cart'
                ]);
            }
        }
    }

    public function fetch_payment_data()
    {
        header('Content-Type: application/json'); // Ensure correct response type
        $input_data = json_decode(file_get_contents('php://input'), true);

        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;

        if (!$user_id) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'User ID is required'
            ]);
            return;
        }




        $fetched_data = $this->Usermodel->fetch_payment_data('payment_table', $user_id);

        if ($fetched_data) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Payment data fetched successfully!',
                'data' => $fetched_data
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'No payment data found'
            ]);
        }
    }

    public function delete_product_from_cart()
    {
        $input_data = json_decode(file_get_contents('php://input'), true);
        header('Content-Type: application/json');
        $cart_id = isset($input_data['cart_id']) ? $input_data['cart_id'] : null;
        // $user_id=isset($input_data['user_id']) ? $input_data['user_id']:null;
        // $user_id=$this->session->userdata('')
        // $user_id=$this->session->userdata('user_id');
        if (empty($cart_id)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Invalid input'
            ]);
            return;
        } else {
            $fetch_data = $this->Usermodel->fetch_information('cart_table', $cart_id);
            $res = $this->Usermodel->delete_cart_product('cart_table', $cart_id);
            if ($res) {
                // $fetch_data=$this->Usermodel->fetch_information('cart_table',$cart_id);
                if (empty($fetch_data)) {
                    echo json_encode([
                        'status' => 'failled',
                        'message' => 'Product not found'

                    ]);
                } else {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Product deleted from cart succesfully!',
                        // 'id'=>$user_id
                        'data' => $fetch_data
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Something went wrong'
                ]);
            }
        }
    }
    public function update_quantity()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);

        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $product_id = isset($input_data['product_id']) ? $input_data['product_id'] : null;
        $quantity = isset($input_data['quantity']) ? $input_data['quantity'] : null;
        $send_data = array(
            'user_id' => $user_id,
            'product_id' => $product_id
        );
        if (empty($user_id) || empty($product_id) || empty($quantity)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'user id,productid,new quantity is required'
            ]);
        } else {
            $data = array(
                'quantity' => $quantity
            );
            $res = $this->Usermodel->update_cart_product('cart_table', $product_id, $user_id, $data);
            if ($res) {
                // $res=$this->fetch_product_id('cart_table',)
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Quantity updated succesfully',
                    'data' => $send_data
                ]);
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Something went wrong'
                ]);
            }
        }
    }


    public function fetch_orders_data()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);

        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        if (empty($user_id)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'user id is required'
            ]);
            return;
        }
        $order_data = $this->Usermodel->fetch_orders_data($user_id);
        if ($order_data) {
            echo json_encode([
                'status' => 'success',
                'data' => $order_data
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'No order found'
            ]);
        }
    }


    //     public function payment_process()
    // {
    //     header('Content-Type: application/json');
    //     $input_data = json_decode(file_get_contents('php://input'), true);

    //     $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
    //     $payment_method = isset($input_data['payment_method']) ? $input_data['payment_method'] : null;
    //     $transaction_id = isset($input_data['transaction_id']) ? $input_data['transaction_id'] : null;
    //     $screenshot = isset($input_data['screenshot']) ? $input_data['screenshot'] : null;
    //     $amount = isset($input_data['amount']) ? $input_data['amount'] : null;
    //     $order_id = isset($input_data['order_id']) ? $input_data['order_id'] : null;  // ✅ Get order_id

    //     // $status = "pen";
    //     $date = date("Y-m-d H:i:s");

    //     // ✅ Check required fields
    //     if (empty($user_id) || empty($payment_method) || empty($amount) || empty($order_id)) {
    //         echo json_encode([
    //             'status' => 'failed',
    //             'message' => 'User ID, payment method, amount, and order ID are required'
    //         ]);
    //         return;
    //     }

    //     // ✅ Validate UPI Payment
    //     if ($payment_method == "upi") {
    //         if (empty($transaction_id) || empty($screenshot)) {
    //             echo json_encode([
    //                 'status' => 'failed',
    //                 'message' => 'Transaction ID and screenshot are required for UPI payment'
    //             ]);
    //             return;
    //         }
    //     }

    //     // ✅ Insert Payment Data
    //     $payment_data = [
    //         'user_id' => $user_id,
    //         'order_id' => $order_id,  // ✅ Foreign Key
    //         'amount' => $amount,
    //         'payment_method' => $payment_method,
    //         'screenshot' => $screenshot,
    //         // 'status' => $status,
    //         'transaction_id' => $transaction_id,
    //         'date' => $date
    //     ];

    //     $insert_id = $this->Usermodel->insert_payment_data('payment_table', $payment_data);

    //     if ($insert_id) {
    //         echo json_encode([
    //             'status' => 'success',
    //             'message' => 'Payment processed successfully',
    //             'payment_id' => $insert_id
    //         ]);
    //     } else {
    //         echo json_encode([
    //             'status' => 'failed',
    //             'message' => 'Payment processing failed'
    //         ]);
    //     }
    // }


    public function payment_process()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);

        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $payment_method = isset($input_data['payment_method']) ? $input_data['payment_method'] : null;
        // $transaction_id = isset($input_data['transaction_id']) ? $input_data['transaction_id'] : null;
        $screenshot = isset($input_data['screenshot']) ? $input_data['screenshot'] : null;
        $amount = isset($input_data['amount']) ? $input_data['amount'] : null;
        $order_id = isset($input_data['order_id']) ? $input_data['order_id'] : null;
        // $date=date('Y-m-d'); 
        $date = date("Y-m-d H:i:s");


        // Validation
        if (empty($user_id) || empty($payment_method) || empty($amount) || empty($order_id)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'User ID, payment method, amount, and order ID are required'
            ]);
            return;
        }

        if ($payment_method == "upi") {
            if (empty($_FILES['screenshot']['name'])) {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Transaction ID and screenshot are required for UPI payment'
                ]);
                return;
            }
        }

        // Handle screenshot upload
        $screenshot_path = '';
        if (!empty($_FILES['screenshot']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = time() . '_' . $_FILES['screenshot']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('screenshot')) {
                $upload_data = $this->upload->data();
                $screenshot_path = base_url('uploads/' . $upload_data['file_name']);
            } else {
                echo json_encode(['status' => 'failed', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        // Prepare data to insert
        $data = [
            'user_id' => $user_id,
            'order_id' => $order_id,
            'amount' => $amount,
            'payment_method' => $payment_method,
            // 'transaction_id' => $transaction_id,
            'screenshot' => $screenshot_path,
            'date' => $date
        ];

        // Insert to DB
        $insert_id = $this->Usermodel->insert_payment_data('payment_table', $data);

        if ($insert_id) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Payment processed successfully',
                'payment_id' => $insert_id
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Payment processing failed'
            ]);
        }
    }



    public  function update_address()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $new_address = isset($input_data['address']) ? $input_data['address'] : null;

        if (empty($new_address)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Address is required'
            ]);
        } else {
            $update_address = $this->Usermodel->update_user_address('user_table', $user_id, $new_address);
            if ($update_address) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Address updated successfully !'
                ]);
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Address update failed !'
                ]);
            }
        }
    }
    public function order_data()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $address_id = isset($input_data['address_id']) ? $input_data['address_id'] : null;
        $product_id = isset($input_data['product_id']) ? $input_data['product_id'] : null;
        $quantity = isset($input_data['quantity']) ? $input_data['quantity'] : null;
        $product_price = isset($input_data['product_price']) ? $input_data['product_price'] : null;
        $total_price = isset($input_data['total_price']) ? $input_data['total_price'] : null;
        $date = date("Y-m-d H:i:s");

        if (empty($user_id) || empty($product_id) || empty($quantity) || empty($product_price) || empty($total_price) || empty($address_id)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Please fill all the fields!'
            ]);
            return;
        }

        
        $filtered_data = [  // ✅ Single associative array
            'user_id' => $user_id,
            'product_id' => $product_id,
            'product_quantity' => $quantity,
            'address_id' => $address_id,
            'product_price' => $product_price,
            'total_price' => $total_price,
            'date' => date('Y-m-d H:i:s')
        ];

        // ✅ Insert order correctly
        $order_id = $this->Usermodel->insert_order_data_now('order_table', $filtered_data);

        if ($order_id) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Order placed successfully!',
                'order_id' => $order_id // Return the order_id for payment process
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Order failed!'
            ]);
        }
        }
        else{
            echo json_encode([
                'status' => false,
                'message' => 'Invlid request method'
            ]);
        }
    }

    public function cancel_order()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $order_id = isset($input_data['order_id']) ? $input_data['order_id'] : null;
        // $quantity = isset($input_data['']) ? $input_data['quantity']:null;
        $res = $this->Usermodel->cancel_order('payment_table', $order_id, $user_id);
        if ($res) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Order cancelled successfully !',
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'cancel order request failed !'
            ]);
        }
    }

    public function track_order_details()
    {
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $user_id = isset($input_data['user_id']) ? $input_data['user_id'] : null;
        $order_id = isset($input_data['order_id']) ? $input_data['order_id'] : null;

        if (!isset($input_data['user_id']) || !isset($input_data['order_id'])) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'User ID and Order ID are required.'
            ]);
            return;
        }

        // $user_id = $input_data['user_id'];
        // $order_id = $input_data['order_id'];

        $res = $this->Usermodel->track_my_order($order_id, $user_id);

        if (!empty($res)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Order details fetched successfully!',
                'data' => $res
            ]);
        } else {
            echo json_encode([
                'status' => 'failed',
                'message' => 'No order details found!'
            ]);
        }
    }


    public function register_before_order()
    {
        // $email = $this->input->post('email');
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        if (empty($email)) {
            echo json_encode(["status" => "error", "message" => "Email is required"]);
            return;
        }

        $res = $this->Usermodel->check_data('user_table', $email);
        if ($res) {
            $fetch_data = $this->Usermodel->fetch_data_by_email('user_table', $email);

            // $this->session->set_userdata($session_data);
            echo json_encode([
                "status" => "success",
                "message" => "User logged in",
                "data" => $fetch_data
            ]);
        } else {
            $data = array('email' => $email);
            $insert = $this->Usermodel->insertdata('user_table', $data);
            if ($insert) {
                // $this->session->set_userdata(["register_email" => $email]);
                echo json_encode([
                    "status" => "success",
                    "message" => "Email registered, please proceed",
                    "data" => $email
                ]);
            } else {
                echo json_encode(["status" => "error", "message" => "Registration failed"]);
            }
        }
    }

    // Register Mobile
    public function register_mobile()
    {
        // $mobile = $this->input->post('mobile');
        // $email = $this->session->userdata('register_email');
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        $mobile = isset($input_data['mobile']) ? $input_data['mobile'] : null;
        $name = isset($input_data['name']) ? $input_data['name'] : null;





        if (empty($mobile) || empty($email) || empty($name)) {
            echo json_encode([
                "status" => "error",
                "message" => "Mobile number,name and email are required"
            ]);
            return;
        }

        $data = array(
            'mobile' => $mobile,
            'fname' => $name

        );
        $insert = $this->Usermodel->insert_data('user_table', $email, $data);
        if ($insert) {
            echo json_encode([
                "status" => "success",
                "message" => "Mobile number and name is  registered",
                "data" => $email
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to register mobile number"]);
        }
    }

    // Register Password
    public function register_password()
    {
        // $password = $this->input->post('password');
        // $email = isset($input_data['email']) ? $input_data['email']:null;
        header('Content-Type: application/json');
        $input_data = json_decode(file_get_contents('php://input'), true);
        $email = isset($input_data['email']) ? $input_data['email'] : null;
        $password = isset($input_data['password']) ? $input_data['password'] : null;
        // $confirm_password = isset($input_data['confirm_password']) ? $input_data['confirm_password']:null;

        // $email = $this->session->userdata('register_email');

        if (empty($password)) {
            echo json_encode(["status" => "error", "message" => "Password are required"]);
            // return;
        }
        if (empty($email)) {
            echo json_encode(["status" => "error", "message" => "email are required"]);
            // return;
        }


        $data = array('password' => $password);
        $insert = $this->Usermodel->insert_data('user_table', $email, $data);
        if ($insert) {
            $fetch_data = $this->Usermodel->fetch_data_by_email('user_table', $email);
            $response = array(
                "status" => "success",
                'user_id'   => $fetch_data->user_id,
                'name'      => $fetch_data->fname ?? "",
                'email'     => $fetch_data->email,
                'mobile'    => $fetch_data->mobile,
                'password'  => $fetch_data->password,
                'logged_in' => TRUE
            );
            // $this->session->set_userdata($session_data);
            // echo json_encode(["status" => "success", "message" => "Password set, user logged in",  $response]);
            echo json_encode($response);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to set password"]);
        }
    }

    public function fetch_All_reviews()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : null;
        if (empty($product_id)) {
            echo json_encode(
                [
                    "status" => false,
                    "message" => "Product id are required"
                ]
            );
        } else {
            $data = $this->Usermodel->fetch_reviews_by_product($product_id);
            if ($data) {
                echo json_encode([
                    "status" => true,
                    "message" => "Reviews fetched successfully",
                    "data" => $data
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "No reviews found"
                ]);
            }
        }
    }
    else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid request method"
        ]);
    }
}



    // public function submit_review()
    // {
    //     header('Content-Type: application/json');
    //     $input_data = json_decode(file_get_contents('php://input'), true);


    //     // Load helper
    //     $this->load->helper('url');

    //     // Get other inputs from POST
    //     $product_id = isset($input_data['product_id']) ? $input_data['product_id'] : null;
    //     $user_id    = isset($input_data['user_id']) ? $input_data['user_id'] : null;
    //     $order_id   = isset($input_data['order_id']) ? $input_data['order_id'] : null;
    //     $rating     = isset($input_data['rating']) ? $input_data['rating'] : null;
    //     $message    = isset($input_data['message']) ? $input_data['message'] : null;
    //     $file_path  = isset($input_data['file_path']) ? $input_data['file_path'] : null;

    //     // Validate
    //     if (empty($user_id) || empty($product_id) || empty($order_id) || empty($rating )|| empty($message) || strlen($message) < 5) {
    //         echo json_encode(['status' => false, 
    //         'message' => 'Missing or invalid fields',
    //         // "pid"=>
    //         ]
    //     );
    //         return;
    //     }

    //     // Handle file upload if provided
    //     $file_path = '';
    //     if (!empty($_FILES['file_path']['name'])) {
    //         $config['upload_path'] = './uploads/App_images';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
    //         $config['max_size'] = 2048; // in KB
    //         $config['file_name'] = time() . '_' . $_FILES['file_path']['name'];

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('file_path')) {
    //             $upload_data = $this->upload->data();
    //             $file_path = base_url('uploads/App_images' . $upload_data['file_name']);
    //         } else {
    //             echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
    //             return;
    //         }
    //     }

    //     // Save to DB
    //     $data = [
    //         'user_id' => $user_id,
    //         'product_id' => $product_id,
    //         'rating' => $rating,
    //         'message' => $message,
    //         'file_path' => $file_path,
    //         'date' => date('Y-m-d H:i:s')
    //     ];

    //     $result = $this->Usermodel->insert_review('reviews', $data);

    //     if ($result) {
    //         $res = $this->Usermodel->update_review_proof($order_id);
    //         if ($res) {
    //             echo json_encode(['status' => true, 'message' => 'Thank you for your feedback!']);
    //         } else {
    //             echo json_encode(['status' => false, 'message' => 'Error in updating review proof']);
    //         }
    //     } else {
    //         echo json_encode(['status' => false, 'message' => 'Failed to submit your review']);
    //     }
    // }

    //olddd
        // public function submit_review()
        // {
        //     if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        //         return $this->output
        //             ->set_content_type('application/json')
        //             ->set_status_header(405)
        //             ->set_output(json_encode(['error' => 'Only POST requests allowed']));
        //     }

        //     $uploaded_files = [];

        //     if (isset($_FILES['file_path']) && !empty($_FILES['file_path']['name'])) {
        //         if (!is_dir('./uploads/reviews/')) {
        //             mkdir('./uploads/reviews/', 0755, true);
        //         }

        //         $file_names     = is_array($_FILES['file_path']['name'])     ? $_FILES['file_path']['name']     : [$_FILES['file_path']['name']];
        //         $file_types     = is_array($_FILES['file_path']['type'])     ? $_FILES['file_path']['type']     : [$_FILES['file_path']['type']];
        //         $file_tmp_names = is_array($_FILES['file_path']['tmp_name']) ? $_FILES['file_path']['tmp_name'] : [$_FILES['file_path']['tmp_name']];
        //         $file_errors    = is_array($_FILES['file_path']['error'])    ? $_FILES['file_path']['error']    : [$_FILES['file_path']['error']];
        //         $file_sizes     = is_array($_FILES['file_path']['size'])     ? $_FILES['file_path']['size']     : [$_FILES['file_path']['size']];

        //         $count_files = count($file_names);

        //         $this->load->library('upload');

        //         for ($i = 0; $i < $count_files; $i++) {
        //             // Prepare $_FILES array for each file
        //             $_FILES['file']['name']     = $file_names[$i];
        //             $_FILES['file']['type']     = $file_types[$i];
        //             $_FILES['file']['tmp_name'] = $file_tmp_names[$i];
        //             $_FILES['file']['error']    = $file_errors[$i];
        //             $_FILES['file']['size']     = $file_sizes[$i];

        //             $config['upload_path']   = './uploads/reviews/';

        //             $config['allowed_types'] = 'jpg|jpeg|png|gif|webp|heic|mp4|mov|avi|mkv|webm';
        //             $config['max_size'] = 51200; // 50MB
        //             $config['file_name']     = time() . '_' . uniqid() . '_' . $_FILES['file']['name'];

        //             $this->upload->initialize($config);

        //             if ($this->upload->do_upload('file')) {
        //                 $upload_data = $this->upload->data();
        //                 $uploaded_files[] = base_url('uploads/reviews/' . $upload_data['file_name']);
        //             } else {
        //                 return $this->output
        //                     ->set_content_type('application/json')
        //                     ->set_status_header(400)
        //                     ->set_output(json_encode([
        //                         'status' => false,
        //                         'message' => $this->upload->display_errors()
        //                     ]));
        //             }
        //         }
        //     }

        //     // Collect POST data
        //     $user_id    = $this->input->post('user_id');
        //     $product_id = $this->input->post('product_id');
        //     $rating     = $this->input->post('rating');
        //     $message    = $this->input->post('message');
        //     $order_id   = $this->input->post('order_id');

        //     if (empty($user_id) || empty($product_id) || empty($rating) || empty($message) || empty($order_id)) {
        //         return $this->output
        //             ->set_content_type('application/json')
        //             ->set_status_header(400)
        //             ->set_output(json_encode(['error' => 'Missing required fields']));
        //     }

        //     $data = [
        //         'user_id'    => $user_id,
        //         'product_id' => $product_id,
        //         'rating'     => $rating,
        //         'message'    => $message,
        //         'file_path'  => json_encode($uploaded_files),
        //         'order_id'   => $order_id,
        //         'date'       => date('Y-m-d H:i:s')
        //     ];

        //     $insert_id = $this->Usermodel->insert_review('reviews', $data);

        //     if ($insert_id) {
        //         return $this->output
        //             ->set_content_type('application/json')
        //             ->set_status_header(200)
        //             ->set_output(json_encode([
        //                 'status' => true,
        //                 'insert_id' => $insert_id,
        //                 'file_paths' => $uploaded_files
        //             ]));
        //     } else {
        //         return $this->output
        //             ->set_content_type('application/json')
        //             ->set_status_header(500)
        //             ->set_output(json_encode(['error' => 'Failed to save review']));
        //     }
        // }

        public function submit_review() {
            header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Input validation
        $user_id    = $this->input->post('user_id');
        $product_id = $this->input->post('product_id');
        $rating     = $this->input->post('rating');
        $message    = $this->input->post('message');
        $order_id   = $this->input->post('order_id');

        if (empty($user_id) || empty($product_id) || empty($rating)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Required fields are missing'
            ]);
            return;
        }

        // Set upload path
        $upload_path = './uploads/reviews/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        // Check directory permissions
        if (!is_writable($upload_path)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Upload directory is not writable'
            ]);
            return;
        }

        $uploaded_files = [];

                $file_names     = is_array($_FILES['file_path']['name'])     ? $_FILES['file_path']['name']     : [$_FILES['file_path']['name']];
                $file_types     = is_array($_FILES['file_path']['type'])     ? $_FILES['file_path']['type']     : [$_FILES['file_path']['type']];
                $file_tmp_names = is_array($_FILES['file_path']['tmp_name']) ? $_FILES['file_path']['tmp_name'] : [$_FILES['file_path']['tmp_name']];
                $file_errors    = is_array($_FILES['file_path']['error'])    ? $_FILES['file_path']['error']    : [$_FILES['file_path']['error']];
                $file_sizes     = is_array($_FILES['file_path']['size'])     ? $_FILES['file_path']['size']     : [$_FILES['file_path']['size']];

                $filesCount = count($file_names);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $file_names[$i];
                $_FILES['file']['type']     = $file_types[$i];
                $_FILES['file']['tmp_name'] = $file_tmp_names[$i];
                $_FILES['file']['error']    = $file_errors[$i];
                $_FILES['file']['size']     = $file_sizes[$i];


                // Upload configuration
                $config = [
                    'upload_path'   => $upload_path,
                    'allowed_types' => 'jpg|jpeg|png|gif|webp',
                    'file_name'     => time() . '_' . rand(1000, 9999) . '_' . $_FILES['file']['name'],
                    'max_size'      => 5120 // 5MB
                ];

                // Reinitialize upload library for each file
                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    // Store relative path (relative to web root or application)
                    $uploaded_files[] = 'uploads/reviews/' . $fileData['file_name'];
                } else {
                    $error = $this->upload->display_errors('', '');
                    log_message('error', 'File upload error: ' . $error);
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'File upload failed: ' . $error
                    ]);
                    return;
                }
        }

        // Prepare data for database
        $data = [
            'user_id'    => $user_id,
            'product_id' => $product_id,
            'rating'     => $rating,
            'message'    => $message,
            'file_path'  => json_encode($uploaded_files),
            'order_id'   => $order_id,
            'date'       => date('Y-m-d H:i:s')
        ];

        // Insert into database
        if ($this->db->insert('reviews', $data)) {
            echo json_encode([
                'status' => 'success',
                'uploaded_files' => $uploaded_files,
                'message' => 'Review submitted successfully'
            ]);
        } else {
            log_message('error', 'Database insert failed: ' . $this->db->last_query());
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to save review to database'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid request method'
        ]);
    }
}


    public function save_checkout_information_api()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON format."]);
            return;
        }

        // Extract input and trim values to remove spaces
        // $product_id = isset($input['product_id']) ? trim($input['product_id']) : null;
        $user_id = isset($input['user_id']) ? trim($input['user_id']) : null;
        $fname = isset($input['fname']) ? trim($input['fname']) : null;
        $lname = isset($input['lname']) ? trim($input['lname']) : null;
        $mobile = isset($input['mobile']) ? trim($input['mobile']) : null;
        // $email = isset($input['email']) ? trim($input['email']) : null;
        $state = isset($input['state']) ? trim($input['state']) : null; // FIXED: Expect "state"
        $pincode = isset($input['pincode']) ? trim($input['pincode']) : null;
        $city = isset($input['city']) ? trim($input['city']) : null;
        $address = isset($input['address']) ? trim($input['address']) : null;
        $country = isset($input['country']) ? trim($input['country']) : null;

        // Validate required fields
        if (!$user_id || !$fname || !$lname || !$mobile || !$state || !$pincode || !$city || !$address || !$country) {
            echo json_encode(["status" => "error", "message" => "Please fill all the fields"]);
            return;
        }

        // Prepare data array
        $data = array(
            'fname'    => $fname,
            'lname'    => $lname,
            'mobile'   => $mobile,
            // 'email'    => $email,
            'state' => $state, // FIXED: Use state correctly
            'pincode'  => $pincode,
            'city'     => $city,
            'address'  => $address,
            'country'  => $country
        );

        // $update=$this->Usermodel->update_user_details_via_checkout('user_table', $data, $user_id);

        // Check if email already exists
        // $check = $this->Usermodel->check_email('user_table', $email);
        // if($check)
        // {
        // $old_user_id = $this->Usermodel->fetch_old_user_id('user_table', $email);
        // $update=$this->Usermodel->update_user_details_via_checkout('user_table', $data, $old_user_id);
        // $delete=$this->Usermodel->delete_old_data('cart_table', $old_user_id,$product_id);
        // $old_id=array(
        //     'user_id'=>$old_user_id,
        // );
        // $update_userid=$this->Usermodel->update_user_id_in_cart_table('cart_table', $old_id, $user_id,$product_id);
        // if($update_userid)
        // {
        //     $resu=$this->Usermodel->delete_new_user_id_record('user_table',$user_id);

        // echo json_encode(["status" => "success",
        // "message" => "user id  updated  successfully in cart table.",


        // ] );
        // return;
        // }
        // else{
        //     echo json_encode(["status" => "success",
        //     "message" => " user id not updated successfully.",
        //     "old_id"=>$old_id,
        //     "user_id"=>$user_id,
        //     "product_id"=>$product_id

        //     ] );
        //     return;
        // }

        // echo json_encode(["status" => "success",
        //  "message" => "This user already has an account.",
        //   "old_user_id" => $old_user_id,
        //   "user_id"=>$user_id,
        //   "data"=>$data

        //   ]

        // );
        // return;
        // }

        // Save new user data
        $res = $this->Usermodel->save_checkout_data('user_table', $data, $user_id);

        if ($res) {
            echo json_encode([
                "status" => "success",
                "message" => "Checkout information saved successfully.",
                "data" => $data,
                //  "result"=>$res,
                "user_id" => $user_id

            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Error in saving checkout information.",
                // "result"=>$res,
                // "data"=>$data
            ]);
        }
    }

    public function add_multiple_address()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$input) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON format."]);
            return;
        }

        // Extract input and trim values to remove spaces
        // $product_id = isset($input['product_id']) ? trim($input['product_id']) : null;
        $user_id = isset($input['user_id']) ? trim($input['user_id']) : null;
        $fname = isset($input['fname']) ? trim($input['fname']) : null;
        $lname = isset($input['lname']) ? trim($input['lname']) : null;
        $mobile = isset($input['mobile']) ? trim($input['mobile']) : null;
        $district = isset($input['district']) ? trim($input['district']) : null;
        $state = isset($input['state']) ? trim($input['state']) : null; // FIXED: Expect "state"
        $pincode = isset($input['pincode']) ? trim($input['pincode']) : null;
        $city = isset($input['city']) ? trim($input['city']) : null;
        $address = isset($input['address']) ? trim($input['address']) : null;
        $country = isset($input['country']) ? trim($input['country']) : null;
        $type = isset($input['address_type']) ? trim($input['address_type']) : null;


        // Validate required fields
        if (!$user_id || !$fname || !$lname || !$mobile || !$state || !$pincode || !$city || !$address || !$country || !$type || !$district){
            echo json_encode(["status" => "error", "message" => "Please fill all the fields"]);
            return;
        }

        // Prepare data array
        $data = array(
            'user_id' => $user_id,
            'fname'    => $fname,
            'lname'    => $lname,
            'mobile'   => $mobile,
            'district'    => $district,
            'state' => $state, // FIXED: Use state correctly
            'pincode'  => $pincode,
            'city'     => $city,
            'address'  => $address,
            'country'  => $country,
            'address_type' => $type,
        );
        // Save new user data
        $res = $this->Usermodel->add_new_address('user_address', $data);

        if ($res) {
            echo json_encode([
                "status" => "success",
                "message" => "Address saved successfully.",
                "data" => $data,
                "user_id" => $user_id

            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Something went wrong.",
            ]);
        }
        }
        else{
            echo json_encode([
                "status" => "error",
                "message" => "Invalid request method",
            ]);
        }
    }

    public function fetch_all_address()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_id = isset($_GET['user_id']) ? trim($_GET['user_id']) : null;

        if (!$user_id) {
            echo json_encode([
                "status" => "error",
                "message" => "Required fields missing"
            ]);
            return;
        }

        $data = $this->Usermodel->fetch_all_address('user_address', $user_id);
        if ($data) {
            echo json_encode([
                "status" => true,
                "message" => "Data fetched successfully",
                "data" => $data
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "No data found"
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid request method",
        ]);
    }
}

    public function fetch_all_benefits()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : null;

        if (!$product_id) {
            echo json_encode([
                "status" => "error",
                "message" => "Required fields missing"
            ]);
            return;
        }

        $data = $this->Product_model->fetch_benefits($product_id);
        if ($data) {
            echo json_encode([
                "status" => true,
                "message" => "Data fetched successfully",
                "data" => $data
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "No data found"
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid request method",
        ]);
    }
}

public function how_to_use()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : null;

        if (!$product_id) {
            echo json_encode([
                "status" => "error",
                "message" => "Required fields missing"
            ]);
            return;
        }

        $data = $this->Product_model->fetch_how_to_use_data($product_id);
        if ($data) {
            echo json_encode([
                "status" => true,
                "message" => "Data fetched successfully",
                "data" => $data
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "No data found"
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid request method",
        ]);
    }
}


public function faq()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : null;

        if (!$product_id) {
            echo json_encode([
                "status" => "error",
                "message" => "Required fields missing"
            ]);
            return;
        }

        $data = $this->Product_model->fetch_faq_data($product_id);
        if ($data) {
            echo json_encode([
                "status" => true,
                "message" => "Data fetched successfully",
                "data" => $data
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "No data found"
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid request method",
        ]);
    }
}
     public function delete_any_address()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if (!$input) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON format."]);
            return;
            }
            $id = isset($input['id']) ? trim($input['id']) : null;
            if(!$id)
            {
                echo json_encode([
                    "status" =>"error",
                    "message" =>"Required fields missisng"
                ]);
                return;
            }
            $status=array(
                'status' =>'inactive'
            );
            $data = $this->Usermodel->delete_any_address('user_address', $id, $status);
            if($data)
            {
                echo json_encode([
                    "status" =>true,
                    "message" =>"Data Deleted successfully",
                ]);
            }
            else{
                echo json_encode([
                    "status" =>false,
                    "message" => "No data found",

                ]);
            }
        }
        else{
            echo json_encode([
                "status" =>false,
                "message" =>"Invalid request method",
            ]);
        }
    }

    public function save_tracking_data()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$input) {
            echo json_encode(["status" => false, "message" => "Invalid JSON format."]);
            return;
        }

        $order_id = isset($input['order_id']) ? trim($input['order_id']) : null;
        $awb_code = isset($input['awb_code']) ? trim($input['awb_code']) : null;
        $shiprocket_order_id = isset($input['shiprocket_order_id']) ? trim($input['shiprocket_order_id']) : null;
        $shipment_id = isset($input['shipment_id']) ? trim($input['shipment_id']) : null;
        $courier_company = isset($input['courier_company']) ? trim($input['courier_company']) : null;
        $expected_delivery_date = isset($input['expected_delivery_date']) ? trim($input['expected_delivery_date']) : null; // FIXED: Expect "state"
        $track_status = isset($input['track_status']) ? trim($input['track_status']) : null;
        $current_status = isset($input['current_status']) ? trim($input['current_status']) : null;

        // Validate required fields
        if (!$order_id || !$awb_code || !$shiprocket_order_id || !$track_status || !$shipment_id || !$courier_company || !$current_status || !$expected_delivery_date){
            echo json_encode(["status" => false, "message" => "Please fill all the fields"]);
            return;
        }

        // Prepare data array
        $data = array(
            'order_id' => $order_id,
            'awb_code'    => $awb_code,
            'shiprocket_order_id'    => $shiprocket_order_id,
            'shipment_id'   => $shipment_id,
            'courier_company' => $courier_company,
            'expected_delivery_date' => $expected_delivery_date, // FIXED: Use state correctly
            'track_status'  => $track_status,
            'current_status'     => $current_status
        );
        // Save new user data
        $res = $this->tracking_model->save_awb_number('track_order', $data);
        if ($res) {
            echo json_encode([
                "status" => true,
                "message" => "Data saved successfully.",
                "data" => $data,

            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Something went wrong.",
            ]);
        }
        }
        else{
            echo json_encode([
                "status" => false,
                "message" => "Invalid request method",
            ]);
        }
    }

    public function get_tracking_status()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $order_id = isset($_GET['order_id']) ? trim($_GET['order_id']) : null;

            if(empty($order_id))
            {
                echo json_encode(["status" => false, 'message'=> 'Please fill all the fields']);
                return;
            }
            $data = $this->tracking_model->fetch_track_data('track_order', $order_id);
            if ($data) {
                echo json_encode(['status'=> true, 'message' =>'Data fetched successfully', 'data'=> $data]);
            }
            else{
                echo json_encode(['status'=> false, 'message'=>'Data not found']);
            }
        }
        else{
            echo json_encode(['status'=> false, 'message'=> 'Invalid request method']);
        }
    }
}
?>