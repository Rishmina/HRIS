<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, EmployeeController, LeaveController, AttendanceController, PayrollController};

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('leaves', LeaveController::class)->except(['show']);
    Route::get('employees/{employee}/leave-balance', [LeaveController::class, 'balance']);
    Route::apiResource('attendances', AttendanceController::class)->except(['show']);
    Route::apiResource('payrolls', PayrollController::class);
    Route::get('payrolls/{payroll}/payslip', [PayrollController::class, 'payslip']);
});
