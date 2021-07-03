<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bidder\BidderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

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

//Authentication routes

// Route::get('/login', function () { return view('login'); });
// Route::post('/login', 'AuthController@login')->name('login.submit');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->middleware('update_auction_time')->name('login.submit');
// Route::get('/sign-in/{user}', 'AuthController@signIn')->name('sign-in');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('update_auction_time')->name('logout');

//Edit Profile Routes
Route::post('/edit-profile', [App\Http\Controllers\UserController::class, 'update'])->middleware('update_auction_time')->name('update.profile');
Route::post('/edit-password', [App\Http\Controllers\UserController::class, 'update_password'])->middleware('update_auction_time')->name('update.password');


//====================
//Navbar Routes
//====================
Route::view('home', [App\Http\Controllers\Controller::class, 'index'])->middleware('update_auction_time')->name('home-page');
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->middleware('update_auction_time')->name('home-page');

Route::get('/err', function() {
    return view('errors/403');
})->middleware('update_auction_time');

Route::get('/faq', function(){
    return view('faq');
})->middleware('update_auction_time');

Route::get('/hiw', function(){
    return view('hiw');
})->middleware('update_auction_time');

Route::get('/partner', function(){
    return view('partner');
})->middleware('update_auction_time');

Route::get('/contact', function() {
    return view('contact');
})->middleware('update_auction_time');

Route::get('/terms', function() {
    return view('terms');
})->middleware('update_auction_time');



//====================
//Dashboard Routes
//====================
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->middleware('auth', 'update_auction_time');

Route::get('/dashboard-profile', function() {

    $user = User::select('password')->get();

    return view('dashboard/dashboard-profile',['user' => $user]);
})->middleware('auth', 'update_auction_time');

Route::get('/dashboard-my-bid', [App\Http\Controllers\UserController::class, 'my_bids'])->middleware('auth', 'update_auction_time');

Route::get('/dashboard-winning-bids', function() {
    return view('dashboard/dashboard-winnings');
})->middleware('auth', 'update_auction_time');

Route::get('/dashboard-alerts', function() {
    return view('dashboard/dashboard-alerts');
})->middleware('auth', 'update_auction_time');

Route::get('/dashboard-favorites', function() {
    return view('dashboard/dashboard-favorites');
})->middleware('auth', 'update_auction_time');

Route::get('/dashboard-referrals', function() {
    return view('dashboard/dashboard-referrals');
})->middleware('auth', 'update_auction_time');

//====================
//Category Routes
//====================

//Popular
Route::get('/popular', [App\Http\Controllers\CategoryController::class, 'popular'])->middleware('update_auction_time')->name('popular');

//All
Route::get('/all', function() {
    return view('all');
})->middleware('update_auction_time');

//Bikes
Route::get('/bikes-featured', [App\Http\Controllers\CategoryController::class, 'featured_bikes'])->middleware('update_auction_time')->name('featured_bikes');
Route::get('/bikes-completed', [App\Http\Controllers\CategoryController::class, 'completed_bikes'])->middleware('update_auction_time')->name('completed_bikes');
Route::get('/bikes-all', [App\Http\Controllers\CategoryController::class, 'all_bikes'])->middleware('update_auction_time')->name('all_bikes');

//Phones
Route::get('/phones-featured', [App\Http\Controllers\CategoryController::class, 'featured_phones'])->middleware('update_auction_time')->name('featured_phones');
Route::get('/phones-completed', [App\Http\Controllers\CategoryController::class, 'completed_phones'])->middleware('update_auction_time')->name('completed_phones');
Route::get('/phones-all', [App\Http\Controllers\CategoryController::class, 'all_phones'])->middleware('update_auction_time')->name('all_phones');

//Vouchers
Route::get('/vouchers-featured', [App\Http\Controllers\CategoryController::class, 'featured_vouchers'])->middleware('update_auction_time')->name('featured_vouchers');
Route::get('/vouchers-completed', [App\Http\Controllers\CategoryController::class, 'completed_vouchers'])->middleware('update_auction_time')->name('completed_vouchers');
Route::get('/vouchers-all', [App\Http\Controllers\CategoryController::class, 'all_vouchers'])->middleware('update_auction_time')->name('all_vouchers');

