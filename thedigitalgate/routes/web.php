<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Aspirant\AspirantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ModuleManageController;
use App\Http\Controllers\Trainer\ModuleController;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Middleware\CheckAuth;

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

Route::get('/', function () {
	//  return view('/index1');
	//  return view('/index2');
	return view('/index3');
})->name('talent');

Route::get('privacypolicy', function () {
	return view('/privacypolicy');
})->name('privacy_policy');
Route::get('sustainability', function () {
	return view('/sustainability');
})->name('sustainability');
Route::get('termsofuse', function () {
	return view('/termsofuse');
})->name('termsofuse');
Route::get('aboutus', function () {
	return view('/aboutus');
})->name('aboutus');
Route::get('blog', function () {
	return view('/blog');
})->name('blog');
Route::get('buyer_seller_specific_terms', function () {
	return view('/terms');
})->name('terms');;

Route::get('/get_categories', [ApiController::class, 'getCategories'])->name('get_categories');
Route::get('/get_skillset', [ApiController::class, 'getSkillset'])->name('get_skillset');
Route::get('/get_modules', [ApiController::class, 'getTrainingModule'])->name('get_modules');

Route::get('/get_register_codes', [ApiController::class, 'getCodes'])->name('get_register_codes');
Route::get('/set_countries', [ApiController::class, 'setCountries'])->name('set_countries');
Route::get('/get_countries', [ApiController::class, 'getCountries'])->name('get_countries');
Route::get('/get_brands', [ApiController::class, 'getBrands'])->name('get_brands');
Route::get('/get_states_by_country', [ApiController::class, 'getStates'])->name('get_states_by_country');
Route::get('/get_payment_terms', [ApiController::class, 'getPaymentTerms'])->name('get_payment_terms');
Route::get('/get_sales_advisors', [ApiController::class, 'getSalesAdvisors'])->name('get_sales_advisors');
Route::get('/get_tests', [ApiController::class, 'getTests'])->name('get_tests');

Route::get('/get_category_of_industry/{id?}/{category?}', [ApiController::class, 'getCategoryOfIndustry'])->name('get_category_of_industry');
Route::get('/get_product_type_of_category/{id}/{type?}', [ApiController::class, 'getProductTypeOfCategory'])->name('get_product_type_of_industry');
Route::get('/get_featured_products', [ApiController::class, 'get_featured_products'])->name('get_featured_products');
Route::get('/update_alert/{id}', [ApiController::class, 'update_alert'])->name('update_alert');

Route::get('/get_related_products/{id}', [ApiController::class, 'get_related_products'])->name('get_related_products');
Route::get('/get_product_reviews/{id}', [ApiController::class, 'get_product_reviews'])->name('get_product_reviews');
Route::get('/get_product_faqs/{id}', [ApiController::class, 'get_product_faqs'])->name('get_product_faqs');
Route::get('/get_user_review/{id}/{user_id}', [ApiController::class, 'get_user_review'])->name('get_user_review');

Route::any('/google-oauth-success', [HomeController::class, 'google_oauth_success'])->name('google_oauth_success');


