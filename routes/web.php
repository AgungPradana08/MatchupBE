<?php

use App\Http\Controllers\API\LokasiController;
use App\Http\Controllers\api\SparringApiController;
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
    return view('usersetting.home');
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
        Route::get('/{id}/kompetisidetail', [KompetisiController::class, 'detail'])->name('kompetisi.detail');
        Route::post('/{id}/kompetisidetail/join', [KompetisiController::class, 'joinkompetisi'])->name('kompetisi.join');
    });

    Route::prefix('/tim')->group(function () {
        Route::get('/home', [UserTimController::class, 'index2']);
        Route::get('/{id}/timdetail', [UserTimController::class, 'detail']);
        Route::get('/tambahtim', [TimController::class, 'tambah']);
    });

    Route::prefix('/userprofile')->group(function () {
        Route::get('/home', [UserProfileController::class, 'index']);
        Route::get('/setting', [UserProfileController::class, 'edit']);
        Route::put('/{id}/settings', [UserProfileController::class, 'update']);
    });

    Route::prefix('/usersparring')->group(function () {
        Route::get('/search', [UserSparringController::class, 'search2']);
        Route::get('/home', [UserSparringController::class, 'index'])->name('usersparring.home');
        Route::get('/usersparringtambah', [UserSparringController::class, 'tambah']);

        // api lokasi
        Route::get('/tambahsparringnew', [LokasiController::class, 'index']);
        // --------------------------------SPACE-----------------------------
        // api sparring
        Route::get('/sparringapi', [SparringApiController::class, 'index2']);
        // --------------------------------SPACE-----------------------------

        Route::post('/store', [UserSparringController::class, 'store']);
        Route::get('/{id}/usersparringedit', [UserSparringController::class, 'edit']);
        Route::put('/{id}',[UserSparringController::class, 'update']);
        Route::get('/{id}/usersparringdetail', [UserSparringController::class, 'detail'])->name('sparring.detail');
        Route::post('/{id}/usersparringdetail/join', [UserSparringController::class, 'joinsparring'])->name('sparring.join');
        Route::delete('/{id}',[UserSparringController::class, 'destroy']);
        //page versus
        Route::get('/versus', [UserSparringController::class, 'versus']);
        Route::post('/versus/store', [UserSparringController::class, 'versusstore']);
        Route::put('/versus/{id}',[UserSparringController::class, 'versusedit']);
    });

    Route::get('/sparring/home', [UserSparringController::class, 'index2']);
    Route::get('/sparring/search', [UserSparringController::class, 'search']);

    Route::prefix('/usermabar')->group(function () {
        Route::get('/search', [UserMabarController::class, 'search2']);
        Route::get('/home', [UserMabarController::class, 'index']);
        Route::get('/tambah', [UserMabarController::class, 'tambah']);
        Route::post('/store', [UserMabarController::class, 'store']);
        Route::get('/{id}/usermabardetail', [UserMabarController::class, 'detail'])->name('mabar.detail');
        Route::post('/{id}/usermabardetail/join', [UserMabarController::class, 'joinmabar'])->name('mabar.join');
        Route::get('/{id}/usermabaredit', [UserMabarController::class, 'edit']);
        Route::put('/{id}',[UserMabarController::class, 'update']);
        Route::delete('/{id}',[UserMabarController::class, 'destroy']);
        
    });

    Route::get('/mabar/home', [UserMabarController::class, 'index2']);
    Route::get('/mabar/search', [UserMabarController::class, 'search']);

    Route::prefix('/usertim')->group(function () {
        Route::get('/search', [UserTimController::class, 'search2']);
        Route::get('/home', [UserTimController::class, 'index']);
        Route::get('/tambahtim', [UserTimController::class, 'tambah']);
        Route::post('/tambahtim/store', [UserTimController::class, 'store']);
        Route::get('/{id}/usertimdetail', [UserTimController::class, 'detail'])->name('tim.detail');
        Route::post('/{id}/usertimdetail/join', [UserTimController::class, 'jointim'])->name('tim.join');
        Route::post('/{id}/usertimdetail/leave', [UserTimController::class, 'leavetim'])->name('tim.leave');
        Route::get('/{id}/usertimedit', [UserTimController::class, 'edit']);
        Route::put('/{id}',[UserTimController::class, 'update']);
        Route::delete('/{id}',[UserTimController::class, 'destroy']);
    });

    Route::get('/tim/search', [UserTimController::class, 'search']);

});

Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login/store', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'showregister']);
Route::post('/register/store', [LoginController::class, 'register']);

//testing
Route::get('/registerr', [LoginController::class, 'showregister']);
Route::post('/registerr/store', [LoginController::class, 'register']);


Route::get('/logout', [LoginController::class, 'logout']);


Route::post('/matches/join', [UserMabarController::class, 'joinMatch'])->name('matches.join');


Route::get('/skuy', [SparringApiController::class, 'datasparringapi']);

Route::get('/skuylah', [SparringApiController::class, 'getHelloFromApi']);

Route::get('/testingapi', [SparringApiController::class, 'testingapi']);

Route::get('/cuy', function () {
    return view('testingapi.home');
});