<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\CourseTypeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// Member2 UI pages
Route::view('/my-profile', 'profile')->name('my-profile');
Route::view('/settings', 'settings')->name('settings');
Route::view('/about', 'about')->name('about');

// Protected Routes
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Curriculum Actions
    Route::put('/curriculums/{id}/submit', [CurriculumController::class, 'submit'])->name('curriculums.submit');
    Route::put('/curriculums/{id}/hod-approve', [CurriculumController::class, 'hodApprove'])->name('curriculums.hodApprove');
    Route::put('/curriculums/{id}/cdc-approve', [CurriculumController::class, 'cdcApprove'])->name('curriculums.cdcApprove');
    Route::put('/curriculums/{id}/admin-approve', [CurriculumController::class, 'adminApprove'])->name('curriculums.adminApprove');

    Route::put('/curriculums/{id}/hod-reject', [CurriculumController::class, 'hodReject'])->name('curriculums.hodReject');
    Route::put('/curriculums/{id}/cdc-reject', [CurriculumController::class, 'cdcReject'])->name('curriculums.cdcReject');
    Route::put('/curriculums/{id}/admin-reject', [CurriculumController::class, 'adminReject'])->name('curriculums.adminReject');

    // Resources
    Route::resource('departments', DepartmentController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('academic-years', AcademicYearController::class);
    Route::resource('semesters', SemesterController::class);
    Route::resource('course-types', CourseTypeController::class);
    Route::resource('curriculums', CurriculumController::class);
});

require __DIR__.'/auth.php';