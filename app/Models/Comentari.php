<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentari extends Model
{
    use HasFactory;
    protected $fillable = [
        "contingut",
        "tasca_id",
        "usuari_id",
    ];
    public function tasca(): BelongsTo
    {
        return $this->belongsTo(Tasca::class);
    }

    public function usuari(): BelongsTo
    {
        return $this->belongsTo(Usuari::class);
    }
}
