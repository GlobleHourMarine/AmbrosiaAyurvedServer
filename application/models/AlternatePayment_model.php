<?php
Defined('BASEPATH') or exit('No direct script access allowed');
class AlternatePayment_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        }
    

        public function insert_user_data($table, $data)
        {
             $this->db->insert($table, $data);
            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            } else {
                // Log the actual database error
                $error = $this->db->error();
                file_put_contents(APPPATH . 'logs/db_errors.log', 
                    "User Insert Error: " . print_r($error, true) . "\nData: " . print_r($data, true), 
                    FILE_APPEND);
                return false;
            }
        }

        public function insert_address_data($table, $data)
        {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }



}


?>