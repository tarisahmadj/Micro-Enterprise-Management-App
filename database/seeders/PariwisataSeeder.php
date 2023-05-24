<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PariwisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pariwisata::insert([
            'kecamatan' => 1,
            'kelurahan' => 1,
            'wisata' => "curug",
            'foto' => "banner.jpg",
        ]);
    }
}
