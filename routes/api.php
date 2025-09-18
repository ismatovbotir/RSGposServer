<?php

use App\Http\Controllers\Api\BarcodeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\PriceDataController;
use App\Http\Controllers\Api\ShopController;

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

Route::post('/price-check',[PriceController::class,'priceCheck']);

Route::resource('/price',PriceController::class);
Route::resource('/shop',ShopController::class);
Route::resource('/partner',PartnerController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/item',ItemController::class);
Route::resource('/barcode',BarcodeController::class);
Route::resource('/priceData',PriceDataController::class);

Route::post('/items',[ItemController::class,'items']);



