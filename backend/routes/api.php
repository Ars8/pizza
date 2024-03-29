<?php

use App\Http\Controllers\FavoritePizzaResourceController;
use App\Http\Controllers\PizzaResourceController;
use App\Http\Controllers\UserResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserResourceController::class)
->only(['index']);

Route::resource('pizza', PizzaResourceController::class)
->only(['index']);

Route::post('favorites', [FavoritePizzaResourceController::class, 'store']);