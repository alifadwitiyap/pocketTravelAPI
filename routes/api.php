<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ChecklistController;
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
    
    Route::post('checklist/{user_id}', [ChecklistController::class, 'createChecklistItem']);
    Route::get('checklist/{user_id}', [ChecklistController::class, 'getAllUserChecklistItem']);
    Route::put('checklist/{item_id}', [ChecklistController::class, 'updateChecklistItemByID']);
    Route::delete('checklist/{item_id}', [ChecklistController::class, 'deleteChecklistByID']);

    // diary
    Route::resource('diary', DiaryController::class);

});

Route::post('/login', [usersController::class, 'login']);
Route::post('/register', [usersController::class, 'register']);
Route::get('/public', [DiaryController::class, 'index']);
