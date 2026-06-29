<?php

use App\Http\Controllers\Api\BuyerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SellerController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('buyers',BuyerController::class ,['only'=> ['index' , 'show']]);

Route::resource('sellers',SellerController::class ,['only'=> ['index' , 'show']]);

Route::resource('categories',CategoryController::class , ['except' => ['create','edit']]);

Route::resource('products',ProductController::class ,['only'=> ['index' , 'show']]);

Route::resource('transactions',TransactionController::class ,['only'=> ['index' , 'show']]);

Route::resource('users', UserController::class ,['except' => ['create','edit']]);