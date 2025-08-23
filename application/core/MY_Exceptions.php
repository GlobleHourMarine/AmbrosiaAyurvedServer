<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {

    public function show_404($page = '', $log_error = TRUE)
    {
        if ($log_error) {
            log_message('error', '404 Page Not Found --> '.$page);
        }

        $CI =& get_instance();
        echo $CI->load->view('Page_404', [], TRUE);
        exit;
    }
}
?>