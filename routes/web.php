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
Route::get('/user', [User::class, 'index'])->name('/user');
Route::get('/user/tambah', [User::class, 'tambah'])->name('/user/tambah');
Route::get('/user/ubah/{id}', [User::class, 'ubah'])->name('/user/ubah');
Route::get('/user/hapus/{id}', [User::class, 'hapus'])->name('/user/hapus');
Route::post('/user/tambah_simpan',[User::class,'tambah_simpan'])->name('/user/tambah_simpan');
Route::put('/user/ubah_simpan/{id}',[User::class,'ubah_simpan'])->name('/user/ubah_simpan');

route::get('/kategori',[kategoriController::class, 'index']);
