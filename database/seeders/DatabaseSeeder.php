<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::insert([
            'name' => 'Superadmin',
            'email' => 'super@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 1,
        ]);
        
        \App\Models\User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 2,
        ]);

        \App\Models\User::insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 3,
        ]);

        \App\Models\Kelurahan::insert([
            'id_desa' => 3315142001,
            'nama_desa' => 'Menduran'
        ]);

        \App\Models\Kecamatan::insert([
            'nama_kecamatan' => 'Brati'
        ]);
        
        \App\Models\Kabupaten::insert([
            'nama_kabupaten' => 'Grobogan'
        ]);
        
        \App\Models\Pariwisata::insert([
            'kecamatan_id' => 1,
            'kelurahan_id' => 1,
            'wisata' => "Curug",
            'foto' => "banner.jpg",
        ]);

        \App\Models\Usahausulan::insert([
            'kabupaten_id' => 1,
            'kecamatan_id' => 1,
            'desa_id' => 1,
            'usaha_usulan' => 'Rumah Angker 51',
            'scan_surat' => '1685129667.jpg',
            'permasalahan_usaha_sebelum' => 'Gedung Terbengkalai',
            'status' => 1
        ]);
    }
}
