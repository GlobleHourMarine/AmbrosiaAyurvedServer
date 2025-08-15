<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subadmin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert_data($table, $data)
    {
        $response=$this->db->insert($table, $data);
        return $response ? true : false;
    }

}
?>