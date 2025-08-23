<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors_controller extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
   }

   public function page_404()
   {
      $this->output->set_status_header('404');
      $this->load->view('Page_404.php');  // sirf view ka naam
   }

   public function data()
   {
      echo "hey";
   }
}
