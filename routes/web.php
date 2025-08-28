<?php

use App\Http\Controllers\PriceCheckerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ShopController;

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
Route::resource('/price',PriceCheckerController::class);

Auth::routes();
Route::get('/',function(){
    return view('welcome');
})->middleware('auth');
Route::group(['middleware'=>'auth','prefix'=>'admin','as'=>'admin.'],function(){
    
    Route::get('/',function(){
        return view('welcome');
    });
    Route::resource('/company',CompanyController::class);
    Route::resource('/shop',ShopController::class);
});