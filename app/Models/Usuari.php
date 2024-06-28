<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "edat",
    ];
    public function projectes()
    {
        return $this->hasMany(Projecte::class);
    }

    public function comentaris()
    {
        return $this->hasMany(Comentari::class);
    }
}
