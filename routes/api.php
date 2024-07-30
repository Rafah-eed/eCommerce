<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::get('/category/all', [\App\Http\Controllers\Api\Category1Controller::class, 'show']);
Route::post('/category/store', [\App\Http\Controllers\Api\Category1Controller::class, 'store']);
Route::post('/category/delete', [\App\Http\Controllers\Api\Category1Controller::class, 'delete']);
Route::post('/category/edit', [\App\Http\Controllers\Api\Category1Controller::class, 'edit']);
Route::post('/category/update', [\App\Http\Controllers\Api\Category1Controller::class, 'update']);

