<?php

namespace Database\Factories;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Artikel::class;

    public function definition(): array
    {
        return [
            "judul_artikel" => fake()->text(),
            "isi_artikel" => fake()->text(),
            "penulis_id" => 1
        ];
    }
}
