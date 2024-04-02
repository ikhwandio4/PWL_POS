<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\levelcontroller;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\user;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\welcomeController;

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


// Route::get('/level',[levelcontroller::class, 'index']);
// //praktikum 5
// Route::get('/kategori',[kategoriController::class,'index']);
// //praktikum 6
// Route::get('/user', [User::class, 'index'])->name('/user');
// Route::get('/user/tambah', [User::class, 'tambah'])->name('/user/tambah');
// Route::get('/user/ubah/{id}', [User::class, 'ubah'])->name('/user/ubah');
// Route::get('/user/hapus/{id}', [User::class, 'hapus'])->name('/user/hapus');
// Route::post('/user/tambah_simpan',[User::class,'tambah_simpan'])->name('/user/tambah_simpan');
// Route::put('/user/ubah_simpan/{id}',[User::class,'ubah_simpan'])->name('/user/ubah_simpan');

// Route::get('/user/create', function(){
//     return view('user.create');
// });
// Route::get('/level/create', function(){
//     return view('level.create');
// });

// //Route::get('/user/update', [UserController::class, 'update'])->name('/user/update');
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
// Route::post('/level', [LevelController::class, 'create_save']);

// //soal 1
// route::get('/kategori',[kategoriController::class, 'index']);
// Route::get('/kategori/create',[KategoriController::class,'create']);
// Route::post('/kategori',[KategoriController::class,'store']);

// //soal 2
// Route::get('/kategori/create',[KategoriController::class,'create'])->name('/kategori/create');
// Route::post('/kategori',[KategoriController::class,'store'])->name('/kategori');

// //soal 3
// Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
// Route::put('/kategori/edit_save/{id}', [KategoriController::class, 'edit_save'])->name('kategori.update');

// //soal 4
// Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('/kategori/hapus');


// //
// Route::get('/level/update', [LevelController::class, 'update'])->name('/level/update');
// Route::get('/user/create', [User::class, 'create'])->name('/user/create');
// Route::get('/user/update', [User::class, 'update'])->name('/user/update');
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
// Route::post('/level', [LevelController::class, 'create_save']);
// Route::resource('/m_user',POSController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

//jobsheet 7
Route::get('/',[welcomeController::class,'index']);

Route::group (['prefix' =>'user'],function(){
    Route::get('/',[user::class,'index']);
    Route::post('/list',[user::class,'list']);
    Route::get('/create',[user::class,'create']);
    Route::post('/',[user::class,'store']);
    Route::get('/{id}',[user::class,'show']);
    Route::get('/{id}/edit',[user::class,'edit']);
    Route::put('/{id}',[user::class,'update']);
    Route::delete('/{id}',[user::class,'destroy']);


});

Route::group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});
Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::get('/get-harga/{id}', [PenjualanController::class, 'getHarga']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put('/{id}', [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});