<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/beranda', [BerandaController::class,'index'])->middleware(['auth'])->name('beranda');
Route::resources([
    'data' => DataController::class
]);
Route::post('/importExcel', [DataController::class,'importExcel'])->middleware(['auth'])->name('import-excel');

require __DIR__.'/auth.php';
