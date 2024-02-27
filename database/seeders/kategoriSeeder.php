<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_kode' => 'K001',
                'kategori_nama' => 'Makanan ringan',
            ],
            [
                'kategori_kode' => 'K002',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_kode' => 'K003',
                'kategori_nama' => 'Peralatan rumah tangga',
            ],
            [
                'kategori_kode' => 'K004',
                'kategori_nama' => 'Pakaian',
            ],
            [
                'kategori_kode' => 'K005',
                'kategori_nama' => 'peralatan olahraga',
            ],
           
            
        ];

        // Insert data into m_kategoris table
        DB::table('m_kategoris')->insert($data);
    }
}
