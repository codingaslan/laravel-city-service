<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(static function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('logout', 'logout');
    Route::delete('delete', 'logout');
    Route::get('me', 'me');
    Route::prefix('update')->group(static function () {
        Route::put('info', 'updateInfo');
        Route::put('password', 'updatePassword');
        Route::put('avatar', 'updateAvatar');
        Route::put('address', 'updateAddress');
    });
});
