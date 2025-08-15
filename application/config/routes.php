<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'Ambrosia_main';
$route['contact_us'] = 'Ambrosia_main/contact_us';
$route['about_us'] = 'Ambrosia_main/about_us';
$route['our_products'] = 'Ambrosia_main/our_products';
$route['cart_data'] = 'Ambrosia_main/cart_data';
$route['order_popup'] = 'Ambrosia_main/order_popup';
$route['registerpage'] = 'Ambrosia_main/registerpage';
$route['order_without_register'] = 'Ambrosia_main/order_without_register';
$route['loginpage'] = 'Ambrosia_main/loginpage';
$route['success'] = 'Ambrosia_main/thanku';
$route['failure'] = 'Ambrosia_main/failure';
$route['forgotPasswordPage'] = 'Ambrosia_main/forgotPassword';
$route['forgot_password'] = 'Ambrosia_main/forgot_password';
$route['forgotPasswordPage'] = 'Ambrosia_main/forgotPassword';
$route['order_popup'] = 'Ambrosia_main/order_popup';
$route['VerifyOtpPage/(:any)'] = 'Ambrosia_main/VerifyOtpPage/$1';
$route['SetPasswordPage/(:any)'] = 'Ambrosia_main/SetPassword/$1';
$route['all_products'] = 'Ambrosia_main/all_products';
$route['user_profile'] = 'Ambrosia_main/user_profile';
$route['edit_user_information'] = 'Ambrosia_main/edit_user_information';
$route['data_from_description_page'] = 'Ambrosia_main/data_from_description_page';
$route['check_path'] = 'Ambrosia_main/check_path';
$route['save_checkout_information'] = 'user/save_checkout_information';
$route['a5_the_diabetes_killer'] = 'Ambrosia_main/a5_the_diabetes_killer';
$route['terms_conditions'] = 'Ambrosia_main/terms_conditions';
$route['privacy_policy'] = 'Ambrosia_main/privacy_policy';
$route['shipping_policy'] = 'Ambrosia_main/shipping_policy';
$route['cancellation_policy'] = 'Ambrosia_main/cancellation_policy';
$route['place_order'] = 'Ambrosia_main/place_order';
$route['new_cart'] = 'Ambrosia_main/new_cart';
$route['add_your_review'] = 'Ambrosia_main/add_your_review';
$route['apply_coupon'] = 'Ambrosia_main/apply_coupon';

//user controler....
$route['user_reviews'] = 'user/user_reviews';
$route['bill'] = 'user/billing';
$route['get-cart-count'] = 'user/get_cart_count';
$route['support/delete-account'] = 'user/DeleteAccount';
$route['DeleteUserAccount'] = 'user/DeleteUserAccount';
$route['register'] = 'user/userregister';
$route['add_new_address'] = 'user/add_new_address';
$route['login'] = 'user/userlogin';
$route['logout'] = 'user/userlogout';
$route['cart'] = 'user/cart';
$route['forgotPassword'] = 'user/forgotPassword';
$route['support/delete-account'] = 'user/DeleteAccount';
$route['verifyotp'] = 'user/verifyotp';
$route['register_mobile'] = 'user/register_mobile';
$route['register_password'] = 'user/register_password';
$route['setnewpassword'] = 'user/setnewpassword';
$route['update_address'] = 'user/update_address';
$route['delete_product_from_cart'] = 'user/delete_product_from_cart';
$route['add_data_into_cart'] = 'user/add_data_into_cart';
$route['payment_processing'] = 'user/payment_processing';
$route['payment_process'] = 'user/payment_process';
$route['payment_done'] = 'user/payment_done';
$route['submit_review'] = 'user/submit_review';
$route['cancel_order'] = 'user/cancel_order';
$route['register_first'] = 'user/register_first';
$route['register_before_order'] = 'user/register_before_order';
$route['add_tracking/(:num)'] = 'user/add_tracking/$1';

//payment...
$route['payment'] = 'PaymentController/initiate_payment';
$route['payment-callback'] = 'WebhookController/callback';
$route['phonepe_gateway/callback'] = 'phonepe_gateway/callback';
$route['tracking'] = 'tracking/show_page';


//alternate_payment_controller
$route['alternative_payment_function'] = 'AlternatePayment/initilize_payment';

