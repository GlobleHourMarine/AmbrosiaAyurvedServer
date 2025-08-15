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
class Product_manage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('pagination'); // <--- THIS IS CRUCIAL
        $this->load->helper('download'); // Load the download helper here
        // $this->load->library('pdf');
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

    public function AddProduct()
    {
        $data['content'] = $this->load->view('Admin/insert_product.php', null, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function add_product()
    {
        $this->load->library('upload');

        $name        = $this->input->post('pname');
        $tittle        = $this->input->post('tittle');
        $slug        = $this->generate_slug($name);
        $description = $this->input->post('discription');
        $price       = $this->input->post('price');
        $quantity    = $this->input->post('quantity');
        $gst         = $this->input->post('gst');

        $upload_path = FCPATH . 'uploads/';
        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|jfif';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        $image_paths = [];

        if (!empty($_FILES['productimage']['name'][0])) {
            $count = count($_FILES['productimage']['name']);

            for ($i = 0; $i < $count; $i++) {
                $_FILES['file']['name']     = $_FILES['productimage']['name'][$i];
                $_FILES['file']['type']     = $_FILES['productimage']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['productimage']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['productimage']['error'][$i];
                $_FILES['file']['size']     = $_FILES['productimage']['size'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                    $image_paths[] = 'uploads/' . $upload_data['file_name'];
                }
            }
        }

        $data = array(
            'product_name'   => $name,
            'discription'    => $description,
            'price'          => $price,
            'slug'           => $slug,
            'quantity'       => $quantity,
            'tittle'         => $tittle,
            'gst_price'      => $gst,
            'product_status' => 1,
            'image'          => json_encode($image_paths)
        );

        $product_id = $this->Product_model->product_add('product_table', $data); // now getting insert_id()

        if ($product_id) {
            $this->session->set_flashdata('message', 'Product Added Successfully');
            redirect('edit_product_page'); // ✅ pass product_id to AddPackage()
        } else {
            $this->session->set_flashdata('message', 'Product Not Added');
            redirect('edit_product_page');
        }
    }
    // public function AddPackage($product_id = null)
    // {
    //     $data['product_id'] = $product_id; // if you want to use it in the view
    //     $data['content'] = $this->load->view('Admin/insert_package.php', $data, true);
    //     $this->load->view('Admin/admin_layout.php', $data);
    // }
    // public function add_package()
    // {
    //     $product_id        = $this->input->post('product_id');
    //     $pname        = $this->input->post('pname');
    //     $description = $this->input->post('discription');
    //     $baseprice    = $this->input->post('baseprice');
    //     $price       = $this->input->post('price');
    //     $disscount         = $this->input->post('disscount');
    //     $data = array(
    //         'product_id'   => $product_id,
    //         'pack_name'           => $pname,
    //         'description'    => $description,
    //         'base_price'       => $baseprice,
    //         'price'          => $price,
    //         'disscount'      => $disscount,
    //     );

    //     $res = $this->Product_model->product_add('tbl_pack', $data);
    //     if ($res) {
    //         $this->session->set_flashdata('message', 'Product Added Successfully');
    //         redirect('edit_product_page');
    //     } else {
    //         $this->session->set_flashdata('message', 'Product Not Added');
    //         redirect('admin');
    //     }
    // }
    public function insert_package()
    {
        $data = array(
            'product_id' => $this->input->post('product_id'),
            'pack_name' => $this->input->post('pack_name'),
            'base_price' => $this->input->post('base_price'),
            'price' => $this->input->post('price'),
            'disscount' => $this->input->post('disscount'),
            'description' => $this->input->post('description'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $res = $this->Product_model->product_add('tbl_pack', $data);
        if ($res) {
            $this->session->set_flashdata('message', 'Package added successfully');
            redirect('view_package/' . $data['product_id']);
        }
    }

    public function insert_benefit()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        $product_id = $this->input->post('product_id');
        $config['upload_path'] = './uploads/benefits/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
            return;
        } else {
            $imageData = $this->upload->data();
            $imagePath = 'uploads/benefits/' . $imageData['file_name'];

            $data = [
                'product_id' => $product_id,
                'title' => $title,
                'description' => $desc,
                'image' => $imagePath,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $res = $this->Product_model->data_add('product_benefits', $data);
            if ($res) {
                $this->session->set_flashdata('message', 'Benefits added successfully');
                redirect('add_benefits/' . $data['product_id']);
            }
        }
    }

    public function insert_step()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        $step_number = $this->input->post('step_number');
        $product_id = $this->input->post('product_id');
        $config['upload_path'] = './uploads/HowToUse/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
            return;
        } else {
            $imageData = $this->upload->data();
            $imagePath = 'uploads/HowToUse/' . $imageData['file_name'];

            $data = [
                'product_id' => $product_id,
                'title' => $title,
                'description' => $desc,
                'step_number' => $step_number,
                'image' => $imagePath,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $res = $this->Product_model->data_add('product_usage', $data);
            if ($res) {
                $this->session->set_flashdata('message', 'Data added successfully');
                redirect('how_to_use/' . $data['product_id']);
            }
        }
    }
    public function update_step()
    {
        // print_r("Hello");
        // die();
        $this->load->model('Product_model');
        $id = $this->input->post('id');
        $title = $this->input->post('title'); // fixed: form field name is "pack_name"
        $desc = $this->input->post('description');
        $step_number = $this->input->post('step_number');
        $product_id = $this->input->post('product_id');

        $data = [
            'product_id' => $product_id,
            'title' => $title,
            'description' => $desc,
            'step_number' => $step_number,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Check if a file was uploaded
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/HowToUse/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $imageData = $this->upload->data();
                $imagePath = 'uploads/HowToUse/' . $imageData['file_name'];
                $data['image'] = $imagePath;
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('how_to_use/' . $product_id);
                return;
            }
        }
        $this->Product_model->update_data('product_usage', $data, ['id' => $id]);

        $this->session->set_flashdata('message', 'Data updated successfully!');
        redirect('how_to_use/' . $product_id);
    }

    public function delete_step()
    {
        $this->load->model('Product_model');

        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        if (!$id || !$product_id) {
            $this->session->set_flashdata('message', 'Invalid request.');
            redirect($this->agent->referrer());
        }

        // Delete the package
        $this->Product_model->delete_data('product_usage', ['id' => $id]);

        $this->session->set_flashdata('message', 'Data deleted successfully!');
        redirect('how_to_use/' . $product_id);
    }

    function generate_slug($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
    }
    public function remove_product()
    {
        $response['product_data'] = $this->Product_model->fetch_add_product_data();
        $data['content'] = $this->load->view('Admin/remove_product.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function remove_product_action()
    {
        $product_id = $this->input->post('product_id');

        $res = $this->Product_model->remove_product_now('product_table', $product_id);
        if ($res) {
            $this->session->set_flashdata('message', 'Product Removed Successfully');
            redirect('edit_product_page');
        } else {
            $this->session->set_flashdata('message', 'Product Not Removed');
            redirect('edit_product_page');
        }
    }

    public function edit_product_page()
    {

        $response['product_data'] = $this->Product_model->fetch_add_product_data();

        $data['content'] = $this->load->view('Admin/edit_products.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function manage_products()
    {

        $response['product_data'] = $this->Product_model->fetch_add_product_data();

        $data['content'] = $this->load->view('Admin/add_benefits.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }

    public function edit_package_page($id)
    {

        $response['product_data'] = $this->Product_model->fetch_package($id);
        $response['product_id'] = $id;
        $data['content'] = $this->load->view('Admin/edit_package.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function edit_benefits($id)
    {
        $response['product_data'] = $this->Product_model->fetch_benefits($id);
        $response['product_id'] = $id;
        $data['content'] = $this->load->view('Admin/edit_benefits.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function how_to_use($id)
    {
        $response['product_data'] = $this->Product_model->fetch_how_to_use_data($id);
        $response['product_id'] = $id;
        // print_r($response);
        // die();
        $data['content'] = $this->load->view('Admin/how_to_use.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function update_package()
    {
        $this->load->model('Product_model');

        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id'); // ✅ required for redirect

        // Form validation
        $this->form_validation->set_rules('pack_name', 'Package Name', 'required|trim');
        $this->form_validation->set_rules('base_price', 'Base Price', 'required|numeric');
        $this->form_validation->set_rules('price', 'Selling Price', 'required|numeric');
        $this->form_validation->set_rules('disscount', 'Discount', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('message', 'Please fill all required fields correctly.');
            redirect($this->agent->referrer());
        }

        // Prepare data for update
        $data = [
            'pack_name'   => $this->input->post('pack_name'),
            'base_price'  => $this->input->post('base_price'),
            'price'       => $this->input->post('price'),
            'disscount'   => $this->input->post('disscount'),
            'description' => $this->input->post('description'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        // Update database
        $this->Product_model->update_data('tbl_pack', $data, ['id' => $id]);

        // Success message and redirect
        $this->session->set_flashdata('message', 'Package updated successfully!');
        redirect('view_package/' . $product_id);
    }
    public function update_benefits()
    {
        // print_r("Hello");
        // die();
        $this->load->model('Product_model');
        $id = $this->input->post('id');
        $title = $this->input->post('title'); // fixed: form field name is "pack_name"
        $desc = $this->input->post('description');
        $product_id = $this->input->post('product_id');

        $data = [
            'product_id' => $product_id,
            'title' => $title,
            'description' => $desc,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Check if a file was uploaded
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/benefits/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $imageData = $this->upload->data();
                $imagePath = 'uploads/benefits/' . $imageData['file_name'];
                $data['image'] = $imagePath;
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('add_benefits/' . $product_id);
                return;
            }
        }

        $this->Product_model->update_data('product_benefits', $data, ['id' => $id]);

        $this->session->set_flashdata('message', 'Benefit updated successfully!');
        redirect('add_benefits/' . $product_id);
    }

    public function delete_package()
    {
        $this->load->model('Product_model');

        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        if (!$id || !$product_id) {
            $this->session->set_flashdata('message', 'Invalid request.');
            redirect($this->agent->referrer());
        }

        // Delete the package
        $this->Product_model->delete_data('tbl_pack', ['id' => $id]);

        $this->session->set_flashdata('message', 'Package deleted successfully!');
        redirect('view_package/' . $product_id);
    }
    public function delete_benefits()
    {
        $this->load->model('Product_model');

        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        if (!$id || !$product_id) {
            $this->session->set_flashdata('message', 'Invalid request.');
            redirect($this->agent->referrer());
        }

        // Delete the package
        $this->Product_model->delete_data('product_benefits', ['id' => $id]);

        $this->session->set_flashdata('message', 'Benefit deleted successfully!');
        redirect('add_benefits/' . $product_id);
    }

    public function faq($id)
    {
        $response['product_data'] = $this->Product_model->fetch_faq_data($id);
        $response['product_id'] = $id;
        // print_r($response);
        // die();
        $data['content'] = $this->load->view('Admin/faq.php', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function insert_faq()
    {
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
        $product_id = $this->input->post('product_id');

        $data = [
            'product_id' => $product_id,
            'question' => $question,
            'answer' => $answer,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $res = $this->Product_model->data_add('product_faq', $data);
        if ($res) {
            $this->session->set_flashdata('message', 'Data added successfully');
            redirect('faq/' . $data['product_id']);
        }
    }
    public function update_faq()
    {
        // print_r("Hello");
        // die();
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        $data = [
            'product_id' => $product_id,
            'question' => $question,
            'answer' => $answer,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Product_model->update_data('product_faq', $data, ['id' => $id]);

        $this->session->set_flashdata('message', 'Data updated successfully!');
        redirect('faq/' . $product_id);
    }

    public function delete_faq()
    {
        $this->load->model('Product_model');

        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        if (!$id || !$product_id) {
            $this->session->set_flashdata('message', 'Invalid request.');
            redirect($this->agent->referrer());
        }

        // Delete the package
        $this->Product_model->delete_data('product_faq', ['id' => $id]);

        $this->session->set_flashdata('message', 'Data deleted successfully!');
        redirect('faq/' . $product_id);
    }
}
