<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Rental\MobilController;
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

Route::get('rent', [MobilController::class, 'getRent']);

Route::post('/getDistance', [MobilController::class, 'getDistance']);

Route::post('check-mail', [FrontController::class, 'checkMail']);
