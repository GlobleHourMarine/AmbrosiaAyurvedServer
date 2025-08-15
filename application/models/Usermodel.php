<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->db)) {
            $this->load->database();
        }
        @$this->db->query("SET SESSION wait_timeout = 28800");
        @$this->db->query("SET SESSION interactive_timeout = 28800");
    }
    public function check_user_by_mobile($table, $mobile)
    {
        $this->db->where('mobile', $mobile);
        $query = $this->db->get($table);
        return $query->num_rows() > 0 ? 1 : 0;
    }
    // dynmic model for get single recode from table   
    public function get_single_record($table_name, $id)
    {
        if (!empty($table_name) && !empty($id)) {
            $query = $this->db->get_where($table_name, ['product_id' => $id]);
            return $query->row(); // return as object (use row_array() for array)
        }
        return false;
    }
    // public function get_user_by_id($user_id)
    // {
    //     return $this->db->get_where('user_table', ['user_id' => $user_id])->row();
    // }
    public function get_latest_address_by_user($user_id)
    {
        return $this->db->order_by('id', 'DESC')->get_where('user_address', ['user_id' => $user_id])->row();
    }
    public function get_packs_by_product_id($product_id)
    {
        if (!empty($product_id)) {
            $this->db->where('product_id', $product_id);
            $query = $this->db->get('tbl_pack');
            return $query->result_array(); // ✅ array of associative arrays
        }
        return [];
    }

    public function insertdata($table, $data)
    {
        $res = $this->db->insert($table, $data);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public function insert_data($table, $email, $data)
    {
        $this->db->where('email', $email);
        $res = $this->db->update($table, $data);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public function check_user_by_email($table, $email)
    {
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_by_email($table, $phone)
    {
        return $this->db->where('mobile', $phone)->get($table)->row();
    }

    public function verify_user_by_mobile($table, $mobile, $password)
    {
        $query = $this->db->where('mobile', $mobile)->get($table);
        if ($query->num_rows() === 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    public function check_website_status()
    {
        $status = $this->db->from('admin_table')->get()->row();
        return $status->website_manage;
    }

    public function fetch_data_by_email($table, $email)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        return $res->row();
    }
    public function verify_userdata($table, $email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($table);

        if ($query->num_rows() === 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    public function fetch_cartdata($table, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('user_id', $id);
        $res = $this->db->get();
        return $res->row();
    }
    public function check_data($table, $email)
    {
        $this->db->select('password');
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        return $res->row();
    }
    public function check_email($table, $email)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_user_data_by_id($user_id)
    {
        $result = $this->db->select('*')->from('user_table')->where('user_id', $user_id)->get();
        return $result->row();
    }

    public function get_user_id_by_email($table, $email)
    {
        $this->db->select('user_id');
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        return $res->row()->user_id;
    }

    public function check_password($table, $email)
    {
        $this->db->select('password');
        $this->db->from($table);
        $this->db->where('email', $email);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->row()->password;
        } else {
            return 0;
        }
    }
    public function update_otp($email, $otp)
    {
        $data = array(
            'otp' => $otp
        );
        $this->db->where('email', $email);
        $res = $this->db->update('user_table', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function get_otp_by_id($id)
    {
        $this->db->select('otp');
        $this->db->from('user_table');
        $this->db->where('user_id', $id);
        $res = $this->db->get();
        return $res->row()->otp;
    }
    public function update_password($table, $data, $id)
    {
        $this->db->where('user_id', $id);
        $res = $this->db->update($table, $data);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public function check_id_exist($id)
    {
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('user_id', $id);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function check_user_exist_via_uid($table, $id, $email)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('user_id', $id);
        $this->db->where('email', $email);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function check_user_exist_via_password($table, $email, $password)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->row()->user_id;
        } else {
            return 0;
        }
    }

    public function check_if_email_exists($table, $email)
    {
        return $this->db->where('email', $email)->get($table)->num_rows() > 0;
    }

    public function get_user_password_by_email($table, $email)
    {
        $query = $this->db->select('password')->from($table)->where('email', $email)->get();
        return $query->num_rows() > 0 ? $query->row()->password : null;
    }

    public function change_user_status($table, $user_id, $account_status)
    {
        $this->db->form($atble);
        $this->db->where('user_id', $user_id);
        $this->db->update('account_status', $account_status);
    }

    public function get_user_by_id($table, $user_id)
    {
        return $this->db->get_where($table, ['user_id' => $user_id])->row();
    }

    public function get_id_by_email($email)
    {
        $this->db->select('user_id');
        $this->db->from('user_table');
        $this->db->where('email', $email);
        $res = $this->db->get();
        return $res->row()->user_id;
    }
    public function get_register_data_by_email($email)
    {
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('email', $email);
        $res = $this->db->get();
        return $res->result();
    }

    public function fetch_products($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $res = $this->db->get();
        if ($res) {
            return $res->result();
        } else {
            return 0;
        }
    }
    public function fetch_user_data()
    {
        $this->db->select('*');
        $this->db->from('user_table');
        $res = $this->db->get();
        if ($res) {

            return $res->result();
        } else {
            return 0;
        }
    }

    public function fetch_all_cart_data($table, $id)
    {
        $this->db->select('cart_table.cart_id, 
                           cart_table.quantity as quantity, 
                           product_table.product_name, 
                           product_table.price, 
                           product_table.image, 
                           product_table.product_id,
                           product_table.discription,
                           user_table.address');
        $this->db->from($table);
        $this->db->join('product_table', 'cart_table.product_id = product_table.product_id', 'left');
        $this->db->join('user_table', 'cart_table.user_id = user_table.user_id', 'left');
        $this->db->where('cart_table.user_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $images = json_decode($row->image);
                $row->image = isset($images[0]) ? $images[0] : null; // Assign first image only
            }
            return $result;
        } else {
            return 0;
        }
    }




    public function update_user_address($table, $id, $new_address)
    {
        $data = array(
            'address' => $new_address
        );
        $this->db->where('user_id', $id);
        return $this->db->update($table, $data);  // Returns true if successful, false otherwise
    }

    public function delete_cart_product($table, $id)
    {
        $this->db->where('cart_id', $id);
        return $this->db->delete($table);  // Returns true if successful, false otherwise
    }

    public function delete_new_user_id_record($table, $user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete($table);  // Returns true if successful, false otherwise
    }
    public function add_product_into_cart($table, $data)
    {

        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function fetch_product_details($table, $pid)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $pid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function get_product_price($product_id)
    {
        $this->db->select('price');
        $this->db->from('product_table');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }
    public function get_product_price_by_id_and_name($product_id, $product_name)
    {
        $this->db->select('price');
        $this->db->from('product_table');
        $this->db->where('product_id', $product_id);
        $this->db->where('product_name', $product_name);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }
    public function fetch_information($table, $cart_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // echo("hello ");
            return $query->result();
        } else {
            return 0;
        }
    }
    public function fetch_cart_data($table, $uid)
    {
        $this->db->select('cart_table.cart_id, cart_table.user_id, cart_table.product_id, cart_table.quantity, cart_table.date, product_table.price');
        $this->db->from($table);
        $this->db->join('product_table', 'cart_table.product_id = product_table.product_id');
        $this->db->where('cart_table.user_id', $uid);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return []; // Return empty array instead of 0
        }
    }
    public function insert_payment_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function check_product_already_have($table, $productid, $userid)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $productid);
        $this->db->where('user_id', $userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function check_product_already_have_by_token($table, $productid, $cart_token)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $productid);
        $this->db->where('cart_token', $cart_token);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function update_cart_product($table, $productid, $user_id, $data)
    {
        $this->db->where('product_id', $productid);
        $this->db->where('user_id', $user_id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function check_product_exist($table, $productid, $user_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $productid);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true; // Fetch all matching rows
        } else {
            return false; // Return false instead of 0 for better handling
        }
    }
    public function update_cart_product_by_token($table, $productid, $cart_token, $data)
    {
        // Apply conditions to find the row
        $this->db->where('product_id', $productid);
        $this->db->where('cart_token', $cart_token);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function fetch_payment_data($table, $userid)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('user_id', $userid);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Fetch all matching rows
        } else {
            return false; // Return false instead of 0 for better handling
        }
    }




    public function fetch_orders_data($userid)
    {
        $this->db->select('order_table.*, product_table.product_name, product_table.image');
        $this->db->from('order_table');
        $this->db->join('product_table', 'order_table.product_id = product_table.product_id', 'left');
        $this->db->where('order_table.user_id', $userid);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $images = json_decode($row->image);
                $row->image = isset($images[0]) ? $images[0] : null;
            }
            return $result;
        } else {
            return false;
        }
    }
    public function insert_order_data($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return order ID instead of true
        } else {
            $error = $this->db->error();
            log_message('error', 'DB Insert Error: ' . json_encode($error));
            return false;
        }
    }
    public function insert_order_data_now($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return order ID instead of true
        } else {
            $error = $this->db->error();
            log_message('error', 'DB Insert Error: ' . json_encode($error));
            return false;
        }
    }
    public function get_product_by_id($table, $pid)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $pid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result(); // Fetch all matching rows
        } else {
            return false; // Return false instead of 0 for better handling
        }
    }
    public function get_by_id($product_id, $table_name = 'product_table')
    {
        return $this->db->get_where($table_name, ['product_id' => $product_id])->row();
    }
    public function update_product_now($data, $table, $pid)
    {
        $this->db->where('product_id', $pid);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function cancel_order($table, $order_id, $user_id)
    {
        $this->db->where('order_id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->update($table, array('status' => '0'));

        $this->db->where('order_id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('order_table', array('status' => '0'));
        return $this->db->affected_rows();
    }


    public function fetch_reviews_by_product($product_id)
    {
        $this->db->select('reviews.*, product_table.product_name, product_table.image,user_table.fname');
        $this->db->from('reviews');
        $this->db->join('product_table', 'product_table.product_id = reviews.product_id', 'inner');
        $this->db->join('user_table', 'user_table.user_id = reviews.user_id', 'inner');
        $this->db->where('reviews.product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
            foreach ($results as &$review) {
                if (!empty($review['file_path'])) {
                    $review['file_path'] = json_decode($review['file_path'], true);
                } else {
                    $review['file_path'] = [];
                }
            }
            return $results;
        } else {
            return 0;
        }
    }
    public function fetch_reviews_by_slug($slug)
    {
        $this->db->select('reviews.*, product_table.product_name, product_table.image, user_table.fname');
        $this->db->from('reviews');
        $this->db->join('product_table', 'product_table.product_id = reviews.product_id', 'inner');
        $this->db->join('user_table', 'user_table.user_id = reviews.user_id', 'inner');
        $this->db->where('product_table.slug', $slug); // using slug instead of product_id
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $results = $query->result_array();
            foreach ($results as &$review) {
                $review['file_path'] = !empty($review['file_path']) ? json_decode($review['file_path'], true) : [];
            }
            return $results;
        } else {
            return [];
        }
    }

    public function get_usage_by_product_id($product_id, $table)
    {
        return $this->db
            ->where('product_id', $product_id)
            ->where('status !=', 'Deleted')
            ->get($table)
            ->result();
    }

    public function fetch_order_data_by_id($user_id)
    {
        $this->db->select('order_id, user_id, product_id');
        $this->db->from('order_table');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 4);
        $this->db->where('review_proof', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $orders = $query->result();

            foreach ($orders as &$order) {
                $product = $this->get_product_data($order->product_id);
                if ($product) {
                    $order->product_name = $product->product_name;
                    $order->discription = $product->discription;
                    $order->image = $product->image;
                }
            }
            return $orders;
        } else {
            return 0;
        }
    }
    public function get_product_data($product_id)
    {
        $this->db->select('product_name, discription, image');
        $this->db->from('product_table');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Return single row data
        } else {
            return null;
        }
    }


    // public function insert_review($table,$data)
    // {
    //     $this->db->insert('reviews', $data);
    //     return $this->db->affected_rows();

    // }
    public function insert_review($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update_review_proof($order_id)
    {
        $this->db->where('order_id', $order_id);
        $res = $this->db->update('order_table', ['review_proof' => 1]);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public function insert_new_user($table, $uid)
    {
        $this->db->insert($table, $uid);
        return $this->db->affected_rows();
    }
    public function add_new_address($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    public function delete_any_address($table, $id, $status)
    {
        return $this->db->where('id', $id)->update($table, $status);
    }
    public function fetch_all_address($table, $user_id)
    {
        $result = $this->db->select("*")
            ->from($table)
            ->where('user_id', $user_id)
            ->where('status', 'active')
            ->order_by('id', 'DESC') // Assuming 'id' is an auto-increment field
            ->get();

        return $result->result();
    }
    public function save_checkout_data_now($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function save_checkout_data($table, $data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function update_user_id_in_cart_table($table, $old_user_id, $new_user_id, $product_id)
    {
        $this->db->where('user_id', $new_user_id);
        $this->db->where('product_id', $product_id);
        $this->db->update($table, $old_user_id);
        return $this->db->affected_rows();
    }
    public function update_user_id_of_cart($table, $old_user_id, $product_id, $cart_token)
    {
        $this->db->where('cart_token', $cart_token);
        $this->db->where('product_id', $product_id);
        $this->db->update($table, $old_user_id);
        return $this->db->affected_rows();
    }

    public function fetch_product_id_by_name($table)
    {
        $this->db->select('id');
        $this->db->from($table);
        // $this->db->where('product_name',$product_name);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->row()->id;
        } else {
            return 0;
        }
    }
    public function update_user_details_via_checkout($table, $data, $old_user_id)
    {
        $this->db->where('user_id', $old_user_id);
        $result = $this->db->update($table, $data);
        return $result; // returns TRUE if update query was executed (even if 0 rows affected)
    }
    public function update_user_details_via_email($table, $data, $email)
    {
        $this->db->where('email', $email);
        $result = $this->db->update($table, $data);
        return $result; // returns TRUE if update query was executed (even if 0 rows affected)
    }
    public function delete_old_data($table, $old_userid, $product_id)
    {
        $this->db->where('user_id', $old_userid);
        $this->db->where('product_id', $product_id);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            return true; // A row was deleted
        } else {
            return false; // No rows matched the condition
        }
    }

    public function fetch_old_user_id($table, $email)
    {
        $this->db->select('user_id');
        $this->db->from($table);
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->user_id;  // Return single user_id instead of an array
        } else {
            return 0;
        }
    }
    public function check_account_status($table, $email)
    {
        $this->db->select('account_status');
        $this->db->from($table);
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->account_status;  // Return single status instead of an array
        } else {
            return false;
        }
    }

    public function count_cart_items($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->from('cart_table');
        return $this->db->count_all_results();
    }

    public function get_product_by_slug($slug)
    {
        return $this->db->get_where('product_table', ['slug' => $slug])->row();
    }

    public function fetch_user_address_by_address_id($address_id)
    {
        $query = $this->db->where('id', $address_id)->from('user_address')->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function create_order_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function fetch_order_data_for_shiprocket($table, $merchantid)
    {
        $query = $this->db->select('*')->from($table)->where('order_id', $merchantid)->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }
}
