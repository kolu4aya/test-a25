<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('api/create', 'App\Http\Controllers\UserController@store');
Route::post('api/accept-transaction', 'App\Http\Controllers\UserController@accept_transaction');
Route::get('api/get-amount', 'App\Http\Controllers\UserController@get_amount');
Route::post('api/payment', 'App\Http\Controllers\UserController@payment');