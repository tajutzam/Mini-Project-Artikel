<?php

namespace Database\Seeders;

use App\Models\DetailArtikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DetailArtikel::create([
            'artikel_id' => 1,
            "komentar_id" => 1
        ]);
    }
}
