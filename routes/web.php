<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalogo\CatalogoController;
use App\Http\Controllers\Estimaciones\EstimacionesController;

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

require __DIR__.'/auth.php';

Route::get('/estimaciones', [EstimacionesController::class, 'estimaciones'])->name('estimaciones');

Route::post('/catalogo', [CatalogoController::class, 'store'])->name('catalogo.store');
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/create', [CatalogoController::class, 'create'])->name('catalogo.create');
Route::get('/catalogo/edit/{id}', [CatalogoController::class, 'updateform'])->name('catalogo.edit');
Route::post('/catalogo/update/{id}', [CatalogoController::class, 'update'])->name('catalogo.update');
Route::get('/catalogo/delete/{id}', [CatalogoController::class, 'destroy'])->name('catalogo.destroy');

Route::post('/estimaciones', [EstimacionesController::class, 'store'])->name('estimaciones.store');
Route::get('/estimaciones', [EstimacionesController::class, 'estimaciones'])->name('estimaciones');
Route::get('/estimaciones/reportes', [EstimacionesController::class, 'reportes'])->name('estimaciones.reportes');
Route::post('/estimaciones/reportes/{id}', [EstimacionesController::class, 'valida'])->name('estimaciones.valida');




