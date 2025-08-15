<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function product_add($table, $data)
    {
        $res = $this->db->insert($table, $data);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
    public function fetch_add_product_data()
    {
        // $res=$this->db->insert($table,$data);
        $this->db->select('*');
        $this->db->from('product_table');
        $this->db->where('product_status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function fetch_all_user_details()
    {
        // $res=$this->db->insert($table,$data);
        $this->db->select('*');
        $this->db->from('user_table');
        // $this->db->where('account_status','');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function change_website_status($table, $status)
    {
        $this->db->where('website_manage!=', $status['manage_website']);
        return $this->db->update($table, $status);
    }   

    public function remove_product_now($table, $product_id)
    {
        $this->db->where('product_id', $product_id); // Condition to find the product
        return $this->db->update($table, ['product_status' => 0]); // Update status to 0 (inactive)
    }
    public function update_product($table, $product_id)
    {
        $this->db->where('product_id', $product_id); // Condition to find the product
        return $this->db->update($table, ['product_status' => 0]);
    }

    public  function fetch_payment_details_data()
    {
        $this->db->select('payment_table.*, user_table.fname,user_table.lname');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id'); // Joining condition
        // $this->db->where('status')
        // $this->db->where('payment_table.status !=', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }


    public function fetch_order_summary()
    {
        $this->db->select("COUNT(*) as total_orders,
                           SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as pending_orders,
                           SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as approved_orders,
                           SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) as rejected_orders,
                           SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as cancelled_orders");
        $this->db->from("payment_table");
        $query = $this->db->get();
        return $query->row();
    }


    public function update_status($id, $status)
    {
        // First, fetch the order_id before updating
        $this->db->select('order_id');
        $this->db->where('payment_id', $id);
        $query = $this->db->get('payment_table');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $order_id = $row->order_id; // Store order_id

            // Now update the status
            $this->db->where('payment_id', $id);
            $this->db->update('payment_table', ['status' => $status]);

            if ($this->db->affected_rows() > 0) {
                return $order_id; // Return the order_id from the affected row
            }
        }

        return 0; // Return 0 if no row was affected or not found
    }

    public function update_order_status($id, $status)
    {
        $this->db->where('order_id', $id);
        $this->db->update('order_table', ['status' => $status]);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return 0;
        }
    }

    public function check_data($table, $email)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('admin_email', $email);
        $res = $this->db->get();
        return $res->row();
    }

    public function change_password($newpassword, $email)
    {
        $this->db->where('admin_email', $email);
        $this->db->update('admin_table', array('admin_password' => $newpassword));
        return $this->db->affected_rows();
    }

    public function add_coupon_code($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function fetch_coupon_code($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_coupon_code_by_id($table, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function fetch_coupon_list($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('order_table');
        $this->db->where('order_id', $order_id);
        $res = $this->db->get();
        return $res->row();
    }


    public function get_active_banners()
    {
        return $this->db->where('status', 'active')->get('banners')->result();
    }

    public function insert_banner($data)
    {
        return $this->db->insert('banners', $data);
    }

    // Fetch all banners
    public function get_all_banners()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('banners')->result_array();
    }
    public function delete_banner($id)
    {
        // Set status to Inactive for the given banner ID
        $this->db->where('id', $id);
        $res = $this->db->update('banners', ['status' => 'Inactive']);

        // Return boolean instead of 1/0 for clarity
        return $res ? true : false;
    }

    public function count_all_orders($table)
    {
        return $this->db->count_all($table);
    }
    public function count_all_customers()
    {
        return $this->db->count_all('user_table');
    }
    public function get_pending_orders($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('order_table');  // returns an array of order objects
    }
    public function get_new_users()
    {
        $this->db->where('created_at >=', date('Y-m-d', strtotime('-30 days')));
        return $this->db->count_all_results('user_table');
    }
    public function get_ordered_history()
    {
        $this->db->select('product_table.product_name, product_table.price, order_table.created_at, order_table.status');
        $this->db->from('order_table');
        $this->db->join('product_table', 'product_table.product_id = order_table.product_id');
        $this->db->order_by('order_table.created_at', 'DESC'); // Latest orders first
        $this->db->limit(4); // Only the latest 5
        return $this->db->get()->result();  // returns array of objects
    }

    public function get_payment_distribution_by_region()
    {
        $this->db->select('u.country, COUNT(p.user_id) as total');
        $this->db->from('payment_table p');
        $this->db->join('user_table u', 'p.user_id = u.user_id');
        $this->db->group_by('u.country');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_countries_by_payment_amount()
    {
        $this->db->select('u.country, SUM(p.amount) as total_amount');
        $this->db->from('payment_table p');
        $this->db->join('user_table u', 'p.user_id = u.user_id');
        $this->db->group_by('u.country');
        $this->db->order_by('total_amount', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_country_order_stats()
    {
        $this->db->select('u.country, COUNT(p.order_id) as order_count, SUM(p.amount) as total_payment');
        $this->db->from('payment_table p');
        $this->db->join('user_table u', 'p.user_id = u.user_id');
        $this->db->group_by('u.country');
        $this->db->order_by('total_payment', 'DESC');
        return $this->db->get()->result();
    }
    public function get_current_month_total()
    {
        $this->db->select("SUM(amount) AS total_amount");
        $this->db->from('payment_table');
        $this->db->where("MONTH(date)", date('m'));
        $this->db->where("YEAR(date)", date('Y'));

        $query = $this->db->get();
        return $query->row_array();  // returns ['total_amount' => value]
    }
    public function get_years() {
        $this->db->select('DISTINCT YEAR(date) as year');
        $this->db->order_by('year', 'DESC');
        $query = $this->db->get('payment_table');
        return array_column($query->result_array(), 'year');
    }

    // Get monthly sums for a given year
    public function get_monthly_sums_by_year($year) {
        $this->db->select("MONTH(date) as month, SUM(amount) as total_amount");
        $this->db->where("YEAR(date)", $year);
        $this->db->group_by("MONTH(date)");
        $this->db->order_by("MONTH(date)");
        $query = $this->db->get('payment_table');
        $results = $query->result_array();

        // Prepare array with all months (1-12) initialized to 0
        $monthly_data = array_fill(1, 12, 0);

        // Fill data from query
        foreach ($results as $row) {
            $monthly_data[(int)$row['month']] = (float)$row['total_amount'];
        }

        // Convert numeric month keys to short month names for labels
        $labels = [];
        for ($m = 1; $m <= 12; $m++) {
            $labels[] = date('M', mktime(0, 0, 0, $m, 10));
        }

        return [
            'labels' => $labels,
            'data' => array_values($monthly_data)
        ];
    }
    public function check_website_status() {}
}
