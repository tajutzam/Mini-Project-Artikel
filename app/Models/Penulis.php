<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penulis extends Authenticatable
{
    use HasFactory;

    protected $table = "table_penulis";

    protected $fillable = [
        "username",
        "name",
        "password",
        "status_user"
    ];


    public function artikel() : HasMany{
        return $this->hasMany(Artikel::class);
    }

}
