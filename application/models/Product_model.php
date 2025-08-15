<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function product_add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id(); // ✅ return the new product ID
    }
    public function data_add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id(); // ✅ return the new product ID
    }
    public function fetch_add_product_data()
    {

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
    public function update_data($table, $data, $where)
    {
        return $this->db->where($where)->update($table, $data);
    }
    public function delete_data($table, $where)
    {
        return $this->db->where($where)->update($table, ['status' => 'Deleted']);
    }
    public function fetch_package($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_pack');
        $this->db->where('product_id', $id);
        $this->db->where('status!=', 'Deleted');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
        public function fetch_benefits($id)
    {

        $this->db->select('*');
        $this->db->from('product_benefits');
        $this->db->where('product_id', $id);
        $this->db->where('status !=', 'Deleted');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    public function fetch_how_to_use_data($id)
    {
        $this->db->select('*');
        $this->db->from('product_usage');
        $this->db->where('product_id', $id);
        $this->db->where('status !=', 'Deleted');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    public function remove_product_now($table, $product_id)
    {
        $this->db->where('product_id', $product_id); // Condition to find the product
        return $this->db->update($table, ['product_status' => 0]); // Update status to 0 (inactive)
    }
    public function fetch_faq_data($id)
    {
        $this->db->select('*');
        $this->db->from('product_faq');
        $this->db->where('product_id', $id);
        $this->db->where('status !=', 'Deleted');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
}
