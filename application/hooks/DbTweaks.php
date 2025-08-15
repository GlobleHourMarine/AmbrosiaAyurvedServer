<?php
class DbTweaks {
    public function adjust_mysql() {
        $CI =& get_instance();
        if ($CI->db && $CI->db->conn_id) {
            @mysqli_query($CI->db->conn_id, "SET SESSION wait_timeout = 28800");
            @mysqli_query($CI->db->conn_id, "SET SESSION interactive_timeout = 28800");
            @mysqli_query($CI->db->conn_id, "SET SESSION max_allowed_packet = 67108864");
        }
    }
}
