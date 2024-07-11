<?php

namespace App\Http\Controllers;

use App\Models\Projecte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class VariasFunciones extends Controller
{
    public function genera() {
        \App\Models\Projecte::factory(500)->create();
        \App\Models\Tasca::factory(500)->create();
        \App\Models\Comentari::factory(500)->create();
    }


    public function generaMuchos($cuantas) {
        // Artisan::call('migrate:fresh');
        // \App\Models\User::factory(1)->create();
        // \App\Models\Usuari::create([
        //     'nom' => 'Pau Marmi',
        //     'edat' => '17']
        // );
        // \App\Models\Usuari::create([
        //     'nom' => 'Laura Marmi',
        //     'edat' => '27']
        // );
        \App\Models\Projecte::factory($cuantas)->create();
        \App\Models\Tasca::factory($cuantas*1.5)->create();
        \App\Models\Comentari::factory($cuantas*2)->create();

        // $pro=Projecte::find(2);
        // $pro->delete();

    }
}
