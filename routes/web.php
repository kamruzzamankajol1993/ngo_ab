<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NGO\OtherformController;
use App\Http\Controllers\NGO\FormeightController;
use App\Http\Controllers\NGO\NgomemberController;
use App\Http\Controllers\NGO\NgomemberdocController;
use App\Http\Controllers\NGO\NgodocumentController;
use App\Http\Controllers\NGO\FdoneformController;
use App\Http\Controllers\NGO\RegsubmitController;
use App\Http\Controllers\NGO\NamechangeController;
use App\Http\Controllers\NGO\RenewController;
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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->route('index');
});




Route::controller(NamechangeController::class)->group(function () {


    Route::get('add_other_doc', 'add_other_doc')->name('add_other_doc');
    Route::post('store_other_doc', 'store_other_doc')->name('store_other_doc');
    Route::post('update_other_doc', 'update_other_doc')->name('update_other_doc');

    Route::get('final_submit_name_change', 'final_submit_name_change')->name('final_submit_name_change');


    Route::get('all_ngo_related_document', 'all_ngo_related_document')->name('all_ngo_related_document');


    Route::get('ngo_member_id_and_images', 'ngo_member_id_and_images')->name('ngo_member_id_and_images');
    Route::get('ngo_member_id_and_images_add', 'ngo_member_id_and_images_add')->name('ngo_member_id_and_images_add');
    Route::post('ngo_member_id_and_images_store', 'ngo_member_id_and_images_store')->name('ngo_member_id_and_images_store');
    Route::post('ngo_member_id_and_images_update', 'ngo_member_id_and_images_update')->name('ngo_member_id_and_images_update');


    Route::get('view_form_8_for_change', 'view_form_8_for_change')->name('view_form_8_for_change');
    Route::get('view_form_8_for_change_add', 'view_form_8_for_change_add')->name('view_form_8_for_change_add');
    Route::get('view_form_8_for_change_edit/{id}', 'view_form_8_for_change_edit')->name('view_form_8_for_change_edit');
    Route::post('view_form_8_for_change_store', 'view_form_8_for_change_store')->name('view_form_8_for_change_store');
    Route::post('view_form_8_for_change_update', 'view_form_8_for_change_update')->name('view_form_8_for_change_update');
    Route::post('view_form_8_for_change_delete/{id}','delete')->middleware(['auth'])->name('view_form_8_for_change_delete');


    Route::get('committee_ngo_member', 'committee_ngo_member')->name('committee_ngo_member');
    Route::get('committee_ngo_member_add', 'committee_ngo_member_add')->name('committee_ngo_member_add');
    Route::get('committee_ngo_member_edit/{id}', 'committee_ngo_member_edit')->name('committee_ngo_member_edit');
    Route::post('committee_ngo_member_store', 'committee_ngo_member_store')->name('committee_ngo_member_store');
    Route::post('committee_ngo_member_update', 'committee_ngo_member_update')->name('committee_ngo_member_update');



    Route::get('send_name_change_page', 'send_name_change_page')->name('send_name_change_page');

    Route::get('name_change_page', 'name_change_page')->name('name_change_page');


    Route::get('/form_one_pdf/{main_id}/{id}',  'form_one_pdf')->name('form_one_pdf');
    Route::get('/form_eight_pdf/{main_id}','form_eight_pdf')->name('form_eight_pdf');
    Route::get('/source_of_fund/{id}', 'source_of_fund')->name('source_of_fund');
    Route::get('/other_pdf_view/{id}','other_pdf_view')->name('other_pdf_view');

    Route::get('/ngo_doc/{id}','ngo_doc')->name('ngo_doc');
    Route::get('/ngo_member_doc/{id}','ngo_member_doc')->name('ngo_member_doc');
});


