<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuari extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "edat",
    ];
    public function projectes(): HasMany
    {
        return $this->hasMany(Projecte::class);
    }

    public function comentaris(): HasMany
    {
        return $this->hasMany(Comentari::class);
    }
}
