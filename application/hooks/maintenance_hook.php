<?php
function check_maintenance_mode() {
    $CI =& get_instance();

    // Allow CLI and allowed IPs
    if (is_cli()) return;
    $allowed_ips = ['127.0.0.1', '::1'];
    if (in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) return;

    // Get controller and method using router
    $controller = strtolower($CI->router->fetch_class());
    $method = strtolower($CI->router->fetch_method());

    $allowed_controllers = ['admin', 'admin_dashboard']; // Allowed controllers

    if (in_array($controller, $allowed_controllers)) {
        return; // Allow all methods inside admin controller
    }

    // Now check maintenance flag in DB (use CI's DB this time)
    $CI->load->database();
    $status = $CI->db->select('website_manage')->where('id', 1)->get('admin_table')->row();

    if ($status && strtolower($status->website_manage) === 'active') {
        include(APPPATH . 'views/website.php');
        exit;
    }
}



// function check_maintenance_mode() {
//     // Allow CLI (e.g., cron jobs)
//     if (is_cli()) return;

//     // Allow these IPs (e.g., developers)
//     $allowed_ips = ['127.0.0.1', '::1'];
//     if (in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) return;

//     // Allowed controllers while in maintenance mode
//     $allowed_controllers = ['admin', 'admin_dashboard']; // Add more like 'admin', 'api' etc.

//     // Detect the first URI segment
//     $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//     $segments = explode('/', trim($uri_path, '/'));
    
//     if (isset($segments[0]) && strtolower($segments[0]) == 'index.php') {
//         array_shift($segments);
//     }

//     $controller = isset($segments[0]) ? strtolower($segments[0]) : '';
//     $method = isset($segments[1]) ? strtolower($segments[1]) : '';

//     error_log("Controller: $controller, Method: $method"); // Check your PHP error log
    
//     // Continue your logic here...


//     // Allow access if controller is in whitelist
//     if (in_array($controller, $allowed_controllers)) return;

//     // Manually connect to the database
//     $conn = new mysqli('localhost', 'u467404997_amb_2025', 'GHM@Marine2025', 'u467404997_amb');

//     if ($conn->connect_error) {
//         die('Database connection failed: ' . $conn->connect_error);
//     }

//     $query = "SELECT website_manage FROM admin_table WHERE id = 1";
//     $result = $conn->query($query);

//     if ($result && $row = $result->fetch_assoc()) {
//         if (strtolower($row['website_manage']) === 'active') {
//             include(APPPATH . 'views/website.php'); // Your maintenance view
//             exit;
//         }
//     }

//     $conn->close();
// }
