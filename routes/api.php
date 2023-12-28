<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\CardController;
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


Route::post('login', [LoginController::class, 'login'])->name('login');
//    Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('cards', CardController::class);

//        Route::get('email/verify/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
//        Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
