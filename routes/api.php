<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

    // Admin Route Group
    Route::middleware(['auth:sanctum','abilities:admin'])->prefix('admin')->group(static function () {

    });

// User Route Group
    Route::middleware(['auth:sanctum','abilities:user'])->prefix('user')->group(static function () {

    });
// Visitor Route Group
    Route::middleware(['auth:sanctum','abilities:visitor'])->prefix('visitor')->group(static function () {

});

