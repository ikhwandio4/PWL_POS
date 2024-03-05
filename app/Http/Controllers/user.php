<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\m_user;
use Illuminate\Support\Facades\Hash;

class user extends Controller
{
    public function index()

    {
        // $data = [
        //         'level_id' => 4,
        //         'username' => 'manager_dua',
        //         'nama' => 'manager 2' ,
        //         'password' => Hash::make('123445'),
                
        //     ];
        //     m_user::create($data);

        //tambah data user dengan eloquent model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'pelanggan' ,
        //     'password' => Hash::make('123445'),
        //     'level_id' => 4
            
        // ];
        // m_user::insert($data); //tambahkan data ke tabel m_user

        // $data =[
        //     'nama' => 'pelanggan pertama',
        // ];
        // m_user::where('username','customer-1') ->update($data); //update data user


        // $data = [
        //         'level_id' => 2,
        //         'username' => 'manager_empat',
        //         'nama' => 'Manager 4',
        //         'password' => Hash::make('12345'),
        //     ];
        //     m_user::create($data);
    
            // $user = m_user::all();
            // return view('user',['data'=>$user]);

        //coba akses model user model
        // $user =m_user::all(); //ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // $user = m_user::find(1);
        // return view('user',['data'=>$user]);

        // $user = m_user::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        // $user =m_user::findOr(20,['username','nama'], function(){
        //     abort(404);
        // });
        // return view('user', ['data'=>$user]);

        // $user = m_user::findOrFail(1);
        // return view('user',['data'=>$user]);

        // $user =m_user::where('username','manager')->firstOrFail();
        // return view('user', ['data'=>$user]);

        $user =m_user::where('level_id',2)->count();
        //dd($user);
        return view('user', ['data'=>$user]);


    }
}
