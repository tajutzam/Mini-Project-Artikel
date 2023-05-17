<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Komentar::factory()->count(10)->create();
    }
}
