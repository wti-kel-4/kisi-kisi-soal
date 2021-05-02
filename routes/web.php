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
        if(Session::has('teachers_id_'.$user->id.'_temp')){
            Session::forget('teachers_id_'.$user->id.'_temp');
        }
        if(Session::has('teachers_id_'.$user->id.'_question_grid_step_0')){
            Session::forget('teachers_id_'.$user->id.'_question_grid_step_0');
        }
        if(Session::has('teachers_id_'.$user->id.'_question_grid_step_1')){
            Session::forget('teachers_id_'.$user->id.'_question_grid_step_1');
        }
        if(Session::has('teachers_id_'.$user->id.'_question_grid_step_2')){
            Session::forget('teachers_id_'.$user->id.'_question_grid_step_2');
        }
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::group(['prefix' => 'question-grid'], function(){
        Route::get('step-0', [QuestionGridController::class, 'get_step_0'])->name('question_grid_step_0');
        Route::get('step-0/{type}', [QuestionGridController::class, 'get_step_0_store'])->name('question_grid_step_0_store');
        Route::get('step-1', [QuestionGridController::class, 'get_step_1'])->name('question_grid_step_1');
        Route::post('step-1', [QuestionGridController::class, 'get_step_1_store'])->name('question_grid_step_1.store');
        Route::get('step-2', [QuestionGridController::class, 'get_step_2'])->name('question_grid_step_2');
        Route::post('step-2-save', [QuestionGridController::class, 'get_step_2_save'])->name('question_grid_step_2.save');
        Route::delete('step-2-delete/{i}', [QuestionGridController::class, 'get_step_2_delete'])->name('question_grid_step_2.delete');
        Route::get('step-3', [QuestionGridController::class, 'get_step_3'])->name('question_grid_step_3');
        Route::get('step-finish', [QuestionGridController::class, 'get_step_finish'])->name('question_grid_step_finish');
    });

    Route::group(['prefix' => 'question-card'], function(){
        Route::get('step-0', [QuestionCardController::class, 'get_step_0'])->name('user.question_card');
        Route::get('check-question-grid', [QuestionCardController::class, 'get_question_grid'])->name('get_question_grid');
    });
});