<?php

use App\Http\Controllers\usersController;
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

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::delete('/logout', [usersController::class, 'logout']);
    
});

Route::post('/login', [usersController::class, 'login']);
Route::post('/register', [usersController::class, 'register']);