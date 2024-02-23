<?php

use App\Http\Controllers\cms\AuthController;
use App\Http\Controllers\cms\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cms\HomeController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\cms\RoomController;
use App\Http\Controllers\cms\SettingController;
use App\Http\Controllers\user\HomeController as UserHomeController;

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
Route::group(['middleware' => "auth"], function () {
    Route::get('/', [UserHomeController::class, 'index'])->name('user.home.index');
    Route::get('/filter', [UserHomeController::class, 'filter'])->name('user.home.filter');
});

// route authorization
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('user.auth.getLogin');
    Route::match(['get', 'post'], '/postLogin', [LoginController::class, 'postLogin'])->name('user.auth.postLogin');
    Route::get('/logout', [LoginController::class, 'getLogout'])->name('user.auth.getLogout');
    // forgot password
    Route::get('/forgot', [LoginController::class, 'getForgot'])->name('user.auth.getForgot');
    Route::post('/postForgot', [LoginController::class, 'postForgot'])->name('user.auth.postForgot');
    // register password
    Route::get('/register', [LoginController::class, 'register'])->name('user.auth.register');
    Route::post('/postRegister', [LoginController::class, 'postRegister'])->name('user.auth.postRegister');
});

Route::group(['prefix' => 'auth-cms'], function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('cms.auth-cms.getLogin');
    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('cms.auth-cms.postLogin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('cms.auth-cms.logout');
});


Route::group(['prefix' => 'cms', 'middleware' => 'cms'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('cms.user.index');
        Route::get('/store', [UserController::class, 'store'])->name('cms.user.store');
        Route::post('/create', [UserController::class, 'create'])->name('cms.user.create');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('cms.user.delete');
        Route::get('/profile/{id}', [UserController::class, 'profile'])->name('cms.user.profile');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('cms.user.update');
    });


    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('cms.setting.index');
        Route::post('/create', [SettingController::class, 'create'])->name('cms.setting.create');
    });

    Route::group(['prefix' => 'room'], function () {
        Route::get('/', [RoomController::class, 'index'])->name('cms.room.index');
        Route::get('/store', [RoomController::class, 'store'])->name('cms.room.store');
        Route::post('/create', [RoomController::class, 'create'])->name('cms.room.create');
        Route::delete('/delete/{id}', [RoomController::class, 'delete'])->name('cms.room.delete');
        Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('cms.room.edit');
        Route::post('/update/{id}', [RoomController::class, 'update'])->name('cms.room.update');
    });
});



