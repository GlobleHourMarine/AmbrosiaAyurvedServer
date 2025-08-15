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
class Admin_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('usermodel');
        $this->load->model('Reports_model');
        $this->load->library('pagination');
        $this->load->helper('download');

        $admin = $this->session->userdata('admin');

        // ✅ Check if session exists
        if (!$admin || empty($admin['logged_in'])) {
            $this->session->set_flashdata('error', 'Your session has expired or you are not authorized.');
            redirect('admin');
            exit();
        }

        // ✅ Subadmin access check (only if module list is set)
        if ($admin['role'] === 'subadmin' && isset($admin['subadmin_module_ids'])) {
            $allowed_modules = $admin['subadmin_module_ids'];
            if (!in_array(6, $allowed_modules)) {
                show_error('Access Denied: You are not authorized to access this module.', 403);
            }
        }
    }

    public function dashboard()
    {

        $years = $this->admin_model->get_years();

        // Use the latest year for initial chart load
        $latest_year = !empty($years) ? $years[0] : date('Y');
        $monthly_sums = $this->admin_model->get_monthly_sums_by_year($latest_year);

        $data = [
            'years' => $years,
            'latest_year' => $latest_year,
            'monthly_sums' => $monthly_sums
        ];
        $data['total_orders'] = $this->admin_model->count_all_orders('order_table');
        $data['total_coustomer'] = $this->admin_model->count_all_orders('user_table');
        $data['pending_orders'] = $this->admin_model->get_pending_orders(1);
        $data['order_deleverd'] = $this->admin_model->get_pending_orders(4);
        $data['cancel_orders'] = $this->admin_model->get_pending_orders(3);
        $data['new_user'] = $this->admin_model->get_new_users();
        $data['orders_history'] = $this->admin_model->get_ordered_history();
        $data['country_chart'] = $this->get_country_payment_data();
        $data['country_table'] = $this->get_country_payment_table_data();
        $data['current_month_total'] = $this->admin_model->get_current_month_total();

        $distribution_data = $this->admin_model->get_payment_distribution_by_region();

        $india_total = 0;
        $international_total = 0;

        foreach ($distribution_data as $row) {
            if (strtolower(trim($row->country)) === 'india') {
                $india_total += $row->total;
            } else {
                $international_total += $row->total;
            }
        }

        $total = $india_total + $international_total;

        $india_percent = $total > 0 ? round(($india_total / $total) * 100, 2) : 0;
        $international_percent = $total > 0 ? round(($international_total / $total) * 100, 2) : 0;

        $data['region_chart'] = [
            'labels' => ['India', 'International'],
            'data' => [$india_percent, $international_percent]
        ];


        $data['content'] = $this->load->view('Admin/dashboard.php', $data, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function get_monthly_sums()
    {
        $year = $this->input->get('year');
        $monthly_sums = $this->admin_model->get_monthly_sums_by_year($year);

        echo json_encode($monthly_sums);
    }
    public function get_country_payment_data()
    {
        $all_countries_data = $this->admin_model->get_all_countries_by_payment_amount();

        $country_labels = [];
        $country_amounts = [];

        foreach ($all_countries_data as $row) {
            $country_labels[] = $row->country ?: 'Unknown';
            $country_amounts[] = round($row->total_amount / 1000, 2);
        }

        return [
            'labels' => $country_labels,
            'data' => $country_amounts
        ];
    }
    private function get_country_payment_table_data()
    {
        $country_data = $this->admin_model->get_country_order_stats();

        $total_payment = 0;
        foreach ($country_data as $row) {
            $total_payment += $row->total_payment;
        }

        $table_data = [];
        foreach ($country_data as $row) {
            $percentage = $total_payment > 0 ? round(($row->total_payment / $total_payment) * 100, 2) : 0;
            $table_data[] = [
                'country' => $row->country ?: 'Unknown',
                'sessions' => number_format($row->order_count), // 
                'payment' => 'Rs.' . number_format($row->total_payment, 0),
                'percentage' => $percentage
            ];
        }

        return $table_data;
    }




    public function banner()
    {
        $response['banners'] = $this->admin_model->get_active_banners();
        // print_r($data);
        // die();
        $data['content'] = $this->load->view('Admin/add_banners', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }


    public function add_banners()
    {
        $title = $this->input->post('title');
        // $link = $this->input->post('link');
        $status = $this->input->post('status');

        // File Upload Configuration
        $config['upload_path'] = './uploads/banners/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bannerImage')) {
            $data['error'] = $this->upload->display_errors();
            $data['banners'] = $this->admin_model->get_all_banners();
            $this->load->view('Admin/add_banners', $data);
        } else {
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

            $insert_data = array(
                'title' => $title,
                'status' => $status,
                'image' => $image_name,
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->admin_model->insert_banner($insert_data);
            redirect('banner');
        }
    }
    public function delete_banner($id)
    {
        $res = $this->admin_model->delete_banner($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Banner deleted successfully!');
            redirect('banner');
        } else {
            $this->session->set_flashdata('error', 'Someting went wrong!');
        }
    }


    public function remove_product()
    {
        $response['product_data'] = $this->admin_model->fetch_add_product_data();
        $data['content'] = $this->load->view('Admin/remove_product.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function remove_product_action()
    {
        $product_id = $this->input->post('product_id');

        $res = $this->admin_model->remove_product_now('product_table', $product_id);
        if ($res) {
            $this->session->set_flashdata('message', 'Product Removed Successfully');
            redirect('remove_product');
        } else {
            $this->session->set_flashdata('message', 'Product Not Removed');
            redirect('remove_product');
        }
    }

    public function update_product()
    {

        $product_id = $this->input->post('product_id');
        echo $product_id;
        die();
        if ($res) {
            $this->session->set_flashdata('message', 'Product updated Successfully');
            redirect('remove_product');
        } else {
            $this->session->set_flashdata('message', 'Product Not updated');
            redirect('edit_product_page');
        }
    }
    public function update_product_details()
    {

        $product_id = $this->input->get('product_id'); // Fetch ID from URL query parameter
        $product_data = $this->usermodel->get_product_by_id("product_table", $product_id);
        $data['product'] = !empty($product_data) ? $product_data[0] : null;

        $this->load->view('Admin/add_products.php', $data);
    }

    public function update_product_details_with_id($product_id)
    {

        $product_data = $this->usermodel->get_product_by_id("product_table", $product_id);
        $data['product'] = !empty($product_data) ? $product_data[0] : null;
        $this->load->view('Admin/add_products.php', $data);
    }

    public function update_product_action_from_admin()
    {
        $product_id = $this->input->post('product_id');
        $this->load->library('upload');

        // Collect form data
        $name = $this->input->post('pname');
        $discription = $this->input->post('discription');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $gst = $this->input->post('gst');

        // Upload config
        $upload_path = FCPATH . 'uploads';
        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'gif|jpg|png|jpeg|pdf|jfif',
            'max_size'      => 2048,
            'encrypt_name'  => TRUE
        ];

        // Get existing images from DB
        $product = $this->usermodel->get_by_id($product_id);
        $existing_images = json_decode($product->image ?? '[]', true);

        // Handle new image uploads
        $new_images = [];
        if (!empty($_FILES['product_images']['name'][0])) {
            $files = $_FILES['product_images'];
            $file_count = count($files['name']);

            for ($i = 0; $i < $file_count; $i++) {
                $_FILES['file']['name']     = $files['name'][$i];
                $_FILES['file']['type']     = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error']    = $files['error'][$i];
                $_FILES['file']['size']     = $files['size'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                    $new_images[] = 'uploads/' . $upload_data['file_name'];
                }
            }
        }

        // Merge old and new images
        $all_images = array_merge($existing_images, $new_images);

        // Prepare update data
        $data = [
            'product_name' => $name,
            'discription'  => $discription,
            'price'        => $price,
            'quantity'     => $quantity,
            'gst_price'    => $gst,
            'image'        => json_encode($all_images),
        ];

        // Update DB
        $res = $this->usermodel->update_product_now($data, "product_table", $product_id);

        if ($res) {
            $this->session->set_flashdata('message', 'Product updated successfully!');
            $this->update_product_details_with_id($product_id); // reload page
        } else {
            $this->session->set_flashdata('message', 'Product update failed.');
            $this->update_product_details_with_id($product_id);
        }
    }

    public function remove_product_image()
    {
        $product_id = $this->input->post('product_id');
        $index = $this->input->post('index');

        $product = $this->usermodel->get_by_id($product_id);
        $images = json_decode($product->image ?? '[]', true);

        if (isset($images[$index])) {
            unset($images[$index]);
            $images = array_values($images);
            $this->db->where('product_id', $product_id);
            $this->db->update('product_table', ['image' => json_encode($images)]);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_payment_status()
    {
        header('Content-Type: application/json');

        $paymentId = $this->input->post('id');
        $status = $this->input->post('status');

        if (!empty($paymentId) && !empty($status)) {
            $order_id = $this->admin_model->update_status($paymentId, $status);

            if ($order_id) {
                $update = $this->admin_model->update_order_status($order_id, $status);

                if ($status == 2) {
                    $this->assign_tracking($order_id);
                }

                if ($update) {
                    echo json_encode(["success" => true]);
                    return;
                } else {
                    echo json_encode(["success" => false, "message" => "Order status update failed"]);
                    return;
                }
            } else {
                echo json_encode(["success" => false, "message" => "Payment status update failed"]);
                return;
            }
        } else {
            echo json_encode(["success" => false, "message" => "Invalid parameters"]);
            return;
        }
    }
    private function assign_tracking($order_id)
    {
        $this->load->model('tracking_model');

        $order = $this->admin_model->get_order_by_id($order_id);

        if (!$order) {
            log_message('error', "Order not found for ID: $order_id");
            return;
        }

        log_message('debug', "Order details: " . print_r($order, true)); // Debugging

        if (empty($order->tracking_number)) {
            log_message('error', "Tracking number missing for order ID: $order_id");
            return;
        }

        $tracking_number = $order->tracking_number;
        $courier_code = isset($order->courier_code) ? $order->courier_code : null;

        $response = $this->tracking_model->create_tracking($tracking_number, $courier_code);

        if (!empty($response['data'])) {
            log_message('info', 'Tracking API Response: ' . json_encode($response));
        } else {
            log_message('error', 'Tracking API Failed: ' . json_encode($response));
        }
    }

    public function add_coupon_code_page()
    {
        $data['content'] = $this->load->view('Admin/add_coupon.php', null, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function add_coupon_code()
    {
        $code = $this->input->post('coupon-code');
        $expiry_date = $this->input->post('expiry-date');
        $discount = $this->input->post('discount');
        $status = $this->input->post('status');
        $data = array(
            'coupon_code' => $code,
            'expiry_date' => $expiry_date,
            'discount' => $discount,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        );
        $res = $this->admin_model->add_coupon_code('coupon_tbl', $data);
        if ($res) {
            $this->session->set_flashdata('success', 'Coupon Code added Successfully');
            redirect('add_coupon');
        } else {
            $this->session->set_flashdata('error', 'Coupon Code Not added');
            redirect('add_coupon');
        }
    }


    public function coupon_list()
    {
        $res['result'] = $this->admin_model->fetch_coupon_list('coupon_tbl');
        $data['content'] = $this->load->view('Admin/coupon_list.php', $res, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function edit_coupon()
    {
        $id = $this->input->get('id');
        $data['result'] = $this->admin_model->fetch_coupon_code_by_id('coupon_tbl', $id);
        $this->load->view('Admin/edit_coupon.php', $data);
    }

    public function delete_coupon()
    {
        $id = $this->input->get('id');

        if ($id) {
            $this->load->model('admin_model');

            $deleted = $this->admin_model->delete_coupon_by_id('coupon_tbl', $id);

            if ($deleted) {
                $this->session->set_flashdata('success', 'Coupon deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete coupon.');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid coupon ID.');
        }

        redirect('coupon_list'); // make sure this route matches your setup
    }

    public function change_password()
    {
        $data['content'] = $this->load->view('Admin/change_password.php', 'null', true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function change_password_action()
    {
        $newpassword = $this->input->post('newpassword');
        $confirmpassword = $this->input->post('confirmpassword');
        $email = $this->session->userdata('email');


        if (empty($newpassword) || empty($confirmpassword)) {
            $this->session->set_flashdata('error', 'Please fill all the  details');
            redirect('change_password');
        } else {
            if ($newpassword === $confirmpassword) {
                $this->admin_model->change_password($newpassword, $email);
                $this->session->set_flashdata('success', 'Password changed successfully.');
            } else {
                $this->session->set_flashdata('error', 'Password and confirm passwsord do not match.');
            }

            redirect('change_password');
        }
    }

    public function website_maintenance()
    {
        $status = $this->input->post('websiteStatus');
        $status = array(
            'website_manage' => $status
        );
        $res = $this->admin_model->change_website_status('admin_table', $status);
        if ($res) {
            $this->session->set_flashdata('seccess', 'Status Changes Successfully!');
            redirect('manage_website');
        } else {
            $this->session->set_flashdata('error', 'Something Went Wrong!');
            redirect('manage_website');
        }
    }

    public function manage_website()
    {
        $response['status'] = $this->usermodel->check_website_status();
        $data['content'] = $this->load->view('Admin/manage_website.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function view_user($user_id)
    {
        $this->load->library('pagination');
        $per_page = 10;
        $config['base_url'] = base_url("Address/$user_id");
        $config['total_rows'] = $this->Reports_model->get_user_address_count($user_id);
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];
        $this->pagination->initialize($config);
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $response['address'] = $this->Reports_model->get_user_address_by_id($user_id, $per_page, $offset);
        $response['pagination'] = $this->pagination->create_links();
        $response['offset'] = $offset;
        $data['content'] = $this->load->view('Admin/user_address.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function summary()
    {
        $this->load->view('Admin/graph');
    }

    public function get_sales_data()
    {
        $type = $this->input->post('type');

        switch ($type) {
            case 'daily':
                $result = $this->admin_model->get_daily_sales();
                break;
            case 'weekly':
                $result = $this->admin_model->get_weekly_sales();
                break;
            case 'yearly':
                $result = $this->admin_model->get_yearly_sales();
                break;
            case 'monthly':
            default:
                $result = $this->admin_model->get_monthly_sales();
                break;
        }

        echo json_encode($result);
    }
}
