<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AlbumController; 
use App\Http\Controllers\API\LikeController; 
use App\Http\Controllers\API\PlaylistController; 
use App\Http\Controllers\API\TrackController; 
use App\Http\Controllers\API\UserController; 

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

Route::prefix('v1')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    Route::middleware('auth:api')->group(function () {
        Route::resource('album', AlbumController::class);
    });
});
