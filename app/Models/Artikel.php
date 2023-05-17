<?php

namespace App\Models;

use Database\Factories\ArtikelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "table_artikel";

    protected $fillable = [
        "judul_artikel",
        "isi_artikel",
        "penulis_id"
    ];


    protected static function newFactory(): ArtikelFactory
    {
        return ArtikelFactory::new();
    }


    public function penulis() : BelongsTo{
        return $this->belongsTo(Penulis::class);
    }

    public function detail():HasMany{
        return $this->hasMany(DetailArtikel::class);
    }


   

}