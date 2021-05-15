<?php

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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [UserController::class, 'show']);
    Route::delete('/user', [UserController::class, 'delete']);
});
