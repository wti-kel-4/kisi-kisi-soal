<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicCompetencyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionCardController;
use App\Http\Controllers\QuestionGridController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;



Route::prefix('admin')->group(function(){
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('basic-competency', BasicCompetencyController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('lesson', LessonController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('question-card', QuestionCardController::class);
    Route::resource('question-grid', QuestionGridController::class);
    Route::resource('study', StudyController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('user', UserController::class);
});