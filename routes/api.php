<?php

use App\Http\Controllers\planController;
use App\Http\Controllers\usersController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::delete('/logout', [usersController::class, 'logout']);

    //route to show all plan in user
    Route::get('plan/{user_id}', [planController::class, 'getAllUserPlan']);

    //route plan
    Route::post('plan/{user_id}', [planController::class, 'createUserPlan']);
    Route::get('plan/{plan_id}/detail', [planController::class, 'getPlanByID']);
    Route::delete('plan/{plan_id}/detail', [planController::class, 'deletePlanByID']);
    Route::put('plan/{plan_id}/detail', [planController::class, 'updatePlanByID']);

});

Route::post('/login', [usersController::class, 'login']);
Route::post('/register', [usersController::class, 'register']);
