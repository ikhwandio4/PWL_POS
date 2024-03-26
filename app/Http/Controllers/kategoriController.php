<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\m_kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


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
        // m_kategori::create([
        //     'kategori_kode' =>$request->kodeKategori,
        //     'kategori_nama' =>$request->namaKategori,

            $validated = $request->validate([
                'kategori_kode' => 'required',
                'kategori_nama' => 'required',
                
            ]);

        
        return redirect('/kategori');

    }

    public function edit($id)
    {
        $user = m_kategori::find($id);
        return view('kategori/edit', ['data' => $user]);
    }
    public function edit_save($id, Request $request)
    {
        $kategori = m_kategori::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }
    public function hapus($id)
    {
        $kategori = m_kategori::find($id);
        $kategori ->delete();

        return redirect('/kategori');
    }
    
    
}

