<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('usermodel');
        // $this->load->library('tracktry'); 

    }
    public function index()
    {
        $this->load->view('../views/Admin/admin_login.php');
    }
    public function admin_login()
    {
        $this->load->view('../views/Admin/admin_login.php');
    }



    // -----------------------------------------------------------------------------------------------
    public function admin_login_action()
    {
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
        $this->load->model('subadmin_model');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin');
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $res = $this->admin_model->check_data('admin_table', $email);

        if (!empty($res) && $res->password === $password) {
            if ($res->role === 'Admin' || $res->role === 'Subadmin') {
                $permissions['permission']=$this->subadmin_model->get_permission_by_user_id($res->id);
                $admin_data = [
                    'id' => $res->id,
                    'name' => $res->name,
                    'admin_email' => $res->email,
                    'role' => $res->role,
                    'permissions' => $permissions['permission'],
                    'logged_in' => TRUE,
                ];

                $this->session->set_userdata('admin', $admin_data);
                if ($res->role === 'Admin') {
                    return redirect('dashboard');
                }
                elseif ($res->role === 'Subadmin') {
                    return redirect('subadmin');
                }
            } else {
                $this->session->set_flashdata('error', 'Access denied.');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid credentials.');
            redirect('admin');
        }
    }



    public function admin_logout()
    {

        $this->session->sess_destroy(); // Destroy admin session
        redirect('admin'); // Redirect to admin login page

    }
}
