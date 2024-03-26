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

        // $user =m_user::where('level_id',2)->count();
        // //dd($user);
        // return view('user', ['data'=>$user]);

        // $user =m_user::firstOrCreate(
        //     [
        //         // 'username' => 'manager',
        //         // 'nama' => 'Manager',
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua ',
        //         'password'=>Hash::make('12345'),
        //         'level_id' =>2
        //     ],
        // );

        // $user =m_user::firstOrNew(
        //     [
        //         // 'username' => 'manager',
        //         // 'nama' => 'Manager',
                
        //         'username' => 'manager 33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password'=>Hash::make('12345'),
        //         'level_id'=>2

        //     ],

        //     );
        //     $user->save();


       

        //   $user = m_user::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager55',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );
        // $user->username = 'manager56';

        // $user->isDirty();//true
        // $user->isDirty('username');//true
        // $user->isDirty('nama');//false
        // $user->isDirty(['nama','username']);//true

        // $user->isClean();//flase
        // $user->isClean('username');//flase
        // $user->isClean('nama');//true
        // $user->isClean(['nama','username']);//flase

        // $user->save();

        // $user->isDirty();//false
        // $user->isClean();//true
        // dd($user->isDirty());

        // $user = m_user::create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );

        // $user->username = 'manager12';

        // $user->save();
        // return view('user', ['data' => $user]);
       

        // $user->wasChanged();//true
        // $user->wasChanged('username');//true
        // $user->wasChanged(['username','level_id']);//true
        // $user->wasChanged('nama');//flase
        // dd($user->wasChanged(['nama','username']));//true


        //praktikum crud
         $user = m_user::all();
        return view('user', ['data' => $user]);

        $user = m_user::with('level')->get();
        return view('user', ['data' => $user]);
        

    
        

    }
    public function tambah()
    {
        return view('user_tambah');
    }
    public function tambah_simpan(Request $request)
    {
        m_user::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = m_user::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = m_user::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = m_user::find($id);
        $user->delete();

        return redirect('/user');
    }

    //praktikum 2.6

    public function create()
    {
        return view('user.create');
    }
    public function update()
    {
        return view('user.edit');
    }

}
