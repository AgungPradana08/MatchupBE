<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LokasiController;
use App\Http\Controllers\api\SparringApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getdatalocation', [LokasiController::class, 'getdatalocation']);
// Route::get('/tambahsparingnewapi', [LokasiController::class, 'index']);

Route::get('/getdatasparring', [SparringApiController::class, 'getdatasparring']);
Route::get('/sparring/api', [SparringApiController::class, 'index']);       

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/skuylah', [SparringApiController::class, 'getHelloFromApi']);



