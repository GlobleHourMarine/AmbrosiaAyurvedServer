<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alternative_model extends CI_model{
    public function __construct() {
        parent::__construct();
       $this->load->database();
    }
 public function get_alternate_orderflow_status($table)
    {
        $this->db->select('flow_status');  
        $this->db->from($table);
         $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->flow_status;
        } else {
            return 0 ; 
        }
    }
}
?>