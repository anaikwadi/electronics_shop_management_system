<?php

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
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    // $exitCode = Artisan::call('storage:link');
 	$exitCode = Artisan::call('view:clear');
 	$exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('clear-compiled');
    return redirect('/');
});

Route::get('/', 'HomePageVideoController@homepage');


Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();

// Dashboard Control Panel Routes
Route::group(['middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator|user']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});

// Vendor Control Panel Routes
Route::group(['prefix' => 'Vendor', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('vendor', 'VendorController');
});

// Master Entry Control Panel Routes
Route::group(['prefix' => 'MasterEntrySystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('master_entry', 'MasterEntryController');
});

// Purchase Control Panel Routes
Route::group(['prefix' => 'PurchaseSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('purchase', 'PurchaseController');
});

// Customer Control Panel Routes
Route::group(['prefix' => 'CustomerSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('customer', 'CustomerController');
});

// Sale Control Panel Routes
Route::group(['prefix' => 'SaleSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('sale', 'SaleController');
});

// Quotation Control Panel Routes
Route::group(['prefix' => 'QuotationSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('quotation', 'QuotationController');
});

// Latest Offers Control Panel Routes
Route::group(['prefix' => 'LatestOffersSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('offers', 'LatestOffersController');
});

// HomePage Video Control Panel Routes
Route::group(['prefix' => 'HomePageVideoSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('video', 'HomePageVideoController');
});

// HomePage About Us Section Control Panel Routes
Route::group(['prefix' => 'AboutUsSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('about', 'AboutUsController');
});

// Admin Our Team Page Control Panel Routes
Route::group(['prefix' => 'AdminOurTeam', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('admin_team', 'AdminOurTeamPageController');
});

// Admin Testimonials Control Panel Routes
Route::group(['prefix' => 'AdminTestimonials', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('admin_testimonial', 'AdminTestimonialController');
});

// User Testimonials Control Panel Routes
Route::group(['prefix' => 'Testimonials', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator|user']], function () {
    Route::resource('user_testimonial', 'UserTestimonialsController');
});

// Daily Expenses System Control Panel Routes
Route::group(['prefix' => 'DailyExpensesSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('daily_expenses', 'DailyExpensesController');
});

// Administrator & SuperAdministrator Control Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator'], 'namespace' => 'Admin'], function () {
    Route::resource('users', 'UsersController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController');
});

// Add_to_Cart_Items Control Panel Routes
Route::group(['prefix' => 'LatestOffers', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator|user']], function () {
    Route::resource('add_cart', 'AddToCartItemsController');
});

// Admin Add To Cart Control Panel Routes
Route::group(['prefix' => 'LatestOffersSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator|user']], function () {
    Route::resource('user_add_cart', 'AdminAddToCartController');
});
Route::get('/my_summary/{id}', 'AdminAddToCartController@show');

// Stock Available Control Panel Routes
Route::group(['prefix' => 'StockAvailableSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('stock', 'StockAvailableController');
});

// Balance Payment Control Panel Routes
Route::group(['prefix' => 'BalancePaymentSystem', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator']], function () {
    Route::resource('balance', 'BalancePaymentController');
});
Route::get('/view_bill/{id}', 'BalancePaymentController@show');


// HomePage About Us Page Control Panel Routes
Route::resource('about_us_page', 'HomeAboutUsPageController');

// HomePage Our Team Page Control Panel Routes
Route::resource('team', 'HomeOurTeamPageController');

Route::resource('contact', 'ContactUsController');
Route::resource('home_latest_offer', 'HomePageLatestOfferController');
Route::get('/latest_offer_details/{id}', 'HomePageLatestOfferController@show');

// Home Testimonial Page Control Panel Routes
Route::resource('testimonial_page', 'HomeTestimonialController');