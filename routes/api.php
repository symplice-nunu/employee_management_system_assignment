<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceReportController;



// Public routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/attendance-report-pdf', [AttendanceReportController::class, 'generatePdfReport']);
    Route::post('/attendance-report-excel', [AttendanceReportController::class, 'generateExcelReport']);
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
    Route::resource('employees', EmployeeController::class);
    Route::prefix('attendance')->group(function () {
        Route::post('/record-arrival/{employeeId}', [AttendanceController::class, 'recordArrival']);
        Route::post('/record-departure/{employeeId}', [AttendanceController::class, 'recordDeparture']);
    });
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
