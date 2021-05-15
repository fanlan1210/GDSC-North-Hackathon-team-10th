<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\PlaceAreaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(function(){
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/', [UserController::class, 'register']);
});
Route::prefix('place_area')->group(function(){
    Route::get('/{id}', [PlaceAreaController::class, 'show']);
});


Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('/user')->group(function(){
        Route::get('/', [UserController::class, 'show']);
        Route::delete('/', [UserController::class, 'delete']);
    });

    Route::prefix('place_area')->group(function(){
        Route::post('/', [PlaceAreaController::class, 'store']);
    });
});
