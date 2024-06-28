<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecte extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "descripcio",
        "usuari_id",
    ];
    public function usuari()
    {
        return $this->belongsTo(Usuari::class);
    }

    public function tasques()
    {
        return $this->hasMany(Tasca::class);
    }
}
