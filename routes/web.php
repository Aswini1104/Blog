<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\BlogController::class,'loginPage']);
Route::post('/login',[App\Http\Controllers\BlogController::class,'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkuser',[App\Http\Controllers\BlogController::class,'checkuser']);
    Route::get('/logout',[App\Http\Controllers\BlogController::class,'logout']);
    Route::post('/blogSubmit',[App\Http\Controllers\BlogController::class,'blogSubmit']);
    Route::get('/edit/{id}',[App\Http\Controllers\BlogController::class,'edit']);
    Route::get('/delect/{id}',[App\Http\Controllers\BlogController::class,'delect']);
    Route::POST('/edit/blogSubmitedit',[App\Http\Controllers\BlogController::class,'blogSubmitedit']);


});
