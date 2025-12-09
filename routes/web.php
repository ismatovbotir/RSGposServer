<?php

use App\Http\Controllers\PriceCheckerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/',function(){
    return view('welcome');
})->middleware('auth');
Auth::routes();
Route::group([
    'middleware'=>'auth',
    'prefix'=>'admin',
    'as'=>'admin.'
    ],function(){
    
    Route::get('/',function(){
        return view('welcome');
    })->name('index');
    Route::resource('/company',CompanyController::class);
    Route::resource('/shop',ShopController::class);
    Route::resource('/partner',PartnerController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/item',ItemController::class);
    Route::get('/setting/wolt',[SettingController::class,'wolt'])->name('setting.wolt');
});