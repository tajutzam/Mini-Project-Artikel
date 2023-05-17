<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailArtikel extends Model
{
    use HasFactory;

    protected $table = "table_detail";


    protected $fillable = [
        "artikel_id",
        "komentar_id"
    ];

    public function komentar():BelongsTo{
        return $this->belongsTo(Komentar::class);
    }

    public function artikel():HasOne{
        return $this->hasOne(Artikel::class);
    }


}
