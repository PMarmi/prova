<?php

namespace App\Http\Controllers;

use App\Models\Projecte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DatosController extends Controller
{
    public function nombreFuncion($variableSiNecesito) {
        // instrucciones y ejecución de código
    }

    public function fresh($cantidad) {
        Artisan::call('migrate:fresh');
        \App\Models\User::factory(1)->create();
        \App\Models\Usuari::create([
            'nom' => 'Pau Marmi',
            'edat' => '17']
        );
        \App\Models\Usuari::create([
            'nom' => 'Laura Marmi',
            'edat' => '27']
        );
        \App\Models\Projecte::factory($cantidad)->create();
        \App\Models\Tasca::factory($cantidad*1.5)->create();
        \App\Models\Comentari::factory($cantidad*2)->create();
        
        $dades = Projecte::with('tasques')->find(1);

        dd($dades->tasques);

    }
}