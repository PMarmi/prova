<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentari extends Model
{
    use HasFactory;
    protected $fillable = [
        "contingut",
        "tasca_id",
        "usuari_id",
    ];
    public function tasca()
    {
        return $this->belongsTo(Tasca::class);
    }

    public function usuari()
    {
        return $this->belongsTo(Usuari::class);
    }
}
