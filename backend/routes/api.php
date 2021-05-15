<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\PlaceAreaController;
use App\Http\Controllers\PlaceBuildController;
use App\Http\Controllers\PlaceRoomController;
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
    Route::get('/', [PlaceAreaController::class, 'index']);
    Route::get('/{id}', [PlaceAreaController::class, 'show']);
    Route::get('/{id}/builds', [PlaceAreaController::class, 'getBuilds']);
});
Route::prefix('place_build')->group(function(){
    Route::get('/{id}', [PlaceBuildController::class, 'show']);
    Route::get('/{id}/rooms', [PlaceBuildController::class, 'getRooms']);
});

Route::prefix('place_room')->group(function(){
    Route::get('/{id}', [PlaceRoomController::class, 'show']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('/user')->group(function(){
        Route::get('/', [UserController::class, 'show']);
        Route::delete('/', [UserController::class, 'delete']);
    });

    Route::prefix('place_area')->group(function(){
        Route::post('/', [PlaceAreaController::class, 'store']);
    });

    Route::prefix('place_build')->group(function(){
        Route::post('/', [PlaceBuildController::class, 'store']);
    });

    Route::prefix('place_room')->group(function(){
        Route::post('/', [PlaceRoomController::class, 'store']);
    });

});
