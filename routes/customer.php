<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthCustomer\AuthCustomerController;

use App\Http\Controllers\Api\Subject\SubjectController;
use App\Http\Controllers\Api\Activity\ActivityController;
use App\Http\Controllers\Api\Goal\GoalController;





/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register',[AuthCustomerController::class,'register']);
Route::post('login',[AuthCustomerController::class,'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile',[AuthCustomerController::class,'profile']);
    Route::post('profile/update',[AuthCustomerController::class,'update']);
    Route::post('logout',[AuthCustomerController::class,'logout']);
    Route::post('change-password',[AuthCustomerController::class,'change_password']);
// Route::post('mentor',[MentorController::class,'index']);
// Route::delete('mentor/{id}',[MentorController::class,'destroy']);
// Route::put('mentor',[MentorController::class,'update']);
Route::post('getsubject',[SubjectController::class,'index']);
// Route::post('subject',[SubjectController::class,'index']);
// Route::post('activity',[SubjectController::class,'index']);
// Route::post('goal',[SubjectController::class,'goal']);

Route::resource('subject',SubjectController::class);
Route::post('getactivity',[ActivityController::class,'index']);
Route::resource('activity',ActivityController::class);
Route::post('getgoal',[GoalController::class,'index']);
Route::resource('goal',GoalController::class);


});