Route::controller(RenewController::class)->group(function () {

    Route::get('renew_page', 'renew_page')->name('renew_page');
    Route::get('ngo_renew_list_new', 'ngo_renew_list_new')->name('ngo_renew_list_new');
    Route::post('store_renew_information_list', 'store_renew_information_list')->name('store_renew_information_list');


    Route::post('update_renew_information_list', 'update_renew_information_list')->name('update_renew_information_list');





    Route::get('all_staff_information_for_renew', 'all_staff_information_for_renew')->name('all_staff_information_for_renew');
    Route::post('all_staff_information_for_renew_store', 'all_staff_information_for_renew_store')->name('all_staff_information_for_renew_store');
    Route::get('other_information_for_renew', 'other_information_for_renew')->name('other_information_for_renew');
    Route::post('other_information_for_renew_get', 'other_information_for_renew_get')->name('other_information_for_renew_get');
});



Route::controller(RegsubmitController::class)->group(function () {

    Route::get('reg_submit_list', 'reg_submit_list')->name('reg_submit_list');
});

Route::controller(AuthController::class)->group(function () {
    ///

    Route::get('/check_mail_from_list','check_mail_from_list')->name('check_mail_from_list');
    Route::post('/send_mail_get_from_list','send_mail_get_from_list')->name('send_mail_get_from_list');
    Route::get('/password_reset_page/{id}','password_reset_page')->name('password_reset_page');
    Route::get('/successfully_mail_send/{id}','successfully_mail_send')->name('successfully_mail_send');

    Route::post('/password_change_confirmed','password_change_confirmed')->name('password_change_confirmed');

    Route::get('/password_reset','showLinkRequestForm')->name('admin.password.request');

    ////

Route::get('login', 'index')->name('login');
Route::post('post_login','postLogin')->name('login.post');
Route::get('registration','registration')->name('register');
Route::post('post_registration','postRegistration')->name('register.post');
Route::post('update_registration','updateRegistration')->name('register.update');
Route::get('logout','logout')->name('logout');

/* New Added Routes */
Route::get('dashboard','dashboard')->middleware(['auth', 'is_verify_email'])->name('dashboard');
Route::get('account/verify/{token}','verifyAccount')->name('user.verify');

});

Route::controller(OtherformController::class)->group(function () {


    Route::get('frequently_ask_question', 'frequently_ask_question')->name('frequently_ask_question');


    Route::post('final_submit_reg_form', 'final_submit_reg_form')->name('final_submit_reg_form');
    Route::post('check_status_reg_from', 'check_status_reg_from')->name('check_status_reg_from');
    Route::get('status_page', 'status_page')->name('status_page');



    Route::get('email_verify_page', 'email_verify_page')->name('email_verify_page');

    Route::get('email_verified_page', 'email_verified_page')->name('email_verified_page');


    Route::get('ngo_instruction_page', 'ngo_instruction_page')->name('ngo_instruction_page');
    Route::get('ngo_registration_fee_list', 'ngo_registration_fee_list')->name('ngo_registration_fee_list');

    Route::get('lang/change', 'change')->name('changeLang');

    Route::get('change_language', 'change_language')->name('change_language');



    Route::post('update_user','update_user')->middleware(['auth'])->name('update_user');

    Route::post('reset_all_data','reset_all_data')->middleware(['auth'])->name('reset_all_data');

    Route::post('ngo_type_and_language_post','ngo_type_and_language_post')->middleware(['auth'])->name('ngo_type_and_language_post');
    Route::post('ngo_type_and_language_delete/{id}','ngo_type_and_language_delete')->middleware(['auth'])->name('ngo_type_and_language_delete');

    Route::get('ngo_type_and_language','ngo_type_and_language')->middleware(['auth'])->name('ngo_type_and_language');
    Route::get('ngo_registration_first_info','ngo_registration_first_info')->middleware(['auth'])->name('ngo_registration_first_info');

    Route::post('ngo_registration_first_info_post','ngo_registration_first_info_post')->middleware(['auth'])->name('ngo_registration_first_info_post');



    Route::get('ngo_registration_second_info','ngo_registration_second_info')->middleware(['auth'])->name('ngo_registration_second_info');

    Route::post('ngo_registration_second_info_post','ngo_registration_second_info_post')->middleware(['auth'])->name('ngo_registration_second_info_post');


    Route::get('ngo_all_registration_form','ngo_all_registration_form')->middleware(['auth'])->name('ngo_all_registration_form');

});


Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');

});