//Product Manage
$route['remove_product'] = 'Product_manage/remove_product';
$route['remove_product_action'] = 'Product_manage/remove_product_action';
$route['add_product'] = 'Product_manage/add_product';
$route['AddProduct'] = 'Product_manage/AddProduct';
$route['add_package'] = 'Product_manage/add_package';
$route['AddPackage/(:num)'] = 'Product_manage/AddPackage/$1';
$route['view_package/(:num)'] = 'Product_manage/edit_package_page/$1';
$route['add_benefits/(:num)'] = 'Product_manage/edit_benefits/$1';
$route['insert_package'] = 'Product_manage/insert_package';
$route['insert_benefit'] = 'Product_manage/insert_benefit';
$route['update_package'] = 'Product_manage/update_package';
$route['delete_package'] = 'Product_manage/delete_package';
$route['delete_benefits'] = 'Product_manage/delete_benefits';
$route['update_benefits'] = 'Product_manage/update_benefits';
$route['edit_product_page'] = 'Product_manage/edit_product_page';
$route['manage_products'] = 'Product_manage/manage_products';

$route['how_to_use/(:num)'] = 'Product_manage/how_to_use/$1';   
$route['insert_step'] = 'Product_manage/insert_step';
$route['update_step'] = 'Product_manage/update_step';
$route['delete_step'] = 'Product_manage/delete_step';

$route['faq/(:num)'] = 'Product_manage/faq/$1';
$route['insert_faq'] = 'Product_manage/insert_faq';
$route['update_faq'] = 'Product_manage/update_faq';
$route['delete_faq'] = 'Product_manage/delete_faq';



// Admin reports manage
$route['admin_order_details'] = 'Admin_reports/admin_order_details';
$route['payment_details'] = 'Admin_reports/payment_details';
$route['sales_details'] = 'Admin_reports/sales_details';
$route['all_users_details'] = 'Admin_reports/all_users_details';


$route['tracking/track_status/(:any)'] = 'tracking/track_status/$1';

//admin dashbord controler
$route['dashboard'] = 'admin_dashboard/dashboard';
$route['Address/(:num)'] = 'admin_dashboard/view_user/$1';
$route['Address/(:num)/(:num)'] = 'admin_dashboard/view_user/$1/$2';
$route['update_product'] = 'admin_dashboard/update_product';
$route['add_banners'] = 'admin_dashboard/add_banners';
$route['banner'] = 'admin_dashboard/banner';
$route['manage_website'] = 'admin_dashboard/manage_website';
$route['website_maintenance'] = 'admin_dashboard/website_maintenance';
$route['delete_banner/(:any)'] = 'admin_dashboard/delete_banner/$1';
$route['edited_product'] = 'admin_dashboard/edited_product';
$route['add_coupon'] = 'admin_dashboard/add_coupon_code_page';
$route['add_coupon_code'] = 'admin_dashboard/add_coupon_code';
$route['coupon_list'] = 'admin_dashboard/coupon_list';
$route['edit_coupon'] = 'admin_dashboard/edit_coupon';
$route['delete_coupon'] = 'admin_dashboard/delete_coupon';
$route['insert_product_now'] = 'admin_dashboard/insert_product_now';
$route['update_product_action'] = 'admin_dashboard/update_product_action_from_admin';
$route['update_product_details'] = 'admin_dashboard/update_product_details';
$route['remove_product_image'] = 'admin_dashboard/remove_product_image';
$route['update_payment_status'] = 'admin_dashboard/update_payment_status';
$route['change_password_action'] = 'admin_dashboard/change_password_action';
$route['change_password'] = 'admin_dashboard/change_password';

//admin controler.......
$route['admin'] = 'admin/admin_login';
$route['admin_login_action'] = 'admin/admin_login_action';
$route['admin_logout'] = 'admin/admin_logout';
$route['track/(:any)/(:any)'] = 'admin/track_order/$1/$2';

/**
 * Subamdin
 */
$route['subadmin'] = 'subadmin/welcome_subadmin';
$route['AddSubadmin'] = 'subadmin';
$route['add-subadmin'] = 'subadmin/Add_Subadmin';
$route['subadmin-list'] = 'subadmin/List_Subadmin';
$route['save-permissions'] = 'subadmin/Save_Permissions';




$route['sitemap\.xml'] = 'sitemap';
//orders controlerr....
$route['order'] = 'Orders/order';
$route['order/(:num)'] = 'Orders/order/$1';
$route['new_cart_page'] = 'Orders/new_cart_page';
$route['order-summery'] = 'Orders/user_information';

//Tracking controller...
$route['shiprocket'] = 'tracking/create_order';
$route['track-order'] = 'tracking/track_order/$1';
$route['tracking/update_tracking_status'] = 'tracking/update_tracking_status';

$route['redirect/(:any)'] = 'redirector/index/$1';
$route['(:any)'] = 'Ambrosia_main/view/$1';

