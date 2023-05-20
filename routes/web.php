<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MabarController;
use App\Http\Controllers\UserTimController;
use App\Http\Controllers\SparringController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\UserMabarController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserSparringController;

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

// Route::get('/', function () {
//     return view('dashboard.home');
// });

Route::get('/', function () {
    return view('dashboard.home');
});

Route::get('/about', function () {
    return view('dashboard.about');
});
Route::get('/contact', function () {
    return view('dashboard.contact');
});

Route::prefix('/sparring')->group(function () {
    Route::get('/home', [SparringController::class, 'index']); //home
    Route::get('/tambahsparring', [SparringController::class, 'tambah']); //nambah data
    Route::get('/{id}/sparringdetail', [SparringController::class, 'detail']); //detail page 
    Route::post('/store', [SparringController::class, 'store']); //nyimpan data
});

Route::prefix('/mabar')->group(function () {
    Route::get('/home', [MabarController::class, 'index']);
    Route::get('/{id}/mabardetail', [MabarController::class, 'detail']);
    Route::get('/tambahmabar', [MabarController::class, 'tambah']);
    Route::post('/store', [MabarController::class, 'store']);
});

Route::prefix('/kompetisi')->group(function () {
    Route::get('/home', [KompetisiController::class, 'index']);
    Route::get('/{id}/kompetisidetail', [KompetisiController::class, 'detail']);
});

Route::prefix('/tim')->group(function () {
    Route::get('/home', [TimController::class, 'index']);
    Route::get('/{id}/timdetail', [TimController::class, 'detail']);
    Route::get('/tambahtim', [TimController::class, 'tambah']);
});

Route::prefix('/userprofile')->group(function () {
    Route::get('/home', [UserProfileController::class, 'index']);
});

Route::prefix('/usersparring')->group(function () {
    Route::get('/home', [UserSparringController::class, 'index']);
});

Route::prefix('/usermabar')->group(function () {
    Route::get('/home', [UserMabarController::class, 'index']);
});

Route::prefix('/usertim')->group(function () {
    Route::get('/home', [UserTimController::class, 'index']);
});

Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/authenticate', [LoginController::class, 'authenticate']);
});