Route::controller(FdoneformController::class)->group(function () {

    Route::post('/upload_from_one_pdf', 'upload_from_one_pdf')->name('upload_from_one_pdf');

    Route::get('/back_from_step_two', 'back_from_step_two')->name('back_from_step_two');


    Route::get('/source_of_fund_doc_download/{id}', 'source_of_fund_doc_download')->middleware(['auth'])->name('source_of_fund_doc_download');

    Route::get('/other_info_from_one_download/{id}', 'other_info_from_one_download')->middleware(['auth'])->name('other_info_from_one_download');

    Route::get('/adviser_data_delete', 'adviser_data_delete')->name('adviser_data_delete');

    Route::get('/adviser_data_update', 'adviser_data_update')->name('adviser_data_update');



    Route::get('/other_information_a_delete', 'other_information_a_delete')->name('other_information_a_delete');

    Route::post('/other_information_a_update', 'other_information_a_update')->name('other_information_a_update');



    Route::get('/source_of_fund_delete', 'source_of_fund_delete')->name('source_of_fund_delete');

    Route::post('/source_of_fund_update', 'source_of_fund_update')->name('source_of_fund_update');

    Route::get('/fd_one_form_edit', 'fd_one_form_edit')->name('fd_one_form_edit');

    Route::get('/fd_one_form_information_pdf', 'fd_one_form_information_pdf')->name('fd_one_form_information_pdf');

    Route::get('/fd_one_form_information', 'fd_one_form_information')->name('fd_one_form_information');


    Route::get('/particulars_of_Organisation', 'particulars_of_Organisation')->name('particulars_of_Organisation');
    Route::post('/particulars_of_Organisation_post', 'particulars_of_Organisation_post')->name('particulars_of_Organisation_post');

    Route::post('/particulars_of_Organisation_update', 'particulars_of_Organisation_update')->name('particulars_of_Organisation_update');


    Route::get('/field_of_proposed_activities', 'field_of_proposed_activities')->name('field_of_proposed_activities');
    Route::post('/field_of_proposed_activities_post', 'field_of_proposed_activities_post')->name('field_of_proposed_activities_post');


    Route::post('/field_of_proposed_activities_update', 'field_of_proposed_activities_update')->name('field_of_proposed_activities_update');



    Route::get('/all_staff_details_information', 'all_staff_details_information')->name('all_staff_details_information');
    Route::post('/all_staff_details_information_post', 'all_staff_details_information_post')->name('all_staff_details_information_post');


    Route::post('/all_staff_details_information_update', 'all_staff_details_information_update')->name('all_staff_details_information_update');


    Route::get('/others_information', 'others_information')->name('others_information');
    Route::post('/others_information_post', 'others_information_post')->name('others_information_post');


    Route::post('/others_information_update', 'others_information_update')->name('others_information_update');


});


Route::controller(NgomemberdocController::class)->group(function () {

    Route::get('/ngo_member_document_download/{id}', 'ngo_member_document_download')->middleware(['auth'])->name('ngo_member_document_download');



    Route::get('/ngo_member_document', 'ngo_member_document')->middleware(['auth'])->name('ngo_member_document');
    Route::get('/ngo_member_document_create', 'ngo_member_document_create')->middleware(['auth'])->name('ngo_member_document_create');
    Route::post('/ngo_member_document_store', 'ngo_member_document_store')->middleware(['auth'])->name('ngo_member_document_store');
    Route::post('/ngo_member_document_update', 'ngo_member_document_update')->middleware(['auth'])->name('ngo_member_document_update');
    Route::get('/ngo_member_document_view', 'ngo_member_document_view')->middleware(['auth'])->name('ngo_member_document_view');
    Route::get('/ngo_member_document_edit/{id}', 'ngo_member_document_edit')->middleware(['auth'])->name('ngo_member_document_edit');
    Route::post('ngo_member_document_delete/{id}','delete')->middleware(['auth'])->name('ngo_member_document_delete');
});


