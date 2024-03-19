<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\m_kategori;
use Illuminate\Support\Facades\DB;


class kategoriController extends Controller
{
  //  public function index()
   // {
        // $data = [
        //     'Kategori_kode' => 'SNK',
        //     'Kategori_nama' => 'Snack/Makanan Ringan',
        //     'Created_at' => now()
        // ];
        // DB::table('m_kategoris')->insert ($data);
        // return 'inser data baru berhasil';

        // $row =DB::table('m_kategoris')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'update data berhasil .Jumlah data yang diupdate:'.$row. 'baris';
        
        // $row =DB::table ('m_kategoris')->where('kategori_kode', 'SNK')-> delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: '. $row. 'baris';

    //     $data= DB::table('m_kategoris')->get();
    //     return view('kategori',['data' =>$data]);
    // }

    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(request $request) 
    {
        m_kategori::create([
            'kategori_kode' =>$request->kodeKategori,
            'kategori_nama' =>$request->namaKategori,
        ]);
        return redirect('/kategori');

    }
    
}

