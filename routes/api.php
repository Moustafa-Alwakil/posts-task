<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ListPostController;
use App\Http\Controllers\Api\PostResourceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Start Auth Routes

Route::controller(AuthController::class)->group(function () {

    Route::middleware('guest:sanctum')->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });

    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

// End Auth Routes


Route::get('/', ListPostController::class)->name('all');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostResourceController::class)->except('index');
});
