<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::post('register',[AuthController::class,'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware(['jwt-auth'])->group(function(){
    Route::post('/product',[ProductController::class,'store']);
    Route::get('/product',[ProductController::class,'showAll']);
    Route::get('/product/{id}',[ProductController::class,'showById']);
    Route::get('/product/search/product_name={product_name}',[ProductController::class,'showByName']);
    Route::put('/product/{id}',[ProductController::class,'update']);
    Route::delete('/product/{id}',[ProductController::class,'delete']);
    
});

//Panggil ProductController sebagai object
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
