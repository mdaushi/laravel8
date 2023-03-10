<?php

use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisteredUserController;
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

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [LoginController::class, 'revokeToken']);

    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/', [ProfileController::class, 'update']);
    });

    Route::resource('documents', DocumentController::class)->except('show');
    Route::get('documents/list-signing', [DocumentController::class, 'listSigning']);
    Route::get('documents/{id}/verify', [DocumentController::class, 'verify']);
});