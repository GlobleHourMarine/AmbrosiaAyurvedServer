<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ambrosia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->model('admin_model');
        $this->load->database();    

    }
    public function registerpage()
    {
        // $this->load->view('../views/header.php');
        $this->load->view('../views/register.php');
        // $this->load->view('../views/footer.php');
    }
    public function loginpage()
    {
        // $this->load->view('../views/header.php');
        $this->load->view('../views/login.php');
        // $this->load->view('../views/footer.php');
    }
    public function index()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/home.php');
        $this->load->view('../views/footer.php');
    }
    public function header2()
    {
        $this->load->view('../views/header2.php');
        // $this->load->view('../views/home.php');
        // $this->load->view('../views/footer.php');
    }
    
    public function about_us()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/about_us.php');
        $this->load->view('../views/footer.php');
       
    }
    public function benefits()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/benefits.php');
        $this->load->view('../views/footer.php');
       
    }
    public function footer()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/benefits.php');
        $this->load->view('../views/footer.php');
    }
    public function products()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/our_services.php');
        $this->load->view('../views/footer.php');
       
    }
    public function all_products()
    {

        $data['products']=$this->admin_model->fetch_add_product_data();
        // print_r($data);
        // die();
        $this->load->view('../views/header.php');
        $this->load->view('../views/all_products.php',$data);
        $this->load->view('../views/footer.php');
    }
    public function cart_data()
    {  
        //  $date=date("Y-m-d H:i:s: A");
        // echo $date;
        // die();

        $id=$this->session->userdata('user_id');
        // print_r($id);
        // die();
        $data['cart_data']=$this->usermodel->fetch_all_cart_data('cart_table',$id);
        // print_r($data);
        // die();
        $this->load->view('../views/header.php');
        $this->load->view('../views/my_cart.php',$data);
        // $this->load->view('../views/footer.php');
    }
    public function contact_us()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/contact_us.php');
        $this->load->view('../views/footer.php');
    //    
    }
    // public function my_cartt()
    // {
    
    //     $this->load->usermodel->
    //     $this->load->view('../views/header.php');
    //     $this->load->view('../views/my_cart.php');
    //     $this->load->view('../views/footer.php');
     
    // }
    public function payment()
    {
        // if($result)
        // {
        //     echo("insertedd succsfully");
        // }
        // die();
        $this->load->view('../views/header.php');
        $this->load->view('../views/payment_page.php');
        // $this->load->view('../views/contact_us.php');
        $this->load->view('../views/footer.php');
    
    }


   
    
    public function order()
    {
        $this->load->view('../views/header.php');
        $this->load->view('../views/order_history.php');
        $this->load->view('../views/footer.php');
        
    }
    public function order_popup()
    {
        // $this->load->view('../views/header.php');
        $this->load->view('../views/order_history.php');
        // $this->load->view('../views/footer.php');
    }

    public function VerifyOtpPage($user_id)
    {
        $data=array(
            'user_id'=>$user_id
        );
        
        // $this->load->view('../views/header.php');
        $this->load->view('../views/verify_otp.php',$data);
        // $this->load->view('../views/footer.php');
        
    }
    public function SetPassword($id)
    {
        $data=array(
            'id'=>$id
        );
        $this->load->view('../views/setpassword.php',$data);
    }
    public function forgotPassword(){
        $this->load->view('../views/forgotpassword.php');
    }
    
    
    // public function send_email()
    // {
        
    // }
    // public function forgotPassword(){
    //     $action=$this->input->post('action');
    //     if($action=='send_otp')
    //     {
    //         $email=$this->input->post('email');
    //         // $res=$this->usermodel->check_email('user_table',$email);
    //         // print_r($res);
    //         // if($res==1)
    //         // {
    //             $otp = random_int(100000, 999999);
    //             $res=$this->usermodel->save_otp($email,$otp);
    //             $this->load->library('email');
    //             $this->email->from('sarvjeetkaur9729@gmail.com');
    //             $this->email->to($email);
    //             $this->email->subject('Your OTP Code');
    //             $this->email->message('Your OTP for password recovery is: ' . $otp);
    //             if($this->email->send())
    //             {
    //                 echo $this->email->print_debugger();
    //                 $this->session->set_flashdata('success', 'OTP sent to your email');
    //                 redirect('forgot_password');
    //             }
    //             else{
    //                 $this->session->set_flashdata('success', 'Something went wrong');
    //                 redirect('forgot_password');
    //             }
                
    //         // }
    //         // else{
    //         //     $this->session->set_flashdata('success', 'Email not exist');
    //         //     redirect('forgotPasswordPage');
    //         // }
    //     }
    // }
    public function send_email(){
        $this->load->library('email');  
        $this->load->library('form_validation');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('sub');
        $message = $this->input->post('message');
        // echo($name);
        // echo($email);
        // echo($subject);
        // echo($message);
        // die();
        $this->email->from($email);
        $this->email->to('sarvjeetkaur9729@gmail.com'); 
        $this->email->subject('New Query from Klizard Cosemetics');
        $this->email->set_mailtype("html");
        
        $email_message="
            <h2>Query Details</h2>....
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Sub:</strong> $subject</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";
        $this->email->message($email_message);
        if(empty($name)||empty($email)||empty($subject)||empty($message))
        {
            $this->session->set_flashdata('message','Please fill all the details!');
            $this->session->set_flashdata('message_type','error');   
            redirect('contact_us');
  
        }
        else{

            if ($this->email->send()) {
                // echo "Email sent successfully!";
                $this->session->set_flashdata('message','Email sent succesfully...!');
                $this->session->set_flashdata('message_type','success');
                redirect('contact_us');
            } else {
                echo $this->email->print_debugger(); // Display the error message
                exit;
                $this->session->set_flashdata('message','Failed to sent email.');
                $this->session->set_flashdata('message_type','error');
            }
        }

      
    }
    public function user_profile()
    {
        // echo "inside function";
        //    $data= $this->usermodel->fetch_user_data();
        //    print_r($data);
        $this->load->view('header.php');
        $this->load->view('user_profile.php');
        
    }     
    public function description(){
        echo "helo";
        die();
        $this->load->view('header.php');
        $this->load->view('description.php');
        $this->load->view('footer.php');
    }
}
?>