<?php

use Illuminate\Http\Request;

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

//customer
Route::post('/create-customer', 'ApiController@createCustomer');
Route::post('/login', 'ApiController@customerLogin');
Route::post('/update-customer', 'ApiController@updateCustomer');
Route::get('/edit-customer/{id}', 'ApiController@editCustomer');
Route::post('/change-password', 'ApiController@changePassword');
Route::post('/forget-password', 'ApiController@forgetPassword');
Route::post('/reset-password', 'ApiController@resetPassword');
Route::post('/verify-customer', 'ApiController@verifyCustomer');
Route::post('/otp-resend', 'ApiController@getApiOtpResend');


//auction
Route::get('/auctions', 'ApiController@auctions');
Route::get('/view-auctions/{id}', 'ApiController@viewAuctions');
Route::get('/live-auctions/{id}', 'ApiController@liveAuctions');

