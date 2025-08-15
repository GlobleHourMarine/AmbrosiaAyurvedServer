<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(FCPATH . 'dompdf/autoload.inc.php'); // ✅ load the autoloader

use Dompdf\Dompdf;
use Dompdf\Options;




/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Uri $uri
 * @property CI_Pagination $pagination
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Router $router
 * @property CI_Security $security
 * @property CI_DB $db
 * @property CI_Email $email
 * @property Your_model_name $usermodel
 * @property Your_model_name $admin_model
 * @property Your_model_name $Investment_model
 * @property Your_model_name $package_model
 * @property Your_model_name $User
 */
class admin_reports extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reports_model');
        $this->load->model('usermodel');
        $this->load->library('pagination');
        $this->load->helper('download');

        // ✅ Fetch admin session data
        $admin = $this->session->userdata('admin');

        // ✅ Session check
        if (!$admin || empty($admin['logged_in'])) {
            $this->session->set_flashdata('error', 'Your session has expired or you are not authorized.');
            redirect('admin');
            exit();
        }

        // ✅ Subadmin access check
        if ($admin['role'] === 'subadmin' && isset($admin['subadmin_module_ids'])) {
            $allowed_modules = $admin['subadmin_module_ids'];
            if (!in_array(6, $allowed_modules)) {
                show_error('Access Denied: You are not authorized to access this module.', 403);
            }
        }
    }


    public function admin_order_details()
    {
        $config['base_url'] = base_url('Admin_reports/admin_order_details'); // URL for pagination links
        $config['total_rows'] = $this->Reports_model->get_total_orders(); // Total number of orders
        $config['per_page'] = 10; // Number of orders per page
        $config['uri_segment'] = 3; // Segment in the URL that indicates the page number (e.g., admin/admin_order_details/10)
        // Bootstrap 4 pagination styling (optional)
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link'); // Bootstrap 4 style

        $this->pagination->initialize($config); // Initialize the pagination

        $page = (int)$this->uri->segment(3, 0); // Use 0 as default if segment 3 is missing or not a number
        // Get the current page number

        $response['order_details'] = $this->Reports_model->get_orders_with_users($config['per_page'], $page); // Get orders for the current page
        $response['total'] = $this->Reports_model->get_total_order_amount(); // Get total amount (no pagination needed here)
        $response['pagination'] = $this->pagination->create_links(); // Generate pagination links

        $data['content'] = $this->load->view('Admin/orders.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function filter_orders()
    {
        $filter_type = $this->input->post('filter_type');
        $search_term = $this->input->post('search_term');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $country = $this->input->post('country');
        $page = (int)$this->input->post('page', true);

        $_GET['page'] = $page;

        $config['base_url'] = base_url('Admin_reports/filter_orders');
        $config['total_rows'] = $this->Reports_model->get_total_filtered_orders($filter_type, $search_term, $from_date, $to_date, $country);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        $order_details = $this->Reports_model->get_filtered_orders($filter_type, $search_term, $from_date, $to_date, $country, $config['per_page'], $page);
        $total_amount = $this->Reports_model->get_total_order_amount($filter_type, $search_term, $from_date, $to_date, $country);
        $pagination_links = $this->pagination->create_links();

        echo json_encode([
            'order_details' => $order_details,
            'total' => $total_amount,
            'pagination' => $pagination_links
        ]);
    }

    // export code....
    public function export_orders()
    {
        $filter_type = $this->input->get('filter_type');
        $search_term = $this->input->get('search_term');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $country = $this->input->get('country');
        $export_format = $this->input->get('format');

        $orders = $this->Reports_model->get_filtered_orders($filter_type, $search_term, $from_date, $to_date, $country);

        if (empty($orders)) {
            echo "No orders found to export with the applied filters.";
            return;
        }

        $header = [
            'Order ID',
            'Customer ID',
            'Customer Name',
            'Country',
            'Product ID',
            'No. of Products',
            'Product Amount',
            'GST',
            'Total Amount',
            'Date',
            'Status'
        ];

        $data = [];
        foreach ($orders as $order) {
            $statusMap = [
                0 => 'Cancelled',
                1 => 'Pending',
                2 => 'Processing',
                3 => 'Rejected',
                4 => 'Delivered'
            ];
            $statusText = $statusMap[(int)$order['status']] ?? 'Unknown';

            $data[] = [
                '#ORD-' . $order['order_id'],
                'CUST-' . $order['user_id'],
                $order['fname'] . ' ' . $order['lname'],
                $order['country'],
                'PROD-' . $order['product_id'],
                $order['product_quantity'],
                'Rs.' . $order['product_price'],
                'Rs.' . number_format($order['product_price'] * 0.12, 2),
                'Rs.' . $order['total_price'],
                date('d M Y', strtotime($order['created_at'])),
                $statusText
            ];
        }

        $filename = 'orders_' . date('Ymd_His');

        if ($export_format === 'csv') {
            $this->output_csv($header, $data, $filename . '.csv');
        } elseif ($export_format === 'excel') {
            $this->output_csv($header, $data, $filename . '.csv', true);
        } elseif ($export_format === 'pdf') {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $options->set('defaultFont', 'DejaVu Sans');

            $dompdf = new Dompdf($options);

            $html = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <title>Order Details Export</title>
            <style>
                body { font-family: sans-serif; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
                h1 { text-align: center; margin-bottom: 20px; }
                .total-amount { text-align: right; font-weight: bold; margin-top: 10px; }
            </style>
        </head>
        <body>
            <h1>Order Details Report</h1>
            <table>
                <thead><tr>';

            foreach ($header as $col) {
                $html .= '<th>' . htmlspecialchars($col) . '</th>';
            }

            $html .= '</tr></thead><tbody>';

            foreach ($data as $row) {
                $html .= '<tr>';
                foreach ($row as $cell) {
                    $html .= '<td>' . htmlspecialchars($cell) . '</td>';
                }
                $html .= '</tr>';
            }

            $html .= '</tbody></table>';

            $total_amount = $this->Reports_model->get_total_order_amount($filter_type, $search_term, $from_date, $to_date, $country);

            $html .= '<div class="total-amount">Total Amount: Rs.' . number_format($total_amount, 2) . '</div>';

            $html .= '</body></html>';

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream($filename . '.pdf', ["Attachment" => 1]);
        } else {
            echo "Invalid export format.";
        }
    }



    private function output_csv($header, $data, $filename, $for_excel = false)
    {
        $output = '';

        if ($for_excel) {
            // Add UTF-8 BOM for Excel compatibility
            $output .= "\xEF\xBB\xBF";
        }

        // Add headers
        $output .= implode(',', array_map(function ($value) {
            return '"' . str_replace('"', '""', $value) . '"';
        }, $header)) . "\n";

        // Add data rows
        foreach ($data as $row) {
            $output .= implode(',', array_map(function ($value) {
                return '"' . str_replace('"', '""', $value) . '"';
            }, $row)) . "\n";
        }

        force_download($filename, $output);
    }



    public function payment_details()
    {
        $config['base_url'] = base_url('admin_dashboard/payment_details');
        $config['total_rows'] = $this->Reports_model->count_all_payments(); // Get total rows first
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        // Bootstrap 4 pagination markup
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];

        $response['pagination_links'] = ''; // Initialize to empty

        // Only create pagination links if total rows exceed per_page
        if ($config['total_rows'] > $config['per_page']) {
            $this->pagination->initialize($config);
            $response['pagination_links'] = $this->pagination->create_links();
        }

        $page = (int)$this->uri->segment(3, 0);
        $response['result'] = $this->Reports_model->fetch_payment_details_data($config['per_page'], $page);

        $data['content'] = $this->load->view('Admin/payment_details.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function filter_payments()
    {
        $filter_type = $this->input->post('filter_type');
        $search_term = $this->input->post('search_term');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $page = max(1, (int)$this->input->post('page', true));

        $per_page = 10;
        $offset = ($page - 1) * $per_page;

        // Fetch filtered data and counts
        $total_rows = $this->Reports_model->get_total_filtered_payments($filter_type, $search_term, $from_date, $to_date);
        $payment_details = $this->Reports_model->get_filtered_payments($filter_type, $search_term, $from_date, $to_date, $per_page, $offset);
        $total_amount = $this->Reports_model->get_total_payment_amount($filter_type, $search_term, $from_date, $to_date);

        // Return JSON response
        echo json_encode([
            'payment_details' => $payment_details,
            'total' => $total_amount,
            'limit' => $per_page,
            'current_page' => $page,
            'total_rows' => $total_rows
        ]);
    }


    public function export_payments()
    {
        $filter_type   = $this->input->get('filter_type');
        $search_term   = $this->input->get('search_term');
        $from_date     = $this->input->get('from_date');
        $to_date       = $this->input->get('to_date');
        $export_format = $this->input->get('format'); // 'csv', 'excel', 'pdf'

        // Fetch all filtered payments (no pagination)
        $payments = $this->Reports_model->get_all_filtered_payments($filter_type, $search_term, $from_date, $to_date);

        if (empty($payments)) {
            echo "No payments found to export with the applied filters.";
            return;
        }

        $header = [
            'Name',
            'Payment Method',
            'Amount',
            'Country',
            'Date',
            'Status'
        ];

        $statusMap = [
            0 => 'Cancelled',
            1 => 'Pending',
            2 => 'Processing',
            3 => 'Rejected',
            4 => 'Delivered',
            'completed' => 'Done',
            'failed' => 'Failed'
        ];

        $data = [];
        foreach ($payments as $p) {
            // Handle both numeric and string statuses
            $statusKey = strtolower(trim($p->status));
            $statusText = isset($statusMap[$statusKey]) ? $statusMap[$statusKey] : ucfirst($statusKey);

            // Format date
            $dateFormatted = date('d M Y', strtotime($p->date));

            // Fallback for payment method
            $method = !empty($p->payment_method) ? $p->payment_method : (!empty($p->payment_mode) ? $p->payment_mode : 'N/A');

            $data[] = [
                $p->fname . ' ' . $p->lname,
                $method,
                'Rs.' . number_format((float)$p->amount, 2),
                $p->country,
                $dateFormatted,
                $statusText
            ];
        }

        $filename = 'payments_' . date('Ymd_His');

        if ($export_format === 'csv') {
            $this->output_csv_payment($header, $data, $filename . '.csv');
        } elseif ($export_format === 'excel') {
            $this->output_csv_payment($header, $data, $filename . '.csv', true);
        } elseif ($export_format === 'pdf') {
            $this->export_payments_pdf($header, $data, $filename, $filter_type, $search_term, $from_date, $to_date);
        } else {
            echo "Invalid export format.";
        }
    }


    private function export_payments_pdf($header, $data, $filename, $filter_type, $search_term, $specific_date)
    {
        // Assuming you autoload Dompdf or load here manually
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);

        // Calculate total amount for footer
        $total_amount = $this->Reports_model->get_total_payment_amount($filter_type, $search_term, $specific_date);

        // Build HTML for PDF
        $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Payment Details Export</title>
        <style>
            body { font-family: sans-serif; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            h1 { text-align: center; margin-bottom: 20px; }
            .total-amount { text-align: right; font-weight: bold; margin-top: 10px; }
        </style>
    </head>
    <body>
        <h1>Payment Details Report</h1>
        <table>
            <thead><tr>';

        foreach ($header as $col) {
            $html .= '<th>' . htmlspecialchars($col) . '</th>';
        }

        $html .= '</tr></thead><tbody>';

        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . htmlspecialchars($cell) . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table>
        <div class="total-amount">
            Total Amount: Rs.' . number_format($total_amount, 2) . '
        </div>
    </body>
    </html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename . '.pdf', ['Attachment' => 1]);
    }

    private function output_csv_payment($header, $data, $filename, $for_excel = false)
    {
        $output = '';

        if ($for_excel) {
            $output .= "\xEF\xBB\xBF";  // UTF-8 BOM for Excel
        }

        // Header row
        $output .= implode(',', array_map(function ($val) {
            return '"' . str_replace('"', '""', $val) . '"';
        }, $header)) . "\n";

        // Data rows
        foreach ($data as $row) {
            $output .= implode(',', array_map(function ($val) {
                return '"' . str_replace('"', '""', $val) . '"';
            }, $row)) . "\n";
        }

        force_download($filename, $output);
    }
    public function sales_details()
    {
        $data['sales'] = $this->Reports_model->get_all_sales_details();
        $data['content'] = $this->load->view('Admin/sales.php', $data, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function sales_list_ajax()
    {
        $filter_type = $this->input->get('filter_type');
        $search_term = $this->input->get('search_term');
        $from_date = $this->input->get('from_date'); // updated
        $to_date = $this->input->get('to_date');     // updated
        $page = (int) $this->input->get('page') ?: 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $result = $this->Reports_model->get_filtered_sales($filter_type, $search_term, $from_date, $to_date, $limit, $offset);

        echo json_encode([
            'sales' => $result['sales'],
            'total' => $result['total'],
            'limit' => $limit,
            'total_amount' => $result['total_amount']
        ]);
    }
    public function export_sales()
    {
        $filter_type = $this->input->get('filter_type');
        $search_term = $this->input->get('search_term');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $export_format = $this->input->get('format'); // 'csv', 'excel', 'pdf'

        // Fetch all filtered sales (no limit/offset)
        $sales = $this->Reports_model->get_filtered_sales($filter_type, $search_term, $from_date, $to_date, null, null)['sales'];

        if (empty($sales)) {
            echo "No sales records found to export.";
            return;
        }

        $header = [
            'Customer Name',
            'Country',
            'Mobile',
            'Amount',
            'Date',
            'Payment Status'
        ];

        $data = [];
        $statusMap = [
            0 => 'Pending',
            1 => 'Done',
            2 => 'Rejected',
        ];

        foreach ($sales as $sale) {
            $fullName = trim(($sale->fname ?? '') . ' ' . ($sale->lname ?? ''));
            $paymentStatus = $statusMap[$sale->payment_status] ?? 'Unknown';

            $data[] = [
                $fullName,
                $sale->country ?? 'N/A',
                $sale->mobile ?? 'No phone',
                'Rs.' . round(floatval($sale->amount)),
                date('d M Y', strtotime($sale->date)),
                $paymentStatus
            ];
        }

        $filename = 'sales_' . date('Ymd_His');

        if ($export_format === 'csv' || $export_format === 'excel') {
            $this->output_csv_sales($header, $data, $filename . '.csv', $export_format === 'excel');
        } elseif ($export_format === 'pdf') {
            $options = new \Dompdf\Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $options->set('defaultFont', 'DejaVu Sans');

            $dompdf = new \Dompdf\Dompdf($options);

            $html = '<h1>Sales Report</h1><table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
            $html .= '<thead><tr>';
            foreach ($header as $col) {
                $html .= '<th style="background:#eee;">' . htmlspecialchars($col) . '</th>';
            }
            $html .= '</tr></thead><tbody>';
            foreach ($data as $row) {
                $html .= '<tr>';
                foreach ($row as $cell) {
                    $html .= '<td>' . htmlspecialchars($cell) . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</tbody></table>';

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream($filename . '.pdf', ['Attachment' => 1]);
        } else {
            echo "Invalid export format.";
        }
    }


    private function output_csv_sales($header, $data, $filename, $for_excel = false)
    {
        $output = '';

        if ($for_excel) {
            // UTF-8 BOM for Excel
            $output .= "\xEF\xBB\xBF";
        }

        // Headers
        $output .= implode(',', array_map(function ($val) {
            return '"' . str_replace('"', '""', $val) . '"';
        }, $header)) . "\n";

        // Rows
        foreach ($data as $row) {
            $output .= implode(',', array_map(function ($val) {
                return '"' . str_replace('"', '""', $val) . '"';
            }, $row)) . "\n";
        }

        force_download($filename, $output);
    }


    public function all_users_details()
    {
        // echo "hello";
        // die();
        $response['result'] = $this->Reports_model->fetch_all_user_details();
        $response['user_stats'] = $this->Reports_model->get_user_stats();

        // print_r($user_data);
        // die();
        $data['content'] = $this->load->view('Admin/all_user_details.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function fetch_users_ajax()
    {
        $filter_type = $this->input->post('filter_type');
        $search_term = $this->input->post('search_term');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $page = (int)$this->input->post('page');
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $users = $this->Reports_model->get_filtered_users($filter_type, $search_term, $from_date, $to_date, $limit, $offset);
        $total = $this->Reports_model->count_filtered_users($filter_type, $search_term, $from_date, $to_date);

        echo json_encode([
            'users' => $users,
            'total' => $total,
            'per_page' => $limit
        ]);
    }

    public function update_user_field()
    {
        $user_id = $this->input->post('user_id');
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        // Allow only specific fields to be updated
        $allowed_fields = ['name', 'email', 'mobile', 'country'];

        if (!in_array($field, $allowed_fields)) {
            show_error('Invalid field', 400);
            return;
        }

        if ($field == 'name') {
            $names = explode(' ', $value, 2);
            $data = [
                'fname' => $names[0] ?? '',
                'lname' => $names[1] ?? ''
            ];
        } else {
            $data = [$field => $value];
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user_table', $data);

        echo json_encode(['status' => 'success']);
    }



    public function export_users()
    {
        $filter_type = $this->input->get('filter_type');
        $search_term = $this->input->get('search_term');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $export_format = $this->input->get('format');

        // Use updated model method that accepts from and to dates
        $users = $this->Reports_model->get_filtered_users2($filter_type, $search_term, $from_date, $to_date);

        if (empty($users)) {
            echo "No users found to export with the applied filters.";
            return;
        }

        $header = [
            'User ID',
            'First Name',
            'Last Name',
            'Email',
            'Mobile',
            'Country',
            'Created At',
        ];

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'USER-' . ($user->user_id ?? ''),
                $user->fname ?? '',
                $user->lname ?? '',
                $user->email ?? 'No email',
                $user->mobile ?? 'No phone',
                $user->country ?? '',
                isset($user->created_at) ? date('d M Y', strtotime($user->created_at)) : '',
            ];
        }

        $filename = 'users_' . date('Ymd_His');

        if ($export_format === 'csv') {
            $this->output_csv_user($header, $data, $filename . '.csv');
        } elseif ($export_format === 'excel') {
            $this->output_csv_user($header, $data, $filename . '.csv', true);
        } elseif ($export_format === 'pdf') {
            $this->export_users_pdf($header, $data, $filename);
        } else {
            echo "Invalid export format.";
        }
    }


    private function output_csv_user($header, $data, $filename, $for_excel = false)
    {
        $output = '';

        if ($for_excel) {
            $output .= "\xEF\xBB\xBF"; // Excel compatibility
        }

        $output .= implode(',', array_map(function ($value) {
            return '"' . str_replace('"', '""', $value ?? '') . '"';
        }, $header)) . "\n";

        foreach ($data as $row) {
            $output .= implode(',', array_map(function ($value) {
                return '"' . str_replace('"', '""', $value ?? '') . '"';
            }, $row)) . "\n";
        }

        force_download($filename, $output);
    }

    private function export_users_pdf($header, $data, $filename)
    {
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new \Dompdf\Dompdf($options);

        $html = '
    <html>
    <head>
        <style>
            body { font-family: sans-serif; }
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid #ddd; padding: 8px; }
            th { background-color: #f2f2f2; }
            h1 { text-align: center; }
        </style>
    </head>
    <body>
        <h1>User Details Report</h1>
        <table>
            <thead><tr>';

        foreach ($header as $col) {
            $html .= '<th>' . htmlspecialchars($col) . '</th>';
        }

        $html .= '</tr></thead><tbody>';

        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . htmlspecialchars($cell ?? '') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table></body></html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename . '.pdf', ['Attachment' => 1]);
    }
}
