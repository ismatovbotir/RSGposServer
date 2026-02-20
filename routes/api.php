<?php

use App\Http\Controllers\Api\BarcodeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\PriceDataController;
use App\Http\Controllers\Api\SellController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\WoltController;
use App\Http\Controllers\Api\FiscalController;
use App\Http\Controllers\API\ReceiptController;
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
Route::resource('/stock',StockController::class);
Route::resource('/sell',SellController::class);
Route::resource('/receipt',ReceiptController::class);

Route::group(['prefix' => 'mobApp','middleware'=>'api.logger'],function(){
    Route::post('/categories',[CategoryController::class,'categories']);
    Route::post('/items',[ItemController::class,'items']);
    Route::post('/prices',[PriceController::class,'prices']);
    Route::post('/stocks',[PriceController::class,'stocks']);
    Route::post('/pricestock',[ItemController::class,'pricestock']);
    Route::resource('/fiscal',FiscalController::class);
    Route::resource('/order',OrderController::class);
});

Route::group(['prefix' => 'cashDesk'],function(){
    Route::resource('/order',OrderController::class);
    //Route::resource('/receipt',ReceiptController::class);


});


Route::group(['prefix' => 'wolt'],function(){
    Route::post('/authorization',[WoltController::class,'authorization']);
    Route::post('/webhook/orders',[WoltController::class,'woltWebhookOrders']);

});


Route::fallback(function (Request $request) {
    // Проверяем, ожидает ли клиент JSON (например, API-запрос)
    if ($request->expectsJson()) {
        return response()->json([
            'error' => 'Страница не найдена',
            'code' => 404,
        ], 404);
    }

    // Для обычных web-запросов — возвращаем шаблон 404
    return response()->view('errors.404', [], 404);
});

//Route::post('/items',[ItemController::class,'itemsarr']);



