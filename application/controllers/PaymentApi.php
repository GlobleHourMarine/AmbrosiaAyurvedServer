
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
 * @property CI_Security $security
 * @property CI_DB $db
 * @property CI_Email $email
 * @property Your_model_name $api_model
 * @property Your_model_name $Usermodel
 * @property Your_model_name $Investment_model
 * @property Your_model_name $package_model
 */

class PaymentApi extends CI_Controller
{
    private $token;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('api_model');
        $this->load->model('tracking_model');
        $this->load->model('admin_model');
        $this->load->model('Product_model');
        $this->load->model('Usermodel');
        $this->token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJpZGVudGl0eU1hbmFnZXIiLCJ2ZXJzaW9uIjoiNC4wIiwidGlkIjoiMDgxMjZhNjEtODUwZC00NjczLWJhZDMtZTRhMjhiMDIwZDVlIiwic2lkIjoiY2JkNzkwZmMtNDk2YS00MjBmLWE5NGMtMzk1YTA2YzVhMWQxIiwiaWF0IjoxNzU0MjkwOTAxLCJleHAiOjE3NTQyOTQ1MDF9._fQrR5Gy1KyMd6XvelbalzM24Cil7zib04ssWs9yKA8SdeG6fdqDpm8pfpb5Tu61-ygilLcQvv-rXFRodXPXuw";
    }
        public function create_order() {
        $this->load->helper('url');
        $this->load->helper('security'); 

        $amount = $this->input->post('amount');
        print_r($amount);
        die();
        
        // $amount = 100;


        // if (!$amount) {
        //     echo json_encode(['success' => false, 'message' => 'Missing required fields']);
        //     return;
        // }
        $payload = [
            "merchantOrderId" => 'ORDER'.time(),
            "amount" => (int)$amount,
            "paymentFlow" => [
                "type" => "PG_CHECKOUT"
            ]
        ];

        $jsonData = json_encode($payload);
        // print_r($jsonData);
        // die();

        $accessToken = $this->token;

        $ch = curl_init("https://api.phonepe.com/apis/pg/checkout/v2/sdk/order");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: O-Bearer $accessToken"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            echo json_encode(['success' => false, 'message' => 'Curl Error: ' . curl_error($ch)]);
        } else {
            echo $response;
        }
        curl_close($ch);
    }
}