//Home & Item Details
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('update_auction_time')->name('home');
Route::post('/item-details', [App\Http\Controllers\ItemController::class, 'details'])->middleware('update_auction_time')->name('item-details');

//Place a bid
Route::post('/place/bid', [App\Http\Controllers\Mpesa\MpesaController::class, 'place_bid'])->name('place-bid')->middleware('update_auction_time');

//====================
//Customer Care Routes
//====================
Route::get('/customercare-index', [App\Http\Controllers\CustomerCareController::class, 'index'])->middleware('update_auction_time')->name('customercare-index');
Route::get('/customercare-items', [App\Http\Controllers\CustomerCareController::class, 'items'])->middleware('update_auction_time')->name('customercare-items');
Route::get('/customercare-all-items', [App\Http\Controllers\CustomerCareController::class, 'all_items'])->middleware('update_auction_time')->name('customercare-all-items');
Route::get('/active-auctions', [App\Http\Controllers\CustomerCareController::class, 'active_auctions'])->middleware('update_auction_time')->name('active-auctions');
Route::get('/past-auctions', [App\Http\Controllers\CustomerCareController::class, 'past_auctions'])->middleware('update_auction_time')->name('past-auctions');
Route::get('/bike-bids', [App\Http\Controllers\CustomerCareController::class, 'bike_bids'])->middleware('update_auction_time')->name('bike-bids');
Route::get('/phone-bids', [App\Http\Controllers\CustomerCareController::class, 'phone_bids'])->middleware('update_auction_time')->name('phone-bids');
Route::get('/voucher-bids', [App\Http\Controllers\CustomerCareController::class, 'voucher_bids'])->middleware('update_auction_time')->name('voucher-bids');
Route::get('/active-users', [App\Http\Controllers\CustomerCareController::class, 'users_active'])->middleware('update_auction_time')->name('active-users');
Route::get('/flagged-users', [App\Http\Controllers\CustomerCareController::class, 'users_flagged'])->middleware('update_auction_time')->name('flagged-users');

//Admin Routes
Route::get('/create-bid', [App\Http\Controllers\ItemController::class, 'index'])->middleware('update_auction_time')->name('create-bid-page');
Route::post('/create-bike', [App\Http\Controllers\ItemController::class, 'create_bike'])->middleware('auth','update_auction_time')->name('create-bike');
Route::post('/create-phone', [App\Http\Controllers\ItemController::class, 'create_phone'])->middleware('auth','update_auction_time')->name('create-phone');
Route::post('/create-voucher', [App\Http\Controllers\ItemController::class, 'create_voucher'])->middleware('auth','update_auction_time')->name('create-voucher');
Route::post('/edit-item', [App\Http\Controllers\ItemController::class, 'edit'])->middleware('update_auction_time')->name('edit-item');
Route::post('/auction-item', [App\Http\Controllers\ItemController::class, 'auction'])->middleware('update_auction_time')->name('auction-item');
Route::post('/close-auction', [App\Http\Controllers\ItemController::class, 'close'])->middleware('update_auction_time')->name('close-item');

//Notifications
Route::get('/email-notification', [App\Http\Controllers\ItemController::class, 'sendNotification']);

//====================
//Role Registration Routes
//====================
Route::post('/create-admin', [App\Http\Controllers\UserController::class, 'create_admin'])->middleware('update_auction_time')->name('create.admin');
Route::post('/create-customer-care', [App\Http\Controllers\UserController::class, 'create_customer_care'])->middleware('update_auction_time')->name('create.customer.care');

Route::get('/create-admin', function() {
    return view('customer-care/create-admin');
})->middleware('update_auction_time');

Route::get('/create-customer-care', function() {
    return view('customer-care/create');
})->middleware('update_auction_time');



Route::get('/email',[App\Http\Controllers\MailController::class ,'send_mail'])->name('mail');

Route::get('/wallet', function() {
    return view('dashboard.wallet');
});
