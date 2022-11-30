<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('rooms', AdminController::class)->except([
    'create', 'edit', 'store', 'update', 'destroy'
]);

Route::resource('order', CustomerController::class)->except([
    'create', 'edit', 'store', 'update', 'destroy'
]);

// Protected router
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('rooms', AdminController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('order', CustomerController::class)->except('create', 'edit', 'show', 'index');
});
