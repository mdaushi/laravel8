<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('/', function(){
        return view('dashboard');
    })->name('dashboard');

    // Route Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'edit', 'update']);

    // Route Document
    Route::resource('document', DocumentController::class)->except('show');
    Route::get('document/{id}/verify', [DocumentController::class, 'verify'])->name('document.verify');
    
});

require __DIR__.'/auth.php';
