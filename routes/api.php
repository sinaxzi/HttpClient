<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGuzzleController;
use App\Http\Controllers\UserCurlController;


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







Route::apiResource('curl/users',UserCurlController::class)->only([
    'index','destroy','update','store'
]);
Route::apiResource('guzzle/users',UserGuzzleController::class)->only([
    'index','destroy','update','store'
]);
Route::apiResource('http/users',UserController::class)->only([
    'index','destroy','update','store'
]);
