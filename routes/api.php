<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Habit\HabitController;
use App\Http\Controllers\HabitCompleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forgot_password', [ForgotPasswordController::class, 'forgot'])->name('password.forgot');
    Route::post('reset_password', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
});

Route::prefix('habit')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('list', [HabitController::class,'list']);
        Route::post('register', [HabitController::class,'register']);
        Route::put('update', [HabitController::class,'update']);
        Route::delete('delete', [HabitController::class,'delete']);
        Route::get('done', [HabitCompleteController::class,'doneHabit']);
        Route::get('skipped', [HabitCompleteController::class,'skippedHabit']);
    });
});
