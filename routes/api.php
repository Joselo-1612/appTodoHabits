<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot_password', [ForgotPasswordController::class, 'forgot'])->name('password.forgot');
    Route::post('reset_password', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
});
