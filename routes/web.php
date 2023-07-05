<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpkoController;
use App\Http\Controllers\SpkoitemController;

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

Route::get('/', [SpkoController::class, 'index']); 
Route::post('/', [SpkoController::class, 'createSpko']);
Route::get('/spko/{id_spko}', [SpkoController::class, 'detailSpko']);
Route::get('/delete_spko/{id_spko}',[SpkoController::class, 'deleteSpko']);
Route::get('/spko_print/{id_spko}', [SpkoController::class, 'detailSpkoPrint']);
Route::post('/edit_spko/{id_spko}', [SpkoController::class, 'editSpko']);
Route::post('/edit_spkoitem/{id_spko}/{id}', [SpkoitemController::class, 'editSpkoItem']);

