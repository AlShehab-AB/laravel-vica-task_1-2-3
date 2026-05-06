<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/' , [AuthController::class  , 'showLoginForm'])->name('login');
    Route::post('/' , [AuthController::class  , 'login']);

});
//    يعني اذا المستخدم عامل تسجيل دخول اسمحلو يدخل على الروتات اللي بقلبه

Route::middleware('auth')->group (
    function () {
        Route::resource('posts', PostController::class);
        Route::get('deleteAll', [PostController::class , 'deleteAll'])->name('deleteAll');
        // Route::resource('users' , UserController::class);

        Route::group(['middleware' => ['role:admin']], function(){
                Route::get('users', [AdminController::class, 'index'])->name('users.index');
                Route::get('users/create', [AdminController::class, 'createUser'])->name('users.create');
                Route::post('users/store', [AdminController::class, 'storeUser'])->name('users.store');
                Route::get('users/show/{user}', [AdminController::class, 'showUser'])->name('users.show');
                Route::get('users/edit/{user}', [AdminController::class, 'editUser'])->name('users.edit');
                Route::put('users/update/{user}', [AdminController::class, 'updateUser'])->name('users.update');
                Route::delete('users/destroy/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');


                Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
                Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
                Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
                Route::get('roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
                Route::put('roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');
                Route::delete('roles/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::group(['middleware' => ['role:admin|writer']], function(){
                Route::resource('posts', PostController::class);
        });

        Route::group(['middleware' => ['role:user|admin|writer']] , function(){
                Route::get('/posts', [PostController::class , 'index'])->name('posts.index');
        });


        Route::post('/logout' , [AuthController::class  , 'logout'])->name('logout');

});
