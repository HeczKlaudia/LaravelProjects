<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjektController;

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

Route::get('/', [ProjektController::class, 'index'])->name('search');
Route::get('/add-project', [ProjektController::class, 'create']);
Route::get('/editPoject/{projekt}', [ProjektController::class, 'edit']);
Route::put('/editPoject/{projekt}', [ProjektController::class, 'update']);
Route::get('/delete/{id}', [ProjektController::class, 'delete']);

Route::post('/new_project', [ProjektController::class, 'newProject'])->name('new_project');
Route::get('/', [ProjektController::class, 'index'])->name('search');
