<?php

namespace App\Http\Controllers;

use App\Models\m_level;
use Illuminate\Http\Request;
use App\Models\m_user;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class user extends Controller
{
    public function index()

    {

        //jobsheet 7
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User'],
        ];
        
        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];
        
        $activemenu = 'user'; //set menu yang sedang aktif
        $level = m_level::all();
        
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu]);

    }
        
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
    //      $user = m_user::all();
    //     return view('user', ['data' => $user]);

    //     $user = m_user::with('level')->get();
    //     return view('user', ['data' => $user]);
        

    
        

    // }
    public function tambah()
    {
        return view('user_tambah');
    }
    // public function tambah_simpan(Request $request)
    // {
    //     m_user::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id,
    //     ]);
    //     return redirect('/user');
    // }
    public function tambah_simpan(Request $request)
    {
        $validated = $request->validate([
            'username' => 'bail|required',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',
        ]);
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

    // public function create()
    // {
    //     return view('user.create');
    // }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah User Baru'
        ];

        $level = m_level::all(); //ambil data untuk ditampilkan di form
        $activemenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activemenu' => $activemenu]);

    }
       
    // public function update()
    // {
    //     return view('user.edit');
    // }

//jobsheet 7

//ambil data user dalam bentuk json untuk datatables
// public function list(Request $request)
// {
//   $users = m_user::select('user_id', 'username', 'nama', 'level_id')
//     ->with('level');

//   return DataTables::of($users)
//     ->addIndexColumn()
//     ->addColumn('aksi', function ($user) {  //menambahkan kolom index/no urut (default nama kolom: dt_rowindex)
//       $btn = '<a href="' . route('user.show', $user->user_id) . '" class="btn btn-sm btn-info">Detail</a> ';
//       $btn .= '<a href="' . route('user.edit', $user->user_id) . '" class="btn btn-sm btn-warning">Edit</a> ';
//       $btn .= '<form action="' . route('user.destroy', $user->user_id) . '" method="post" class="d-inline">';
//       $btn .= csrf_field();
//       $btn .= method_field('DELETE');
//       $btn .= '<button type="submit" class="btn btn-sm btn-danger">Hapus</button>';
//       $btn .= '</form>';
//       return $btn;
//     })
//     ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
//     ->make(true);
// }
public function list(Request $request)
    {
        $users = m_user::select('user_id', 'username', 'nama', 'level_id')->with('level');

        return DataTables::of($users)
        ->addIndexColumn()
        ->addColumn('aksi', function ($user) {
            $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a>';
            $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

// public function show (String $id)
// {
//     $user =m_user::with('level')->find($id);

//     $breadcrumb = (object) [
//         'title' => 'Detail User',
//         'List'  => ['Home','user','Detail']
//     ];

//     $page =(object) [
//         'title' => 'Detail user'
//     ];

//     $activemenu ='user';

//     return view('user.show',['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMneu' => $activemenu]);
// }
public function show(string $id)
{
    $user = m_user::with('level')->find($id);

    // Ensure $user is found before proceeding
    if (!$user) {
        return redirect()->route('users.index')->with('error', 'User not found!');
    }

    $breadcrumb = [
        'title' => 'Detail User',
        'list' => ['Home', 'user', 'Detail']
    ];

    $page = [
        'title' => 'Detail User'
    ];

    $activeMenu = 'user';  // Corrected casing for consistency

    return view('user.show', compact('breadcrumb', 'page', 'user', 'activeMenu'));
}



//menampilkan halaman form edit user
public function  edit(String $id)
{
    $user = m_user::find($id);
    $level = m_level::all();

    $breadcrumb =(object) [
        'title' => 'Edit User',
        'list' => ['Home','user','edit']
    ];

    $page =(object) [
        'title' => 'Edit User'
    ];

    $activemenu = 'user';

     return view('user.edit',['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activemenu' => $activemenu]);



}
public function update(Request $request, string $id)
{
    $request->validate([
        'username' => 'required|string|min:3|unique:m_users,username,'.$id.',user_id',
        'nama' => 'required|string|max:100',
        'password' => 'required|min:5',
        'level_id' => 'required|integer',
    ]);

    m_user::find($id)->update([
        'username' => $request->username,
        'nama'  => $request ->nama,
        'password ' => $request->password ? bcrypt($request->password) : m_user::find($id)->password,
        'level_id' => $request->level_id
    ]);

    return redirect('/user')->with('success','Data user berhasil diubah');

}
//menghapus data user
public function destroy(string $id)
{
    $check =m_user::find($id);
    if (!$check) {
        return redirect('/user')->with('error','Data user tidak ditemukan');
    }
    try {
        m_user::destroy($id);
        return redirect('/user')->with('Succes','Data berhasil dihapus');
        
    }catch (\Illuminate\Database\QueryException $e){
        
        //jika terjadi eror ketika mengahpus data, redirect kembali ke halaman dengan membawa pesan eror

        return redirect('/user')->with('eror','Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
}
}
