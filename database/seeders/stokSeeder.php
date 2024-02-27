<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ...
            [
                'barang_id' => 11,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 30,
                
            ],
            [
                'barang_id' => 12,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 50,
            
            ],
            [
                'barang_id' => 13,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 40,
        
            ],
            [
                'barang_id' => 14,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 30,
                
            ],
            [
                'barang_id' => 15,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 50,
            
            ],
            [
                'barang_id' => 16,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 40,
        
            ],
            [
                'barang_id' => 17,
                'user_id' => 3,
                'stok_tanggal' => now(),
                'stok_jumlah' => 30,
                
            ],
            [
                'barang_id' => 18,
                'user_id' => 3,
                'stok_tanggal' => now(),
                'stok_jumlah' => 50,
            
            ],
            [
                'barang_id' => 19,
                'user_id' => 3,
                'stok_tanggal' => now(),
                'stok_jumlah' => 40,
        
            ],
            [
                'barang_id' => 20,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 40,
        
            ],
            // Add more data as needed
        ];

        // Insert data into m_stoks table
        DB::table('t_stoks')->insert($data);
    }
}
