<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Database\Factories\ArtikelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Artikel::create([
        //     "judul_artikel" => "konosuba",
        //     "isi_artikel" => "mang eakkkk",
        //     "id_penulis" => 1,
        // ]);
        Artikel::factory()->count(100)->create();
    }
}