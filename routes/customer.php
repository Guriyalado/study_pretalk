<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthCustomer\AuthCustomerController;





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
});
