<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Mentor\MentorController;
use App\Http\Controllers\Admin\Subject\SubjectController;
use App\Http\Controllers\Admin\Activity\ActivityController;
use App\Http\Controllers\Admin\Goal\GoalController;
use App\Http\Controllers\Admin\Presetgoal\PresetgoalController;
use App\Http\Controllers\Admin\Pregoal\PregoalController;

use App\Http\Controllers\Admin\Dashboard\DashboardController;

use App\Http\Controllers\Admin\User\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('admin',[AdminController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth:sanctum'], function () {
Route::get('dashboard',[DashboardController::class,'index']);
Route::resource('customer', CustomerController::class);
Route::resource('mentor', MentorController::class);
Route::resource('subject', SubjectController::class);
Route::resource('activity', ActivityController::class);
Route::resource('goal', GoalController::class);
Route::resource('presetgoal',PresetgoalController::class);
Route::resource('pregoal',PregoalController::class);

});


