<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
use Auth;
use Session;

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
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

Route::group(['prefix' => 'user', 'middleware' => ['user']], function(){
    Route::get('dashboard', function () {
        $user = Auth::guard('user')->user();
        Session::forget('teachers_id_'.$user->id.'_question_grid_step_1');
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('step-1', [QuestionGridController::class, 'get_step_1'])->name('question_grid_step_1');
    Route::post('step-1', [QuestionGridController::class, 'get_step_1_store'])->name('question_grid_step_1.store');
    Route::get('step-2', [QuestionGridController::class, 'get_step_2'])->name('question_grid_step_2');
    Route::get('step-3', [QuestionGridController::class, 'get_step_3'])->name('question_grid_step_3');;
});