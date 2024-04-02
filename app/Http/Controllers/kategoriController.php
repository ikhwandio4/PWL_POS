<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\m_kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;


class kategoriController extends Controller
{
  //  public function index()
   // {
        // $data = [
        //     'Kategori_kode' => 'SNK',
        //     'Kategori_nama' => 'Snack/Makanan Ringan',
        //     'Created_at' => now()
        // ];
        // DB::table('m_kategori')->insert ($data);
        // return 'inser data baru berhasil';

        // $row =DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'update data berhasil .Jumlah data yang diupdate:'.$row. 'baris';
        
        // $row =DB::table ('m_kategori')->where('kategori_kode', 'SNK')-> delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: '. $row. 'baris';

    //     $data= DB::table('m_kategori')->get();
    //     return view('kategori',['data' =>$data]);
    // }

    // public function index(KategoriDataTable $dataTable)
    // {
    //     return $dataTable->render('kategori.index');
    // }
    // public function create()
    // {
    //     return view('kategori.create');
    // }
    // public function store(request $request) 
    // {
    //     // m_kategori::create([
    //     //     'kategori_kode' =>$request->kodeKategori,
    //     //     'kategori_nama' =>$request->namaKategori,

    //         $validated = $request->validate([
    //             'kategori_kode' => 'required',
    //             'kategori_nama' => 'required',
                
    //         ]);

        
    //     return redirect('/kategori');

    // }

    // public function edit($id)
    // {
    //     $user = m_kategori::find($id);
    //     return view('kategori/edit', ['data' => $user]);
    // }
    // public function edit_save($id, Request $request)
    // {
    //     $kategori = m_kategori::find($id);

    //     $kategori->kategori_kode = $request->kodeKategori;
    //     $kategori->kategori_nama = $request->namaKategori;

    //     $kategori->save();

    //     return redirect('/kategori');
    // }
    // public function hapus($id)
    // {
    //     $kategori = m_kategori::find($id);
    //     $kategori ->delete();

    //     return redirect('/kategori');
    // }
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori'],
        ];
        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem',
        ];

        $activemenu = 'kategori';

        $kategori = m_kategori::all();

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu, 'kategori' => $kategori]);
    }

    public function list(Request $request)
    {
        $kategori = m_kategori::select('kategori_id', 'kategori_kode', 'kategori_nama');
        if ($request->kategori_id) {
            $kategori->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Kategori Baru'
        ];

        $kategori = m_kategori::all(); //ambil data untuk ditampilkan di form
        $activemenu = 'kategori';
        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activemenu' => $activemenu]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori_kode' => 'bail|required|string|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100',
        ]);
        m_kategori::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);
        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
    }

    public function show(string $id)
    {
        $kategori = m_kategori::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Kategori'
        ];

        $activemenu = 'kategori';

        return view('kategori.show', ['kategori' => $kategori, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu]);
    }

    public function edit($id)
    {
        $kategori = m_kategori::find($id);
        // $kategori = LevelModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Kategori'
        ];

        $activemenu = 'kategori';

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu, 'kategori' => $kategori]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_kode' => 'bail|required|string|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        m_kategori::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = m_kategori::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            m_kategori::destroy($id);

            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    
    
}

