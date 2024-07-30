<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Middleware;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Route::get('/', function () {
//     return view('index');
//     //return view('welcome');
// });

Route::get('/Admin/1', function () {
    return view('Admin.1');
});

Route::get('/admin/2', function () {
    return view('Admin.2');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'add']);//->middleware('debug');
    Route::get('/category/all', [\App\Http\Controllers\Admin\CategoryController::class, 'show']);
    Route::post('/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::post('/category/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    Route::post('/category/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/category/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);
});

Route::middleware(['auth:employee'])->group(function () {
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'add']);
    Route::get('/product/all', [\App\Http\Controllers\Admin\ProductController::class, 'show']);
    Route::post('/product/store', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::post('/product/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete']);
    Route::post('/product/edit', [\App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('/product/update', [\App\Http\Controllers\Admin\ProductController::class, 'update']);
});

Route::get('/customer', [\App\Http\Controllers\Admin\CustomerController::class, 'add']);
Route::get('/customer/all', [\App\Http\Controllers\Admin\CustomerController::class, 'show']);
Route::post('/customer/store', [\App\Http\Controllers\Admin\CustomerController::class, 'store']);
Route::post('/customer/delete', [\App\Http\Controllers\Admin\CustomerController::class, 'delete']);
Route::post('/customer/edit', [\App\Http\Controllers\Admin\CustomerController::class, 'edit']);
Route::post('/customer/update', [\App\Http\Controllers\Admin\CustomerController::class, 'update']);



Route::get('/login', function () {
   //dd(Hash::make(12345678));
    return view('Admin.login');
})->name('login');

Route::post('/check', [\App\Http\Controllers\Admin\AuthController::class, 'check']);



//-------------------------------------customer view routes
Route::get('/home', function () {
    //dd(Hash::make(12345678));
     return view('index1');
 })->name('home');

 Route::get('/index', function () {
    //dd(Hash::make(12345678));
     return view('index1');
 })->name('index');
