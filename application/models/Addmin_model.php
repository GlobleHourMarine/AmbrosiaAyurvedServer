<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function product_add($table,$data){
        $res=$this->db->insert($table,$data);
        if($res){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function fetch_add_product_data(){
        // $res=$this->db->insert($table,$data);
        $this->db->select('*');
        $this->db->from('product_table');
        $this->db->where('product_status',1);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();     
        }
        else{
            return 0;
        }
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
        $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->result();     
            }
            else{
                return 0;
            }
    }

    public function update_status($id, $status) {
        $this->db->where('payment_id', $id);
        return $this->db->update('payment_table', ['status' => $status]);
    }
    
    public function check_data($table,$email)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('admin_email',$email);
        $res=$this->db->get();
        return $res->row();
    }

    public function change_password($newpassword,$email)
    {
            $this->db->where('admin_email',$email);
            $this->db->update('admin_table', array('admin_password' => $newpassword));
            return $this->db->affected_rows();  
    }
}
?>