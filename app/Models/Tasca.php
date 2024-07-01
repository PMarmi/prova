<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tasca extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "descripcio",
        "projecte_id",
    ];
    public function projecte(): BelongsTo
    {
        return $this->belongsTo(Projecte::class);
    }
    
    public function comentaris(): HasMany
    {
	    return $this->hasMany(Comentari::class);
    }

}
