<?php

use App\Http\Controllers\VariasFunciones;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('genera',  [App\Http\Controllers\VariasFunciones::class, 'genera']);
Route::get('generaMuchos/{cuantas}',  [App\Http\Controllers\VariasFunciones::class, 'generaMuchos']);
Route::get('fresh/{cantidad}',  [App\Http\Controllers\DatosController::class, 'fresh']);