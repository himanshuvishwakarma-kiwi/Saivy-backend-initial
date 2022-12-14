<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\ForgetPasswordController;

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
Route::group(['prefix' => 'v1'],function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('forgot-password', [ForgetPasswordController::class, 'sendPasswordResetLink']);
    Route::post('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('update-profile/{userId}', [UserController::class, 'profileUpdate']);
        Route::get('profile', [UserController::class, 'getUser']);
        Route::post('delete/{userId}', [UserController::class, 'deleteUser']);
        Route::get('users', [UserController::class, 'getAllusers']);
    });
});
 // Clear cache using reoptimized class
Route::get('/optimize-clear', function() {
    \Artisan::call('optimize:clear');
    return 'optimize cache cleared';
});

//Clear route cache
Route::get('/route-cache', function() {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-cache', function() {
    \Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache
Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
});
