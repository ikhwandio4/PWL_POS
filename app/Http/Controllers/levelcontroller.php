<?php

namespace App\Http\Controllers;

use App\Models\m_level;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class levelcontroller extends Controller
{
    // public function index()
    // {
    //     // DB::insert ('insert into m_levels(level_kode, level_nama,created_at) values (?,?,?)',['cus','pelanggan',now()]);
    //     // return 'insert data baru berhasil ';

    //     // $row = DB::update('update m_levels set level_nama = ? where level_kode = ? ', ['Customer','CUS']);
    //     // return 'update berhasil . jumlah data yang diupdate: ' .$row.'baris';

    //     // $row = DB::delete ('delete from m_levels where level_kode = ?',['CUS']);
    //     // return 'Delete berhasil .Jumlah data yang dihapus: '. $row.'baris';

    //     $data = DB::select('select * from m_levels');
    //     return view('level',['data' => $data]);

        
    // }
    // public function create()
    // {
    //     return view('level.create');
    // }
    // public function create_save(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'level_kode' => 'bail|required',
    //         'level_nama' => 'required',
    //     ]);

    //     m_level::create([
    //         'level_kode' => $request->level_kode,
    //         'level_nama' => $request->level_nama,
    //     ]);
    //     return redirect('/level');
    // }
    // public function update()
    // {
    //     return view('level.edit');
    // }
    public function index()
{
    $breadcrumb = (object) [
        'title' => 'Daftar Level',
        'list' => ['Home', 'Level'],
    ];
    $page = (object) [
        'title' => 'Daftar Level yang terdaftar dalam sistem',
    ];
    $activemenu = 'level';

    $levels = m_level::all();  // Retrieve all levels using the model

    return view('level.index', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activemenu' => $activemenu,
        'levels' => $levels,  // Pass the levels data to the view
    ]);
}
public function list(Request $request)
{
    $levels = m_level::select('level_id', 'level_kode', 'level_nama');

    if ($request->level_id) {
        $levels->where('level_id', $request->level_id);
    }

    return DataTables::of($levels)
        ->addIndexColumn()
        ->addColumn('aksi', function ($level) {
            $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a>';
            $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
}
public function create()
{
    // return view('level.create');
    $breadcrumb = (object)[
        'title' => 'Tambah Level',
        'list' => ['Home', 'Level', 'Tambah']
    ];
    $page = (object)[
        'title' => 'Tambah Level Baru'
    ];

    $level = m_level::all(); //ambil data untuk ditampilkan di form
    $activemenu = 'level';
    return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activemenu' => $activemenu]);
}
public function show(string $id)
    {
        
        $level = m_level::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Level'
        ];

        $activemenu = 'level';

        return view('level.show', ['level' => $level, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu]);
    }

public function edit(string $id)
{
    $level = m_level::find($id);
    // $level = LevelModel::all();

    $breadcrumb = (object)[
        'title' => 'Edit Level',
        'list' => ['Home', 'Level', 'Edit']
    ];
    $page = (object)[
        'title' => 'Edit Level'
    ];

    $activemenu = 'level';

    return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu, 'level' => $level]);
}
public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'bail|required|string|unique:m_levels,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100',
        ]);

        m_level::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check = m_level::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            m_level::destroy($id);

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }



}
