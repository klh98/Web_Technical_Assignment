<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemConditionController;
use App\Http\Controllers\ItemTypeController;
use App\Models\ItemType;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/', [ItemController::class, 'index']);

    //Item
    Route::get('/admin/item', [ItemController::class, 'index']);
    Route::get('/admin/item/create', [ItemController::class, 'create']);
    Route::post('/admin/item', [ItemController::class, 'store']);
    Route::get('/admin/item/{id}/edit', [ItemController::class, 'edit']);
    Route::post('/admin/item_update/{id}', [ItemController::class, 'update']);
    Route::get('/admin/delete_item/{id}', [ItemController::class, 'destroy']);

    //Category
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::get('/admin/category/create', [CategoryController::class, 'create']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/admin/update_category/{id}', [CategoryController::class, 'update']);
    Route::get('/admin/delete_category/{id}', [CategoryController::class, 'destroy']);

    //ItemCondition
    Route::resource('/item_condition', ItemConditionController::class);
    Route::get('/delete_item_condition/{id}', [ItemConditionController::class, 'destroy']);

    //Item Type
    Route::resource('/item_type', ItemTypeController::class);
    Route::get('/delete_item_type/{id}', [ItemTypeController::class, 'destroy']);


});





