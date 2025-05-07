<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\MadrasahController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('employees', EmployeeController::class);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// Route::middleware(['auth', 'role:super_admin'])->prefix('admin')->group(function () {
//     Route::resource('districts', DistrictController::class);
// });
Route::resource('districts', DistrictController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('upazilas', UpazilaController::class);
Route::resource('madrasahs', MadrasahController::class);
Route::resource('leave-types', LeaveTypeController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('attendances', AttendanceController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

