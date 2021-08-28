<?php

use App\Http\Controllers\AtributController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/beranda', [BerandaController::class,'index'])->name('beranda');
    Route::resources([
        'data' => DataController::class,
        'atribut' => AtributController::class
    ]);
    Route::post('/importExcel', [DataController::class,'importExcel'])->name('import-excel');
    Route::get('/loadAtribut', [AtributController::class,'loadAtribut'])->name('load-atribut');

    Route::get('/perhitungan', [PerhitunganController::class,'index'])->name('perhitungan');
    Route::post('/hitung', [PerhitunganController::class,'hitung'])->name('hitung');
});

require __DIR__.'/auth.php';
