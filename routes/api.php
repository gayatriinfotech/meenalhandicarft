<?php

use App\Http\Controllers\backendController;
use App\Http\Controllers\frontendController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('minusqty/{id}', [frontendController::class, 'minusqty']);
Route::post('plusqty/{id}', [frontendController::class, 'plusqty']);


Route::post('getsubcate/{id}', [backendController::class, 'getsubcate']);
