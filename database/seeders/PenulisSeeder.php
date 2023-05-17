<?php

namespace Database\Seeders;

use App\Models\Penulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penulis::create([
            "username" => "penulis",
            "password" => bcrypt("rahasia"),
            "name" => "zam"
        ]);
    }
}
