<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasca extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "descripcio",
        "projecte_id",
    ];
    public function projecte()
    {
        return $this->belongsTo(Projecte::class);
    }
    
    public function comentaris()
    {
	    return $this->hasMany(Comentari::class);
    }

}
