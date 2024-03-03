<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class user extends Controller
{
    public function index()
    {
        //tambah data user dengan eloquent model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'pelanggan' ,
        //     'password' => Hash::make('123445'),
        //     'level_id' => 4
            
        // ];
        // UserModel::insert($data); //tambahkan data ke tabel m_user

        $data =[
            'nama' => 'pelanggan pertama',
        ];
        UserModel::where('username','customer-1') ->update($data); //update data user

        //coba akses model user model
        $user =UserModel::all(); //ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);

    }
}
