<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subadmin_model');
        // $this->load->model('admin_model');
    }
    public function index()
    {
        $data['content'] = $this->load->view('Admin/add_subadmin', [], true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function welcome_subadmin()
    {
        $data['content'] = $this->load->view('Admin/welcome_subadmin.php', null, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function Add_Subadmin()
    {
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $data = array(
                'name' => $username,
                'email' => $email,
                'password' => $password,
                'role' => 'Subadmin',
            );
            $verify_data = $this->subadmin_model->verify_data('admin_table', $data);
            if (!$verify_data) {
                $result = $this->subadmin_model->insert_data('admin_table', $data);
                if ($result) {
                    $this->session->set_flashdata('success', 'Subadmin Added Successfully');
                    redirect('AddSubadmin');
                } else {
                    $this->session->set_flashdata('error', 'Failed to Add Subadmin');
                    redirect('AddSubadmin');
                }
            } else {
                $this->session->set_flashdata('error', 'Username or Email Already Exist');
                redirect('AddSubadmin');
            }
        } else {
            show_404();
        }
    }
    public function List_Subadmin()
    {
        $response['modules'] = $this->subadmin_model->get_modules('modules');
        $response['result'] = $this->subadmin_model->get_subadmin('admin_table');
        $data['content'] = $this->load->view('Admin/subadmin_list', $response, true);
        $this->load->view('Admin/admin_layout.php', $data);
    }
    public function check_username()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');

        $this->load->model('subadmin_model');

        $response = [
            'username_error' => '',
            'email_error' => ''
        ];

        if ($this->subadmin_model->check_username('admin_table', $username)) {
            $response['username_error'] = 'Username already taken';
        }

        if ($this->subadmin_model->check_email('admin_table', $email)) {
            $response['email_error'] = 'Email already taken';
        }

        echo json_encode($response);
    }
    public function DeleteSubamdin($id)
    {
        $result = $this->subadmin_model->delete_subadmin('admin_table', $id);
        if ($result) {
            $this->session->set_flashdata('success', 'Subadmin Deleted Successfully');
            redirect('subadmin-list');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect('subadmin-list');
        }
    }
    // public function get_permissions($subadmin_id)
    // {
    //     $this->db->select('module_id');
    //     $this->db->from('permissions');
    //     $this->db->where('subadmin_id', $subadmin_id);
    //     $query = $this->db->get();

    //     $module_ids = array_column($query->result_array(), 'module_id');

    //     echo json_encode($module_ids);
    // }
    public function save_permissions()
    {
        if ($this->input->method() === 'post') {
            $subadmin_id = (int) $this->input->post('subadmin_id');
            $module_ids = $this->input->post('module_ids') ?? [];

            // Clean old permissions
            $this->db->where('admin_id', $subadmin_id)->delete('permissions');

            // Prepare new permissions
            $insert_data = [];
            foreach ($module_ids as $mod_id) {
                $insert_data[] = [
                    'admin_id' => $subadmin_id,
                    'module_id' => (int) $mod_id
                ];
            }

            // Insert if not empty
            if (!empty($insert_data)) {
                $this->db->insert_batch('permissions', $insert_data);
            }

            $this->session->set_flashdata('success', 'Permissions updated successfully.');
            redirect('subadmin-list');
        } else {
            show_404();
        }
    }
}
