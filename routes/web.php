<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Route::middleware('guest')->group(function () {
    Route::get('/' , [AuthController::class  , 'showLoginForm'])->name('login');
    Route::post('/' , [AuthController::class  , 'login']);

//});
//    يعني اذا المستخدم عامل تسجيل دخول اسمحلو يدخل على الروتات اللي بقلبه

Route::middleware('auth')->group (
    function () {
        Route::resource('posts', PostController::class);
        Route::get('deleteAll', [PostController::class , 'deleteAll'])->name('deleteAll');
        Route::post('/logout' , [AuthController::class  , 'logout'])->name('logout');
        Route::resource('users' , UserController::class);
});
    