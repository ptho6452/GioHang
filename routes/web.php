<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[CartController::class,'index']);
Route::get('/Add-Cart/{id}',[CartController::class,'AddCart']);
Route::get('/Delete-Item-Cart/{id}',[CartController::class,'DeleteItemCart']);
Route::get('/List-Carts',[CartController::class,'ViewListCart']);
Route::post('/List-Carts',[CartController::class,'ViewListCart']);

//cổng thanh toán
Route::post('/vnpay_payment',[PaymentController::class,'vnpay_payment']);
Route::post('/momo_payment', [PaymentController::class, 'momo_payment']);


