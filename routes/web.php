<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EpisodesController;



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

Route::resource('series', SeriesController::class)->only([
    'index', 'create'
]);

Route::post('series/create', [SeriesController::class, 'store'])
    ->name('create_serie');

Route::delete('series/delete/{id}', [SeriesController::class, 'destroy'])
    ->name('delete_serie');

Route::get('series/{id}/sessions', [SessionsController::class, 'index']);

Route::post('series/{id}/editSerie', [SeriesController::class, 'editSerie']);

Route::get('sessions/{session}/episodes', [EpisodesController::class, 'index']);
Route::post('sessions/{session}/episodes/visualized', [EpisodesController::class, 'toView']);



