<?php

use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutsController;
use App\Http\Controllers\ChartDataController;
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

Route::post('contact_messages', [ContactMessagesController::class, 'store'])->name('storeMessage');

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
    Route::resource('customers', CustomersController::class);
    Route::resource('charts', ChartsController::class);
    Route::resource('contact_messages', ContactMessagesController::class);
    Route::resource('leaderboards', LeaderboardsController::class);
    Route::resource('chart_data', ChartDataController::class);
});
