<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SubMainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('google/login', [AuthController::class,'provider'])->name('google.login');
Route::get('google/callback', [AuthController::class,'callbackHandel'])->name('google.login.callback');
Route::get('/', function () {
    return view('login');
})->middleware('AfterLogin');

Route::get('/header', [FrontEndController::class, 'header'])->name('header');
Route::get('/adminheader', [FrontEndController::class, 'adminheader'])->name('adminheader');
Route::get('/footer', [FrontEndController::class, 'footer'])->name('footer');
// Route::get('/doctor_profile_setting', [FrontEndController::class, 'doctor_profile_setting'])->name('doctor_profile_setting');

Route::get('/appointment_list/{d_id}', [FrontEndController::class, 'appointment'])->name('appointment_list');
Route::get('/index', [FrontEndController::class, 'index'])->name('index');
Route::get('/loginForm', [FrontEndController::class, 'loginForm'])->name('loginForm');
Route::get('/patient', [FrontEndController::class, 'patient'])->name('patient');
Route::get('/prescription_list', [FrontEndController::class, 'prescription_list'])->name('prescription_list');
// Route::get('/treatment_plan', [FrontEndController::class, 'treatment_plan'])->name('treatment_plan');
Route::get('/treatmentPlans', [FrontEndController::class, 'treatmentPlans'])->name('treatmentPlans');


// Route::get('/prescription', [FrontEndController::class, 'prescription'])->name('prescription');
// Route::get('/invoice', [FrontEndController::class, 'invoice'])->name('invoice');
// Route::get('/subscription', [FrontEndController::class, 'subscription'])->name('subscription');
// Route::get('/admin_page', [FrontEndController::class, 'admin_page'])->name('admin_page');
// Route::get('/profile_edit', [FrontEndController::class, 'profile_edit'])->name('profile_edit');
// Route::get('/registration', [FrontEndController::class, 'registration'])->name('registration');
// Route::get('/login', [FrontEndController::class, 'login'])->name('login');


// AuthController

Route::get('/registration', [AuthController::class, 'registration'])->name('registration')->middleware('AfterLogin');
Route::post('/register_user', [AuthController::class, 'register_user'])->name('register_user');
Route::get('/login_profile_edit/{id}', [AuthController::class, 'login_profile_edit'])->name('login_profile_edit');
Route::put('/login_update/doctor/{id}', [AuthController::class, 'login_update_doctor'])->name('login_update_doctor');

//Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('AfterLogin');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_user', [AuthController::class, 'login_user'])->name('login_user')->middleware('SubCheck');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //Route::get('/doctor', [AuthController::class, 'doctor'])->name('doctor')->middleware('NotLogin');
    Route::get('/doctor', [AuthController::class, 'doctor'])->name('doctor');
    Route::get('/doctor/profile_edit/{d_id}', [AuthController::class, 'profile_edit'])->name('profile_edit');
    Route::put('/update/doctor/{id}', [AuthController::class, 'update_doctor'])->name('update.doctor');
    // Route::post('/search',[AuthController::class,'search'])->name('search');

    Route::get('/subscription/{d_id}', [AuthController::class, 'subscription'])->name('subscription');
    Route::get('/subscription_info/{id}', [AuthController::class, 'subscription_info'])->name('subscription_info');
    Route::put('/subscription_add', [AuthController::class, 'subscription_add'])->name('subscription_add');
    Route::put('/subscription_add_redeem', [AuthController::class, 'subscription_add_redeem'])->name('subscription_add_redeem');


    //patient MainController
    Route::get('/patient_age/{dob}', [MainController::class, 'patient_age'])->name('patient_age');

    Route::post('/new/patient/{id}', [MainController::class, 'patient_info'])->name('patient_info');
    Route::put('edit/patient/{d_id}/{p_id}', [MainController::class, 'edit_patient'])->name('edit.patient');
    Route::delete('delete/patient/{d_id}/{p_id}', [MainController::class, 'delete_patient'])->name('delete.patient');

    // patient info from patient list
    Route::get('/patient_list/{id}', [MainController::class, 'patient_list'])->name('patient_list');
    Route::get('/edit_patient/{id}', [MainController::class, 'edit_patient_list'])->name('edit_patient_list');
    Route::put('/update_patient', [MainController::class, 'update_patient_list'])->name('update_patient_list');
    Route::delete('/delete_patient', [MainController::class, 'delete_patient_list'])->name('delete_patient_list');


    Route::get('/patient_appoinment/{id}', [MainController::class, 'patient_appoinment'])->name('patient_appoinment'); //check Later

    Route::get('/get_patient_info/{d_id}/{mobile}', [MainController::class, 'get_patient_info'])->name('get_patient_info');

    Route::put('/appointment', [MainController::class, 'appointment'])->name('appointment');
    Route::get('/view_appointment/{date}', [MainController::class, 'view_appointment'])->name('view_appointment');
    Route::get('/edit_appointment/{id}', [MainController::class, 'edit_appointment'])->name('edit_appointment');
    Route::put('/update_appointment', [MainController::class, 'update_appointment'])->name('update_appointment');
    Route::delete('/delete_appointment', [MainController::class, 'delete_appointment'])->name('delete_appointment');

    Route::put('/next_appointment', [MainController::class, 'next_appointment'])->name('next_appointment');


    //view_patient
    Route::get('/view/patient/{d_id}/{p_id}', [MainController::class, 'view_patient'])->name('view_patient'); //view

    // Patient Other Info Update
    Route::put('/update/patient/{id}', [MainController::class, 'update_patient'])->name('update_patient');

    Route::post('/view/patient/{d_id}/{p_id}', [MainController::class, 'treatment_info'])->name('treatment_info');

    Route::get('/view/patient/treatment/{d_id}/{p_id}/{t_id}/{t_plans}', [MainController::class, 'treatments'])->name('treatments');
    // Route::post('/view/patient/treatment/{p_id}/{t_id}/{t_plans}',[MainController::class,'treatments'])->name('treatments');

    Route::get('/view/patient/prescription/{d_id}/{p_id}', [MainController::class, 'prescription'])->name('prescription');
    Route::get('/view_prescription/{d_id}/{p_id}', [MainController::class, 'view_prescription'])->name('view_prescription');
    Route::post('/patient/prescription/drug/{d_id}/{p_id}', [MainController::class, 'add_drug'])->name('add_drug');
    Route::get('/edit_drug/{id}', [MainController::class, 'edit_drug'])->name('edit_drug');
    Route::put('/update_drug', [MainController::class, 'update_drug'])->name('update_drug');
    Route::delete('/delete_drug', [MainController::class, 'delete_drug'])->name('delete_drug');
    Route::post('/prescription_add/{d_id}', [MainController::class, 'prescription_add'])->name('prescription_add');
    // Route::post('/prescription_add/{d_id}/{t_id}/{t_plans}', [MainController::class, 'prescription_add'])->name('prescription_add');
    Route::delete('/prescription_delete', [MainController::class, 'prescription_delete'])->name('prescription_delete');

    Route::get('/get_drug_info/{p_id}', [MainController::class, 'get_drug_info'])->name('get_drug_info');

    Route::get('/invoice/{d_id}/{p_id}', [MainController::class, 'invoice'])->name('invoice');
    Route::put('/treatment_payment', [MainController::class, 'treatment_payment'])->name('treatment_payment');
    Route::put('/treatment_discount', [MainController::class, 'treatment_discount'])->name('treatment_discount');

    Route::post('/treatment_steps/{d_id}/{p_id}/{t_id}', [MainController::class, 'treatment_steps'])->name('treatment_steps');
    Route::get('/ot_notes/{id}', [MainController::class, 'ot_notes'])->name('ot_notes');
    Route::put('/update_ot', [MainController::class, 'update_ot'])->name('update_ot');
    Route::delete('/delete_ot', [MainController::class, 'delete_ot'])->name('delete_ot');


    Route::post('/report/{d_id}/{p_id}/{t_id}', [MainController::class, 'report'])->name('report');
    Route::delete('/report_delete', [MainController::class, 'report_delete'])->name('report_delete');


    // SubMainController

    Route::get('/doctor_profile_setting/{d_id}', [SubMainController::class, 'doctor_profile_setting'])->name('doctor_profile_setting');

    Route::post('/add_barcode', [SubMainController::class, 'add_barcode'])->name('add_barcode');
    Route::put('/update_barcode', [SubMainController::class, 'update_barcode'])->name('update_barcode');

    Route::post('/treatment_cost', [SubMainController::class, 'treatment_cost'])->name('treatment_cost');
    Route::get('/edit_treatment_cost/{id}', [SubMainController::class, 'edit_treatment_cost'])->name('edit_treatment_cost');
    Route::put('/update_treatment_cost', [SubMainController::class, 'update_treatment_cost'])->name('update_treatment_cost');
    Route::delete('/delete_treatment_cost', [SubMainController::class, 'delete_treatment_cost'])->name('delete_treatment_cost');

    Route::post('/doctor_chamber', [SubMainController::class, 'doctor_chember'])->name('doctor_chember');
    Route::get('/edit_chamber/{id}', [SubMainController::class, 'edit_chember'])->name('edit_chember');
    Route::put('/update_chamber', [SubMainController::class, 'update_chember'])->name('update_chember');
    Route::delete('/delete_chamber', [SubMainController::class, 'delete_chember'])->name('delete_chember');

    Route::post('/chamber_schedule', [SubMainController::class, 'chember_schedule'])->name('chember_schedule');


    Route::post('/add_favourite', [SubMainController::class, 'add_favourite'])->name('add_favourite');
    Route::get('/edit_favourite/{id}', [SubMainController::class, 'edit_favourite'])->name('edit_favourite');
    Route::put('/update_favourite', [SubMainController::class, 'update_favourite'])->name('update_favourite');



    Route::post('/chife_complaint', [SubMainController::class, 'chife_complaint'])->name('chife_complaint');
    Route::get('/edit_chife_complaint/{id}', [SubMainController::class, 'edit_chife_complaint'])->name('edit_chife_complaint');
    Route::put('/update_chife_complaint', [SubMainController::class, 'update_chife_complaint'])->name('update_chife_complaint');
    Route::delete('/delete_chife_complaint', [SubMainController::class, 'delete_chife_complaint'])->name('delete_chife_complaint');

    Route::post('/clinical_finding', [SubMainController::class, 'clinical_finding'])->name('clinical_finding');
    Route::get('/edit_clinical_finding/{id}', [SubMainController::class, 'edit_clinical_finding'])->name('edit_clinical_finding');
    Route::put('/update_clinical_finding', [SubMainController::class, 'update_clinical_finding'])->name('update_clinical_finding');
    Route::delete('/delete_clinical_finding', [SubMainController::class, 'delete_clinical_finding'])->name('delete_clinical_finding');

    Route::post('/investigation', [SubMainController::class, 'investigation'])->name('investigation');
    Route::get('/edit_investigation/{id}', [SubMainController::class, 'edit_investigation'])->name('edit_investigation');
    Route::put('/update_investigation', [SubMainController::class, 'update_investigation'])->name('update_investigation');
    Route::delete('/delete_investigation', [SubMainController::class, 'delete_investigation'])->name('delete_investigation');

    Route::post('/treatment_plan', [SubMainController::class, 'treatment_plan'])->name('treatment_plan');
    Route::get('/edit_treatment_plan/{id}', [SubMainController::class, 'edit_treatment_plan'])->name('edit_treatment_plan');
    Route::put('/update_treatment_plan', [SubMainController::class, 'update_treatment_plan'])->name('update_treatment_plan');
    Route::delete('/delete_treatment_plan', [SubMainController::class, 'delete_treatment_plan'])->name('delete_treatment_plan');

    Route::post('/admin_add_tp', [SubMainController::class, 'admin_add_tp'])->name('admin_add_tp');
    Route::get('/admin_edit_tp/{id}', [SubMainController::class, 'admin_edit_tp'])->name('admin_edit_tp');
    Route::put('/admin_update_tp', [SubMainController::class, 'admin_update_tp'])->name('admin_update_tp');
    Route::delete('/admin_delete_tp', [SubMainController::class, 'admin_delete_tp'])->name('admin_delete_tp');



    Route::post('/medicine_add', [SubMainController::class, 'medicine_add'])->name('medicine_add');
    Route::get('/edit_medicine/{id}', [SubMainController::class, 'edit_medicine'])->name('edit_medicine');
    Route::put('/update_medicine', [SubMainController::class, 'update_medicine'])->name('update_medicine');
    Route::delete('/delete_medicine', [SubMainController::class, 'delete_medicine'])->name('delete_medicine');

    // AdminController

    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'admin'])->name('admin');

        Route::get('/doctor_list', [AdminController::class, 'doctor_list'])->name('doctor_list');
        Route::post('/doctor_add', [AdminController::class, 'doctor_add'])->name('doctor_add');
        Route::get('/edit_doctor/{id}', [AdminController::class, 'edit_doctor'])->name('edit_doctor');
        Route::put('/update_doctor', [AdminController::class, 'update_doctor'])->name('update_doctor');
        Route::delete('/delete_doctor', [AdminController::class, 'delete_doctor'])->name('delete_doctor');
        Route::get('/doctor_status/{id}', [AdminController::class, 'doctor_status'])->name('doctor_status');
        Route::get('/doctor_verification/{id}', [AdminController::class, 'doctor_verification'])->name('doctor_verification');

        Route::get('/subscription_list', [AdminController::class, 'subscription_list'])->name('subscription_list');
        Route::get('/subscription_status/{id}', [AdminController::class, 'subscription_status'])->name('subscription_status');
        Route::delete('/delete_subscription', [AdminController::class, 'delete_subscription'])->name('delete_subscription');

        Route::post('/redeem_add', [AdminController::class, 'redeem_add'])->name('redeem_add');
        Route::get('/redeem_status/{id}', [AdminController::class, 'redeem_status'])->name('redeem_status');
        Route::delete('/delete_redeem', [AdminController::class, 'delete_redeem'])->name('delete_redeem');

        Route::get('/chief_complaint_list', [AdminController::class, 'chief_complaint_list'])->name('chief_complaint_list');
        Route::post('/add_chife_complaint', [SubMainController::class, 'add_chife_complaint'])->name('add_chife_complaint');

        Route::get('/clinical_findings_list', [AdminController::class, 'clinical_findings_list'])->name('clinical_findings_list');
        Route::post('/add_clinical_finding', [SubMainController::class, 'add_clinical_finding'])->name('add_clinical_finding');

        Route::get('/investigation_list', [AdminController::class, 'investigation_list'])->name('investigation_list');
        Route::post('/add_investigation', [SubMainController::class, 'add_investigation'])->name('add_investigation');

        Route::get('/treatment_plans_list', [AdminController::class, 'treatment_plans_list'])->name('treatment_plans_list');

        Route::get('/medicine_list', [AdminController::class, 'medicine_list'])->name('medicine_list');
        Route::post('/admin_add_medicine', [SubMainController::class, 'admin_add_medicine'])->name('admin_add_medicine');

        Route::get('/notice_list', [AdminController::class, 'notice_list'])->name('notice_list');
        Route::post('/notice_add', [AdminController::class, 'notice_add'])->name('notice_add');
        Route::get('/notice_status/{id}', [AdminController::class, 'notice_status'])->name('notice_status');
        Route::get('/notice_edit/{id}', [AdminController::class, 'notice_edit'])->name('notice_edit');
        Route::put('/notice_update', [AdminController::class, 'notice_update'])->name('notice_update');
        Route::delete('/notice_delete', [AdminController::class, 'notice_delete'])->name('notice_delete');

        // shop
        Route::get('/shop_panel', [AdminController::class, 'shop_panel'])->name('shop_panel');
        Route::get('/supplier_list', [AdminController::class, 'supplier_list'])->name('supplier_list');
        Route::post('/supplier_add', [AdminController::class, 'supplier_add'])->name('supplier_add');
        Route::delete('/supplier_delete', [AdminController::class, 'supplier_delete'])->name('supplier_delete');
        Route::get('/supplier_status/{id}', [AdminController::class, 'supplier_status'])->name('supplier_status');


    });


    // Route::post('/admin/medicine_add', [AdminController::class, 'medicine_add'])->name('medicine_add');

    // Route::put('/admin/update_medicine', [AdminController::class, 'update_medicine'])->name('update_medicine');
    // Route::delete('/admin/delete_medicine', [AdminController::class, 'delete_medicine'])->name('delete_medicine');

    Route::get('/send_mail/{d_id}/{p_id}', [MainController::class, 'sendMailWithPdf'])->name('send_mail');
    Route::get('/action/{d_id}/{mobile}', [FrontEndController::class, 'action'])->name('action');
    Route::get('/select_chamber/{id}', [FrontEndController::class, 'select_chamber'])->name('select_chamber');



    Route::get('/test', [FrontEndController::class, 'test'])->name('test');


    // Shop

    Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
    Route::get('/shop/product/{tb_name}/{id}', [ShopController::class, 'shop_product'])->name('shop_product');
    Route::get('/shop/product_details/{p_id}', [ShopController::class, 'shop_single_product'])->name('shop_single_product');

    Route::post('/addToCart', [ShopController::class, 'addToCart'])->name('addToCart');
    Route::get('/shop/cart_view', [ShopController::class, 'cart_view'])->name('cart_view');
    Route::post('/CartIncrement', [ShopController::class, 'CartIncrement'])->name('CartIncrement');
    Route::post('/deleteCart', [ShopController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/clearCarts', [ShopController::class, 'clearCarts'])->name('clearCarts');

    Route::get('/placeOrder/{id}', [ShopController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/Order_list', [ShopController::class, 'Order_list'])->name('Order_list');
    Route::get('/order_invoice/{id}', [ShopController::class, 'order_invoice'])->name('order_invoice');



    // shop admin
    Route::get('/shop/shop_admin', [ShopController::class, 'shop_admin'])->name('shop_admin');
    Route::get('/shop/shop_admin/edit', [ShopController::class, 'shop_admin_edit'])->name('shop_admin_edit');
    Route::put('/supplier_update', [ShopController::class, 'supplier_update'])->name('supplier_update');

    Route::get('/shop/shop_admin/product_list', [ShopController::class, 'shop_admin_product_list'])->name('shop_admin_product_list');
    Route::get('/shop/shop_admin/add_product', [ShopController::class, 'shop_add_product'])->name('shop_add_product');
    Route::get('/shop/shop_admin/edit_product/{id}', [ShopController::class, 'shop_edit_product'])->name('shop_edit_product');

    Route::get('/shop/shop_admin/fatch_subcat/{id}', [ShopController::class, 'fatch_subcat'])->name('fatch_subcat');
    Route::get('/shop/shop_admin/fatch_sub_subcat/{id}', [ShopController::class, 'fatch_sub_subcat'])->name('fatch_sub_subcat');
    Route::get('/shop/shop_admin/fatch_sub_subcat1/{id}', [ShopController::class, 'fatch_sub_subcat1'])->name('fatch_sub_subcat1');
    Route::get('/shop/shop_admin/fatch_sub_subcat2/{id}', [ShopController::class, 'fatch_sub_subcat2'])->name('fatch_sub_subcat2');

    Route::post('/add_shop_product', [ShopController::class, 'add_shop_product'])->name('add_shop_product');
    Route::put('/edit_shop_product/{id}', [ShopController::class, 'edit_shop_product'])->name('edit_shop_product');
    Route::get('/product_status/{id}', [ShopController::class, 'product_status'])->name('product_status');
    Route::delete('/product_delete', [ShopController::class, 'product_delete'])->name('product_delete');
    Route::post('/restock_shop_product', [ShopController::class, 'restock_shop_product'])->name('restock_shop_product');

    Route::get('/shop/shop_admin/order_list', [ShopController::class, 'shop_order_list'])->name('shop_order_list');
    Route::get('/shop/shop_admin/order_confirm/{id}', [ShopController::class, 'order_confirm'])->name('order_confirm');
    Route::get('/shop/shop_admin/order_cancel/{id}', [ShopController::class, 'order_cancel'])->name('order_cancel');


    //Inventory
    Route::get('/inventory', [InventoryController::class, 'inventories'])->name('inventory');
    Route::post('/add_inventory', [InventoryController::class, 'add_inventory'])->name('add_inventory');
    Route::get('/edit_inventory/{id}', [InventoryController::class, 'edit_inventory'])->name('edit_inventory');
    Route::put('/update_inventory', [InventoryController::class, 'update_inventory'])->name('update_inventory');
    Route::put('/restock_inventory', [InventoryController::class, 'restock_inventory'])->name('restock_inventory');
    Route::get('/inventory_status/{id}', [InventoryController::class, 'inventory_status'])->name('inventory_status');



    // Forum
    Route::get('/forum', [ForumController::class, 'forum'])->name('forum');




});