Route::controller(NgomemberController::class)->group(function () {
    Route::get('/ngo_member', 'ngo_member')->middleware(['auth'])->name('ngo_member');
    Route::get('/ngo_member_create', 'ngo_member_create')->middleware(['auth'])->name('ngo_member_create');
    Route::post('/ngo_member_store', 'ngo_member_store')->middleware(['auth'])->name('ngo_member_store');
    Route::post('/ngo_member_update', 'ngo_member_update')->middleware(['auth'])->name('ngo_member_update');
    Route::get('/ngo_member_view', 'ngo_member_view')->middleware(['auth'])->name('ngo_member_view');
    Route::get('/ngo_member_edit/{id}', 'ngo_member_edit')->middleware(['auth'])->name('ngo_member_edit');
    Route::post('ngo_member_delete/{id}','delete')->middleware(['auth'])->name('ngo_member_delete');
});

Route::controller(NgodocumentController::class)->group(function () {

    Route::get('/ngo_document_download/{id}', 'ngo_document_download')->middleware(['auth'])->name('ngo_document_download');


    Route::get('/ngo_document', 'ngo_document')->middleware(['auth'])->name('ngo_document');
    Route::get('/ngo_document_create', 'ngo_document_create')->middleware(['auth'])->name('ngo_document_create');
    Route::post('/ngo_document_store', 'ngo_document_store')->middleware(['auth'])->name('ngo_document_store');
    Route::post('/ngo_document_update', 'ngo_document_update')->middleware(['auth'])->name('ngo_document_update');
    Route::get('/ngo_document_view', 'ngo_document_view')->middleware(['auth'])->name('ngo_document_view');
    Route::get('/ngo_document_edit/{id}', 'ngo_document_edit')->middleware(['auth'])->name('ngo_document_edit');
    Route::post('ngo_document_delete/{id}','delete')->middleware(['auth'])->name('ngo_document_delete');
});



Route::controller(FormeightController::class)->group(function () {

    Route::post('/upload_from_eight_pdf', 'upload_from_eight_pdf')->name('upload_from_eight_pdf');

    Route::get('/form_8_ngo_committee_member_totalview', 'form_8_ngo_committee_member_totalview')->middleware(['auth'])->name('form_8_ngo_committee_member_totalview');
    Route::get('/form_8_ngo_committee_total_year', 'form_8_ngo_committee_total_year')->middleware(['auth'])->name('form_8_ngo_committee_total_year');
    Route::get('/form_8_ngo_committee_member_pdf', 'form_8_ngo_committee_member_pdf')->middleware(['auth'])->name('form_8_ngo_committee_member_pdf');


    Route::get('/form_8_ngo_committee_member_view_from_edit', 'form_8_ngo_committee_member_view_from_edit')->middleware(['auth'])->name('form_8_ngo_committee_member_view_from_edit');


    Route::get('/form_8_ngo_committee_member', 'form_8_ngo_committee_member')->middleware(['auth'])->name('form_8_ngo_committee_member');
    Route::get('/form_8_ngo_committee_member_create', 'form_8_ngo_committee_member_create')->middleware(['auth'])->name('form_8_ngo_committee_member_create');
    Route::post('/form_8_ngo_committee_member_store', 'form_8_ngo_committee_member_store')->middleware(['auth'])->name('form_8_ngo_committee_member_store');
    Route::post('/form_8_ngo_committee_member_update', 'form_8_ngo_committee_member_update')->middleware(['auth'])->name('form_8_ngo_committee_member_update');
    Route::get('/form_8_ngo_committee_member_view', 'form_8_ngo_committee_member_view')->middleware(['auth'])->name('form_8_ngo_committee_member_view');
    Route::get('/form_8_ngo_committee_member_edit/{id}', 'form_8_ngo_committee_member_edit')->middleware(['auth'])->name('form_8_ngo_committee_member_edit');
    Route::post('form_8_ngo_committee_member_delete/{id}','delete')->middleware(['auth'])->name('form_8_ngo_committee_member_delete');
});
