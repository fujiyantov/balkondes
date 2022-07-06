<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VillageHistoryController;

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

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

/* Route::get('/', function () {
    return view('index');
});

Route::get('/gallery', function () {
    return view('welcome');
})->name('gallery'); */

Route::get('/', [LoginController::class, 'index']);

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('villages', VillageController::class);
        Route::resource('culture-histories', VillageHistoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('trips', TripController::class);


        // USER
        Route::resource('user', UserController::class);
        Route::resource('setting', SettingController::class, [
            'except' => ['show']
        ]);
        Route::get('setting/password', [SettingController::class, 'change_password'])->name('change-password');
        Route::post('setting/upload-profile', [SettingController::class, 'upload_profile'])->name('profile-upload');
        Route::post('change-password', [SettingController::class, 'update_password'])->name('update.password');
    });
