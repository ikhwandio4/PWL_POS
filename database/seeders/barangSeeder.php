<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '1',
                'barang_nama' => 'Cilok',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            
            ],
            [
                'kategori_id' => 1, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '2',
                'barang_nama' => 'Baso Aci',
                'harga_beli' => 6000,
                'harga_jual' => 9000,
            
            ],
            [
                'kategori_id' => 2, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '3',
                'barang_nama' => 'Lampu',
                'harga_beli' => 75000,
                'harga_jual' => 120000,
            
            ],
            [
                'kategori_id' => 2, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '4',
                'barang_nama' => 'Terminal',
                'harga_beli' => 25000,
                'harga_jual' => 30000,
            
            ],
            [
                'kategori_id' => 3, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '5',
                'barang_nama' => 'Panci',
                'harga_beli' => 75000,
                'harga_jual' => 120000,
             
            ],
            [
                'kategori_id' => 3, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '6',
                'barang_nama' => 'Wajan',
                'harga_beli' => 85000,
                'harga_jual' => 100000,
              
            ],
            [
                'kategori_id' => 4, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '7',
                'barang_nama' => 'kaos Erigo',
                'harga_beli' => 55000,
                'harga_jual' => 700000,
              
            ],
            [
                'kategori_id' => 4, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '8',
                'barang_nama' => 'kaos Roughneck',
                'harga_beli' => 65000,
                'harga_jual' => 750000,
                
            ],
            [
                'kategori_id' => 5, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '9',
                'barang_nama' => 'dumble',
                'harga_beli' => 50000,
                'harga_jual' => 600000,
                
            ],
            [
                'kategori_id' => 5, // Sesuaikan dengan ID kategori yang ingin Anda hubungkan
                'barang_kode' => '10',
                'barang_nama' => 'Tali skipping',
                'harga_beli' => 75000,
                'harga_jual' => 120000,
             
            ],
        ];

        // Insert data into m_barangs table
        DB::table('m_barangs')->insert($data);
    }
}
