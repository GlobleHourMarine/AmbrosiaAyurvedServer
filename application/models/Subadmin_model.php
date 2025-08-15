<?php
defined('BASEPATH') or exit('No direct script access allowed');
class subadmin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert_data($table, $data)
    {
        $response = $this->db->insert($table, $data);
        return $response ? true : false;
    }
    public function check_username($table, $username)
    {
        $query = $this->db->get_where($table, ['name' => $username]);
        return $query->num_rows() > 0;
    }
    public function check_email($table, $email)
    {
        $query = $this->db->get_where($table, ['email' => $email]);
        return $query->num_rows() > 0;
    }
    public function verify_data($table, $data)
    {
        $query = $this->db->get_where($table, ['name' => $data['name'], 'email' => $data['email']]);
        return $query->num_rows() > 0;
    }
    public function get_subadmin($table)
    {
        $query = $this->db->get_where($table, ['status' => 'active', 'role' => 'subadmin']);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function get_modules($table)
    {
        $query = $this->db->select('*')->from($table)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function delete_subadmin($table, $id)
    {
        $result = $this->db->where('id', $id)->update($table, array('status' => 'inactive'));
        return $result ? true : false;
    }
    public function get_permission_by_user_id($admin_id)
    {
        $this->db->select('module_id');
        $this->db->from('permissions');
        $this->db->where('admin_id', $admin_id);
        $result = $this->db->get()->result_array();
        return array_column($result, 'module_id');
        
    }
}
