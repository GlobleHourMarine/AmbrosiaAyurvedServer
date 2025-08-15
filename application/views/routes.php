<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'klizard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route[''] = FALSE;

/**
 * View pages
 */
$route['contact_us']='klizard/contact_us';
$route['order']='klizard/order';
$route['about_us']='klizard/about_us';
$route['benefits']='klizard/benefits';
$route['our_products']='klizard/our_products';
$route['cart_data']='klizard/cart_data';
$route['payment']='klizard/payment';
$route['order_popup']='klizard/order_popup';
$route['registerpage']='klizard/registerpage';
$route['loginpage']='klizard/loginpage';
$route['forgotPasswordPage']='klizard/forgotPassword';
$route['forgot_password']='klizard/forgot_password';
// $route['payment']='klizard/payment';
$route['order_popup']='klizard/order_popup';
$route['forgotPasswordPage']='klizard/forgotPassword';
$route['VerifyOtpPage/(:any)']='klizard/VerifyOtpPage/$1';
$route['SetPasswordPage/(:any)']='klizard/SetPassword/$1';
$route['all_products']='klizard/all_products';
$route['user_profile']='klizard/user_profile';
$route['reviews']='user/user_reviews';


// $route['']

/**
 * View end
 */


/**
 * Admin
 * 
 */
$route['add_product']='admin/add_product';

 /**
  * Admin End
  */


  /**
 * User
 */
$route['register']='user/userregister';
$route['login']='user/userlogin';
$route['logout']='user/userlogout';
$route['cart']='user/cart';
$route['forgotPassword']='user/forgotPassword';
$route['verifyotp']='user/verifyotp';
$route['setnewpassword']='user/setnewpassword';
$route['update_address']='user/update_address';
$route['delete_product_from_cart']='user/delete_product_from_cart';
$route['add_data_into_cart']='user/add_data_into_cart';
$route['payment_process']='user/payment_process';
$route['payment_done']='user/payment_done';
$route['cancel_order']='user/cancel_order';



/**
 * User End
 */
$route['admin_dashboard']='admin/admin_dashboard';
$route['admin_login']='admin/admin_login';
$route['remove_product']='admin/remove_product';
$route['remove_product_action']='admin/remove_product_action';
$route['edit_product_page']='admin/edit_product_page';
$route['update_product']='admin/update_product';



$route['update_product_action']='admin/update_product_action_from_admin';
$route['update_product_details']='admin/update_product_details';
$route['payment_details']='admin/payment_details';
$route['update_payment_status']='admin/update_payment_status';
$route['admin_login_action']='admin/admin_login_action';
$route['admin_logout']='admin/admin_logout';
$route['change_password']='admin/change_password';
$route['change_password_action']='admin/change_password_action';



