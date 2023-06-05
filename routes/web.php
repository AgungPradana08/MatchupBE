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

Route::get('/newriko', function () {
    return view('user.userprofile.homeold');
});

Route::get('/about', function () {
    return view('dashboard.about');
});
Route::get('/contact', function () {
    return view('dashboard.contact');
});


Route::middleware(['auth'])->group(function () {

    Route::prefix('/sparring')->group(function () {
        // Route::get('/home', [SparringController::class, 'index']); //home
        // Route::get('/tambahsparring', [SparringController::class, 'tambah']); //nambah data
        // Route::get('/{id}/sparringdetail', [SparringController::class, 'detail']); //detail page 
        // Route::post('/store', [SparringController::class, 'store']); //nyimpan data
    });

    Route::prefix('/mabar')->group(function () {
        // Route::get('/home', [MabarController::class, 'index']);
        // Route::get('/{id}/mabardetail', [MabarController::class, 'detail']);
        // Route::get('/tambahmabar', [MabarController::class, 'tambah']);
        // Route::post('/store', [MabarController::class, 'store']);
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
        Route::get('/usersparringtambah', [UserSparringController::class, 'tambah']);
        Route::post('/store', [UserSparringController::class, 'store']);
        Route::get('/{id}/usersparringedit', [UserSparringController::class, 'edit']);
        Route::put('/{id}',[UserSparringController::class, 'update']); 
        Route::get('/{id}/usersparringdetail', [UserSparringController::class, 'detail']);
        Route::delete('/{id}',[UserSparringController::class, 'destroy']);
        //page versus
        Route::get('/versus', [UserSparringController::class, 'versus']);
        Route::post('/versus/store', [UserSparringController::class, 'versusstore']);
        Route::put('/versus/{id}',[UserSparringController::class, 'versusedit']);
    });

    Route::get('/sparring/home', [UserSparringController::class, 'index2']);
    Route::get('/sparring/search', [UserSparringController::class, 'search']);

    Route::prefix('/usermabar')->group(function () {
        Route::get('/home', [UserMabarController::class, 'index']);
        Route::get('/tambah', [UserMabarController::class, 'tambah']);
        Route::post('/store', [UserMabarController::class, 'store']);
        Route::get('/{id}/usermabardetail', [UserMabarController::class, 'detail']);
    });

    Route::get('/mabar/home', [UserMabarController::class, 'index2']);
    Route::get('/mabar/search', [UserMabarController::class, 'search']);

    Route::prefix('/usertim')->group(function () {
        Route::get('/home', [UserTimController::class, 'index']);
    });

});

Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login/store', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'showregister']);
Route::post('/register/store', [LoginController::class, 'register']);

//testing
Route::get('/registerr', [LoginController::class, 'showregister']);
Route::post('/registerr/store', [LoginController::class, 'register']);



Route::get('/logout', [LoginController::class, 'logout']);


