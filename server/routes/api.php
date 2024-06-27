<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductIngredientController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMessageController;
use App\Models\UserMessage;
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
Route::get('products',           [ProductController::class,'indexByLanguage']);
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
Route::delete('users/{user_id}/addresses/{address_id}', [AddressController::class,'removeAddressFromUser']);



//Campaign CRUD işlemleri
Route::get('campaigns',                     [CampaignController::class,'index']);
Route::post('campaigns',                    [CampaignController::class,'store']);
Route::get('campaigns/{campaign_id}',       [CampaignController::class,'show']);
Route::put('campaigns/{campaign_id}',       [CampaignController::class,'update']);
Route::delete('campaigns/{campaign_id}',    [CampaignController::class,'destroy']);



//Category Show İşlemi
Route::get('categories/{type_id}',[CategoryController::class,'show']);


//UserMessage Store İşlemi
Route::post('message',            [UserMessageController::class, 'store']);


//Ingredients Language Id'ye göre index işlemi
Route::get('ingredients',         [IngredientController::class,'index']);


//Product Id'ye göre Ingredients index işlemi
Route::get('ingredientsProduct',  [ProductIngredientController::class,'index']);


//Kullanıcı SCartNumber Shopping Cart a göre ekleme işlemi
Route::post('shopping_cart', [ShoppingCartController::class, 'store']);