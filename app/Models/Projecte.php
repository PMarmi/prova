<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Projecte extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "descripcio",
        "usuari_id",
    ];

    public function usuari(): BelongsTo
    {
        return $this->belongsTo(Usuari::class);
    }

    public function tasques(): HasMany
    {
        return $this->hasMany(Tasca::class);
    }

    public function comentaris(): HasManyThrough
    {
        return $this->hasManyThrough(Comentari::class, Tasca::class);
    }

}
