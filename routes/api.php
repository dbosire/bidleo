<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Pass Key Routes
Route::post('make_pass_key', 'App\Http\Controllers\PassKeyController@generate_pass_key')->name('generate.passkey');

//Mpesa Routes
Route::post('bidleo/access/token', 'App\Http\Controllers\Mpesa\MpesaController@generateAccessToken');
Route::post('token', 'App\Http\Controllers\Mpesa\MpesaController@GenerateToken');
Route::post('bidleo/stk/push', 'App\Http\Controllers\Mpesa\MpesaController@customerMpesaSTKPush');
Route::any('mpesa_response', 'App\Http\Controllers\Mpesa\MpesaController@mpesaCallback');
Route::post('validation', 'App\Http\Controllers\Mpesa\MpesaController@validationMpesa');
Route::post('confirmation', 'App\Http\Controllers\Mpesa\MpesaController@confirmationMpesa');
Route::post('register_url', 'App\Http\Controllers\Mpesa\MpesaController@registerMpesaUrls');
Route::post('web_register', 'App\Http\Controllers\Mpesa\MpesaController@customerMpesaSTKPush');
Route::post('sendbulk',     'App\Http\Controllers\Sms\SmsController@sendBulkSMS');

