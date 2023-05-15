<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparringController;

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

Route::get('/sparring/home', [SparringController::class, 'index']);
Route::get('/sparring/tambahsparring', [SparringController::class, 'tambah']);
Route::get('/sparring/{id}/sparringdetail', [SparringController::class, 'detail']);
Route::post('/sparring/store', [SparringController::class, 'store']);

