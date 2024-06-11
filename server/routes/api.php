<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // Bu kısma yetkilendirme gerektiren rotaları tanımlayabilirsiniz.
});


//Product CRUD işlemleri ID'ye göre
Route::get('products',           [ProductController::class,'index']);
Route::post('products',          [ProductController::class,'store']);
Route::put('products/{id}',      [ProductController::class,'update']);
Route::delete('products/{id}',   [ProductController::class,'destroy']);
//Product favori ürünleri getirme
Route::get('products/favourites',[ProductController::class,'getFavourites']);
//Product ürün görsellerini kaydetme
Route::post('upload',            [ProductController::class,'upload'])->name('upload');



//User CRUD ve Show işlemleri
Route::post('users',        [UserController::class,'store']);
Route::get('users/{id}',    [UserController::class,'show']);
Route::put('users/{id}',    [UserController::class,'update']);  
Route::delete('users/{id}', [UserController::class,'destroy']);
//User Login/Logout işlemi
Route::post('login',        [UserController::class, 'login']);
Route::post('logout',       [UserController::class, 'logout']);



//Address CRUD işlemleri
Route::post('addresses/{user_id}',                   [AddressController::class,'addAddressToUser']);
Route::get('users/{userId}/addresses',               [AddressController::class,'getUserAddresses']);
Route::put('users/{userId}/addresses/{addressId}',   [AddressController::class,'updateAddressForUser']);
Route::delete('users/{user_id}/addresses/{address_id}',[AddressController::class,'removeAddressFromUser']);