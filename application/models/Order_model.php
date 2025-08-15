<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function save_razorpay_order($your_order_id, $razorpay_order_id)
    {
        $this->db->where('order_id', $your_order_id);
        $this->db->update('order_table', ['razorpay_order_id' => $razorpay_order_id]);
    }
    public function insert_address($data)
    {
        $insert = $this->db->insert('user_address', $data);
        if (!$insert) {
            log_message('error', 'DB Insert Error: ' . $this->db->error()['message']);
        }
        return $insert;
    }
    public function process_order_tracking($orderData)
    {
        // Example logic (you can add DB save or Shiprocket API later)
        return [
            'status'       => 'success',
            'message'      => 'Order received for tracking',
            'orders'       => $orderData,
            'received_at'  => date('Y-m-d H:i:s')
        ];
    }
    public function count_user_orders($userid)
    {
        $this->db->from('order_table');
        $this->db->where('user_id', $userid);
        return $this->db->count_all_results();
    }

    public function fetch_order_data($userid, $limit, $offset)
    {
        $this->db->select('
        order_table.id,
        order_table.created_at, 
        order_table.order_id,
        order_table.product_quantity, 
        order_table.total_price,
        order_table.user_id,
        order_table.status,  
        product_table.product_name,
        product_table.price,
                        ');
        $this->db->from('order_table');
        $this->db->join('product_table', 'order_table.product_id = product_table.product_id', 'left');
        $this->db->join('payment_table', 'order_table.order_id = payment_table.order_id', 'left');
        $this->db->where('order_table.user_id', $userid);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        // Stats
        $this->db->select("
        COUNT(*) as total_orders,
        SUM(CASE WHEN order_table.status = 1 THEN 1 ELSE 0 END) as pending_orders,
        SUM(CASE WHEN order_table.status = 4 THEN 1 ELSE 0 END) as delivered_orders,
        SUM(CASE WHEN order_table.status = 2 THEN 1 ELSE 0 END) as processing_orders,
        SUM(CASE WHEN order_table.status = 5 THEN 1 ELSE 0 END) as shipped_orders
                         ");
        $this->db->from('order_table');
        $this->db->where('order_table.user_id', $userid);
        $stats_query = $this->db->get();

        return [
            'orders' => $query->num_rows() > 0 ? $query->result() : [],
            'stats'  => $stats_query->row()
        ];
    }
    public function get_the_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_table');
        $this->db->where('product_id', $product_id);
        return $this->db->get()->row();
    }
    public function get_the_product_id($product_id, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $product_id);
        return $this->db->get()->row();
    }
    public function get_the_product_by_id2($product_id, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('product_id', $product_id);
        return $this->db->get()->row();
    }
}
