<?php

use App\Http\Controllers\VersenyzokController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/versenyzok/',[VersenyzokController::class, 'index']);
Route::get('/versenyzok/{rajtszam}',[VersenyzokController::class, 'showByRajtszam']);

Route::post('/regisztracio/',[VersenyzokController::class, 'register']);
Route::post('/bejelentkezes/',[VersenyzokController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/jelentkezes/',[VersenyzokController::class, 'store']);
    Route::patch('/versenyzok/{versenyzo}',[VersenyzokController::class, 'update']);
    Route::delete('/versenyzok/{versenyzo}',[VersenyzokController::class, 'destroy']);
    Route::post('/logout/',[VersenyzokController::class,'logout']);
});