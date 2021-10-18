<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

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
// ==================================BACK END========================================

// LOGIN
Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);

        #Menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::delete('destroy/{id}',[MenuController::class,'destroy'])->name('menus.list');
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
        });

        #Product
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class,'create']);
        });

        #Upload
        Route::post('upload/repository',[\App\Repositories\UploadRepository::class,'store']);
    });

});









// ====================================FRONT END=========================================


Route::get('/', function () {
    return view('welcome');
});
