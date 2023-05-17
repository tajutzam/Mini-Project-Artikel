<?php

namespace App\Models;

use Database\Factories\KomentarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Komentar extends Model
{
    use HasFactory;

    protected $table = "table_komentar";


    protected static function newFactory(): KomentarFactory
    {
        return KomentarFactory::new();
    }

    protected $fillable = [
        'nama',
        "isi_komentar",
        "email",
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(DetailArtikel::class);
    }


}