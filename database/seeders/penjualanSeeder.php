<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class penjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Riski abdi',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => now(),
                
            ],
            [
                'user_id' => 2, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Ikhwandi',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => now(),
              
            ],
            [
                'user_id' => 3, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Indra wiguna',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => now(),
            
            ],
            [
                'user_id' => 1, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Riski sayfudin',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => now(),
            
            ],
            [
                'user_id' => 2, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Angga marceleo',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => now(),
            
            ],
            [
                'user_id' => 3, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Endah tahira',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => now(),
            
            ],
            [
                'user_id' => 1, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Sugit',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => now(),
        
            ],
            [
                'user_id' => 2, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Abdul soni',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => now(),
             
            ],
            [
                'user_id' => 3, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'Arya maulana',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => now(),
             
            ],
            [
                'user_id' => 3, // Sesuaikan dengan ID user yang ingin Anda hubungkan
                'pembeli' => 'M Toyip',
                'penjualan_kode' => 'PJ0010',
                'penjualan_tanggal' => now(),
            
            ],
            // Add more data as needed
        ];

        // Insert data into m_penjualans table
        DB::table('t_penjualans')->insert($data);
    }
}
