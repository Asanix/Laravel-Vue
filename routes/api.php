<?php

use App\Http\Controllers\User\StoreController as UserStore;

use App\Http\Controllers\Person\IndexController;
use App\Http\Controllers\Person\ShowController;
use App\Http\Controllers\Person\StoreController as PersonStore;
use App\Http\Controllers\Person\UpdateController;
use App\Http\Controllers\Person\DeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {
    Route::post('/', UserStore::class);

});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', \App\Http\Controllers\AuthController::class . '@login');
    Route::post('logout', \App\Http\Controllers\AuthController::class . '@logout');
    Route::post('refresh', \App\Http\Controllers\AuthController::class . '@refresh');
    Route::post('me', \App\Http\Controllers\AuthController::class . '@me');

});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'people'], function () {
        Route::post('/', PersonStore::class);
        Route::get('/', IndexController::class);
        Route::get('/{person}', ShowController::class);
        Route::patch('/{person}', UpdateController::class);
        Route::delete('/{person}', DeleteController::class);
    });

});


