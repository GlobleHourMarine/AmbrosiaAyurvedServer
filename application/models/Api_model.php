<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insertdata($tabel,$data)
    {
        // print_r($data);
        // die();
        $res=$this->db->insert($tabel,$data);
        if($res){
            return 1;
        }
        else{
            return 0;
        }
    }
    
   
}
?>