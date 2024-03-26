<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class levelcontroller extends Controller
{
    public function index()
    {
        // DB::insert ('insert into m_levels(level_kode, level_nama,created_at) values (?,?,?)',['cus','pelanggan',now()]);
        // return 'insert data baru berhasil ';

        // $row = DB::update('update m_levels set level_nama = ? where level_kode = ? ', ['Customer','CUS']);
        // return 'update berhasil . jumlah data yang diupdate: ' .$row.'baris';

        // $row = DB::delete ('delete from m_levels where level_kode = ?',['CUS']);
        // return 'Delete berhasil .Jumlah data yang dihapus: '. $row.'baris';

        $data = DB::select('select * from m_levels');
        return view('level',['data' => $data]);

        
    }
    public function create()
    {
        return view('level.create');
    }
    public function update()
    {
        return view('level.edit');
    }
}