Route::any('/saveenquiry', [HomeController::class, 'save_enquiry'])->name('home.enquiry');
Route::any('/enquiries', [HomeController::class, 'enquiry_list'])->name('enquiry_list');

Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['guest', 'XssSanitizer'])->group(function () {


	// Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
	// Route::any('razorpay-payment', [RazorpayPaymentController::class, 'index'])->name('razorpay.payment.store');
	Route::post('razorpay-payment', [RazorpayPaymentController::class, 'index'])->name('razorpay.payment.store');

	// 	Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
	// Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

	Route::post('razorpay-payment/success', [RazorpayPaymentController::class, 'saverazorpayid'])->name('saverazorpayid');
	Route::post('razorpay-payment/failed', [RazorpayPaymentController::class, 'savefailrazorpayid'])->name('savefailrazorpayid');

	Route::get('signup', function () {
		return view('/auth/signup');
	})->name('signup');

	Route::get('welcome', function () {
		return view('/auth/welcome');
	})->name('welcome');

	// Route::get('register/success', function () {
	// return view('/auth/awesome');
	// })->name('register_success');
	Route::any('/register/success', [RegisterController::class, 'register_success'])->name('register_success');


	Route::any('/login', [LoginController::class, 'login'])->name('login');

	Route::any('/register', [RegisterController::class, 'register'])->name('register');
	Route::post('/register_save', [RegisterController::class, 'register_save'])->name('register_save');
	Route::any('/update_password', [RegisterController::class, 'update_password'])->name('update_password');
	Route::any('/new_password', [RegisterController::class, 'new_password'])->name('new_password');
	Route::any('/verify_email', [RegisterController::class, 'verify_email'])->name('verify_email');
	/*Route::get('/register_success',[ RegisterController::class, 'register_success'])->name('register_success');*/

	Route::any('/forgot_password', [LoginController::class, 'forgot_password'])->name('forgot_password');
	Route::any('/reset_password', [LoginController::class, 'reset_password'])->name('reset_password');

	Route::any('/contactus', [HomeController::class, 'contactus'])->name('contactus');

	Route::group(['middleware' => 'auth'], function () {
		// Your protected routes
	});
	Route::middleware(['custom_auth_trainer'])->group(function () {
		Route::any('/trainer/myprofile', [HomeController::class, 'tmyprofile'])->name('tmyprofile');
		Route::any('/trainer/profiledetails', [HomeController::class, 'tprofiledetails'])->name('tprofile');
		Route::any('/trainer/profiledetails/save', [HomeController::class, 'tprofiledetailssave'])->name('tprofilesave');
		Route::any('/trainer/profiledetails/trainerDetailsSaveProfilePic', [HomeController::class, 'trainerDetailsSaveProfilePic'])->name('trainerDetailsSaveProfilePic');
		Route::any('/aspirant/delete_trainer', [HomeController::class, 'delete_trainer'])->name('delete_trainer');

		Route::any('/trainer/managemodules', [TrainerController::class, 'tmanagemodules'])->name('tmanagemodules');
		Route::any('/trainer/dashboardacc', [TrainerController::class, 'tdashboardacc'])->name('tdashboardacc');
		Route::any('/trainer/settings', [TrainerController::class, 'tsettings'])->name('tsettings');
		Route::any('/trainer/mybank/earned', [TrainerController::class, 'tmybank'])->name('tmybank');

		Route::any('/trainer/aspirant/searchaspirant', [TrainerController::class, 'tmanageAspirant'])->name('tmanageAspirant');
		Route::any('trainer/aspirant/aspirantlist/{id}', [TrainerController::class, 'tmanageAspByID'])->name('tmanageAspByID');

		Route::post('/trainer/managemodules', [ModuleController::class, 'createmoduled'])->name('createmoduled');
		Route::get('/trainer/managemodules/active/{id}', [ModuleController::class, 'updatemoduleactive'])->name('updatemoduleactive');
		Route::get('edit-module/{module_Id}', [ModuleController::class, 'editModule']);
		Route::put('update-module', [ModuleController::class, 'updateModule']);
		Route::get('/trainer/managemodules/delete/{id}', [ModuleController::class, 'softDeleteModule'])->name('softDeleteModule');

		Route::any('/trainer/message', [TrainerController::class, 'tmessage'])->name('tmessage');
		Route::any('/trainer/message_send', [TrainerController::class, 'tmessagecon'])->name('tmessagecon');
		Route::any('/trainer/notify', [TrainerController::class, 'tnotify'])->name('tnotify');
		
		Route::any('/trainer/changeTrainerPassword', [TrainerController::class, 'changeTrainerPassword'])->name('changeTrainerPassword');

		Route::any('/trainer/getChatWithAspirant', [TrainerController::class, 'getChatWithAspirant'])->name('getChatWithAspirant');
		Route::any('/trainer/join_now_send_to_aspirant', [TrainerController::class, 'join_now_send_to_aspirant'])->name('join_now_send_to_aspirant');
		
		//shivani
		Route::post('/trainer/getaspirantprofileformodal', [ModuleController::class, 'getAspirantProfileBymodal'])->name('getAspirantProfileBymodal');

		Route::post('/trainer/profileDetailsUpdateBysetting', [TrainerController::class, 'profileDetailsUpdateBysetting'])->name('profileDetailsUpdateBysetting');

		Route::post('/trainer/generateCertificate', [TrainerController::class, 'generateCertificate'])->name('generateCertificate');
			
		Route::any('/trainer/downloadModulePDF/{id}', [TrainerController::class, 'downloadModulePDF'])->name('downloadModulePDF');
		Route::any('/trainer/getAspirantBox', [TrainerController::class, 'getAspirantBox'])->name('getAspirantBox');

	});

	Route::middleware(['custom_auth_aspirant'])->group(function () {
		Route::any('/aspirant/profile/profiledetails', [HomeController::class, 'aprofiledetails'])->name('aprodetails');
		Route::any('/aspirant/profile/profiledetails/save', [HomeController::class, 'aprofiledetailssave'])->name('aprodetailssave');
		Route::any('/aspirant/profile/profiledetails/profilesave', [HomeController::class, 'aproDetailsSaveProfilePic'])->name('aproDetailsSaveProfilePic');
		Route::any('/aspirant/delete_aspirant', [HomeController::class, 'delete_aspirant'])->name('delete_aspirant');

		Route::any('talent/aspirant/notify', [AspirantController::class, 'aspinoti'])->name('aspinoti');

		Route::get('aspirant/moduleinfo/{module_Id}', [AspirantController::class, 'moduleDetailsByID'])->name('moduleDetailsByID');

		Route::post('aspirant/moduleinfo', [AspirantController::class, 'addModuleToCart'])->name('addModuleToCart');

		Route::any('/aspirant/changeAspirantPassword', [AspirantController::class, 'changeAspirantPassword'])->name('changeAspirantPassword');

		Route::any('/aspirant/getChatWithTrainer', [AspirantController::class, 'getChatWithTrainer'])->name('getChatWithTrainer');
		Route::any('/aspirant/message_send', [AspirantController::class, 'amessagecon'])->name('amessagecon');

		//shivani
		Route::any('/aspirant/aspitantprofileDetailsUpdateBysetting', [AspirantController::class, 'aspitantprofileDetailsUpdateBysetting'])->name('aspitantprofileDetailsUpdateBysetting');

		Route::any('/aspirant/trainingRemoveFromCart', [AspirantController::class, 'trainingRemoveFromCart'])->name('trainingRemoveFromCart');

		Route::post('/aspirant/generateCertificateAspirant', [AspirantController::class, 'generateCertificateAspirant'])->name('generateCertificateAspirant');
	});



	// Route::any('/trainer/aspirant/aspirantlist/{id}',[ TrainerController::class, 'tmanageAspByID'])->name('tmanageAspByID');



	Route::any('/about', [HomeController::class, 'indexAbout'])->name('indexAbout');
	//shivani
	Route::any('/get_started_mail_send', [HomeController::class, 'get_started_mail_send'])->name('get_started_mail_send');
	Route::any('/changelang', [HomeController::class, 'changelang'])->name('changelang');

	//Route::any('/aspirant/moduleinfo',[ AspirantController::class, 'AspModuleInfo'])->name('AspModuleInfo');

	// Route::any('/addModule', ModuleController::class, 'addmodule')->name('addmodule');
});



Route::middleware(['custom_auth'])->group(function () {

	// Route::post('/switch_user',[ LoginController::class, 'switch_user'])->name('switch_user');
	Route::get('/switch_user', [LoginController::class, 'switch_user']);


	Route::any('/buyer/change_password', [SellerController::class, 'change_password'])->name('change_password');
});

Route::middleware(['custom_auth_admin'])->group(function () {
	Route::get('/admin/users', [UserController::class, 'userList'])->name('userList');
	Route::post('/admin/users/list', [UserController::class, 'listUserData'])->name('listUserData');
	Route::post('/admin/users/block', [UserController::class, 'block_user'])->name('block_user');
	Route::post('/admin/users/approve', [UserController::class, 'approve_user'])->name('approve_user');
	Route::post('/admin/users/delete', [UserController::class, 'delete_user'])->name('delete_user');
	Route::get('/admin/modules', [ModuleManageController::class, 'moduleList'])->name('moduleList');
	Route::post('/admin/modules/list', [ModuleManageController::class, 'listModuleData'])->name('listModuleData');
	Route::post('/admin/modules/delete', [ModuleManageController::class, 'delete_module'])->name('delete_module');
});