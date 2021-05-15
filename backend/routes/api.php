<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\PlaceAreaController;
use App\Http\Controllers\PlaceBuildController;
use App\Http\Controllers\PlaceRoomController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPlaceController;
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

Route::prefix('/user')->group(function () {
	Route::post('/login', [UserController::class, 'login']);
	Route::post('/', [UserController::class, 'register']);
});

Route::prefix('/place_area')->group(function () {
	Route::get('/', [PlaceAreaController::class, 'index']);
	Route::get('/{id}', [PlaceAreaController::class, 'show']);
	Route::get('/{id}/builds', [PlaceAreaController::class, 'getBuilds']);
});

Route::prefix('/place_build')->group(function () {
	Route::get('/{id}', [PlaceBuildController::class, 'show']);
	Route::get('/{id}/rooms', [PlaceBuildController::class, 'getRooms']);
});

Route::prefix('/place_room')->group(function () {
	Route::get('/{id}', [PlaceRoomController::class, 'show']);
});

Route::prefix('/shop')->group(function () {
	Route::get('/', [ShopController::class, 'index']);
	Route::get('/{id}', [ShopController::class, 'show']);
});

Route::prefix('/meal')->group(function(){
    Route::get('/{id}', [MealController::class, 'show']);
});


Route::middleware('auth:sanctum')->group(function () {
	Route::prefix('/user')->group(function () {
		Route::get('/{id}', [UserController::class, 'show']);
		Route::delete('/{id}', [UserController::class, 'delete']);
        Route::get('/', [UserController::class, 'index']);
	});

    Route::prefix('/place_area')->group(function(){
        Route::post('/', [PlaceAreaController::class, 'store']);
        Route::post('/{id}/build', [PlaceBuildController::class, 'store']);
    });

    Route::prefix('/place_build')->group(function(){
        Route::post('/{id}/room', [PlaceRoomController::class, 'store']);
    });

	Route::prefix('/shop')->group(function () {
		Route::post('/', [ShopController::class, 'store']);
	});

    Route::prefix('/user_place')->group(function () {
		Route::post('/', [UserPlaceController::class, 'store']);
		Route::get('/{id}', [UserPlaceController::class, 'show']);
		Route::get('/', [UserPlaceController::class, 'index']);
		Route::delete('/{id}', [UserPlaceController::class, 'index']);
	});

});
