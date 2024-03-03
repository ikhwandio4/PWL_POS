<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\levelcontroller;
use App\Http\Controllers\user;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/level',[levelcontroller::class, 'index']);
//praktikum 5
Route::get('/kategori',[kategoriController::class,'index']);
//praktikum 6
Route::get('/user',[user::class, 'index']);
