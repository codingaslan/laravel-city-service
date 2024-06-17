<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Admin Route Group
Route::middleware(['auth:sanctum', 'abilities:admin'])->prefix('admin')->group(static function () {
    require __DIR__ ."/Api/admin.php";
});

// User Route Group
Route::middleware(['auth:sanctum', 'abilities:user'])->prefix('user')->group(static function () {
    require  __DIR__ ."/Api/user.php";
});
// Visitor Route Group
Route::prefix('visitor')->group(static function () {
    require  __DIR__ ."/Api/guest.php";
});

