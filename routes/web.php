<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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

Route::get('/wirken-workouts', function(){
    return view('user.wirkenWorkouts');
})->name('wirkenWorkouts');

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
});
