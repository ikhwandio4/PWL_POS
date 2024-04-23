<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Method untuk menampilkan halaman login
    public function index()
    {
        $user = Auth::user();

        // Jika pengguna sudah login, arahkan sesuai levelnya
        if ($user) {
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            } elseif ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
        }

        // Jika belum login, tampilkan halaman login
        return view('login');
    }

    // Method untuk memproses login
    public function proses_login(Request $request)
    {
        // Validasi input username dan password
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        // Coba untuk melakukan login dengan credentials yang diberikan
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect sesuai level user setelah login
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            } elseif ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect('/login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan username dan password yang dimasukkan sudah benar']);
    }

    // Method untuk menampilkan halaman registrasi
    public function register()
    {
        return view('register');
    }

    // Method untuk memproses registrasi pengguna baru
    public function proses_register(Request $request)
    {
        // Validasi input pada form registrasi
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_users',
            'password' => 'required'
        ]);

        // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi sukses, tambahkan level dan hash password sebelum menyimpan ke database
        $request['level_id'] = '2';
        $hashedPassword = bcrypt($request->password);
        $request['password'] = Hash::make($request->password);

        // Simpan data pengguna baru ke database
        m_user::create($request->all());

        // Redirect ke halaman login setelah registrasi sukses
        return redirect()->route('login');
    }

    // Method untuk logout pengguna
    public function logout(Request $request)
    {
        // Hapus session
        $request->session()->flush();
        // Logout pengguna
        Auth::logout();
        // Redirect ke halaman login
        return redirect('login');
    }
}
