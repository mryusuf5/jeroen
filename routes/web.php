<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SliderController::class, 'welcome'])->name('home');

Route::get('/wirken-workouts', [WorkoutsController::class, 'welcome'])->name('wirkenWorkouts');

Route::get('/wirken-workouts/{workout}', [WorkoutsController::class, 'show'])->name('singleWorkout');

Route::get('/login', function (){
    return view('admin.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){
    Route::get('', function (){
        return view('admin.dashboard');
        })->name('dashboard');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('carousel', SliderController::class);
    Route::resource('workouts', WorkoutsController::class);
});
