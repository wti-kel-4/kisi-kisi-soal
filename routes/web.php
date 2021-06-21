<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicCompetencyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionCardController;
use App\Http\Controllers\QuestionGridController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyStudyController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\MyLessonController;
use App\Http\Controllers\MyScopeLessonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);

Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('basic-competency', BasicCompetencyController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('lesson', LessonController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('question-grid', [QuestionGridController::class, 'index'])->name('question_grid.index');
    Route::get('question-card', [QuestionCardController::class, 'index'])->name('question_card.index');
    // Route::group(['prefix' => 'question-grid'], function(){
    //     Route::get('/', [QuestionGridController::class, 'get_step_0'])->name('question_grid_step_0');
    //     Route::get('/{type}', [QuestionGridController::class, 'get_step_0_store'])->name('question_grid_step_0_store');
    //     Route::get('step-1', [QuestionGridController::class, 'get_step_1'])->name('question_grid_step_1');
    //     Route::post('step-1', [QuestionGridController::class, 'get_step_1_store'])->name('question_grid_step_1.store');
    //     Route::get('step-2', [QuestionGridController::class, 'get_step_2'])->name('question_grid_step_2');
    //     Route::post('step-2-save', [QuestionGridController::class, 'get_step_2_save'])->name('question_grid_step_2.save');
    //     Route::delete('step-2-delete/{i}', [QuestionGridController::class, 'get_step_2_delete'])->name('question_grid_step_2.delete');
    //     Route::get('step-3', [QuestionGridController::class, 'get_step_3'])->name('question_grid_step_3');
    //     Route::get('step-finish/{id}', [QuestionGridController::class, 'get_step_finish'])->name('question_grid_step_finish');
    //     Route::get('preview/{id}', [QuestionGridController::class, 'get_preview'])->name('question_grid_preview');
    //     Route::get('download/{id}', [QuestionGridController::class, 'get_download'])->name('question_grid_download');
    // });
    Route::resource('study', StudyController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('user', UserController::class);
    Route::get('log-activity', [ProfileController::class, 'view_log_all'])->name('log-activity');
});

Route::prefix('user')->name('user.')->middleware(['user'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('profile', ProfileController::class);
    Route::get('log-activity', [ProfileController::class, 'view_log_user'])->name('log_activity');
    Route::resource('grade', GradeController::class);
    Route::resource('lesson', LessonController::class);
    Route::resource('my-study', MyStudyController::class);
    Route::resource('my-class', MyClassController::class);
    Route::resource('my-lesson', MyLessonController::class);
    Route::resource('my-scope-lesson', MyScopeLessonController::class);
    
    Route::group(['prefix' => 'question-grid'], function(){
        Route::get('step-0', [QuestionGridController::class, 'get_step_0'])->name('question_grid_step_0');
        Route::get('step-0/{type}', [QuestionGridController::class, 'get_step_0_store'])->name('question_grid_step_0_store');
        Route::get('step-1', [QuestionGridController::class, 'get_step_1'])->name('question_grid_step_1');
        Route::post('step-1', [QuestionGridController::class, 'get_step_1_store'])->name('question_grid_step_1.store');
        Route::get('step-2', [QuestionGridController::class, 'get_step_2'])->name('question_grid_step_2');
        Route::post('step-2-save', [QuestionGridController::class, 'get_step_2_save'])->name('question_grid_step_2.save');
        Route::delete('step-2-delete/{i}', [QuestionGridController::class, 'get_step_2_delete'])->name('question_grid_step_2.delete');
        Route::get('step-3', [QuestionGridController::class, 'get_step_3'])->name('question_grid_step_3');
        Route::get('step-finish/{id}', [QuestionGridController::class, 'get_step_finish'])->name('question_grid_step_finish');
        Route::get('preview/{id}', [QuestionGridController::class, 'get_preview'])->name('question_grid_preview');
        Route::get('download/{id}', [QuestionGridController::class, 'get_download'])->name('question_grid_download');
    });

    Route::group(['prefix' => 'question-card'], function(){
        Route::get('step-0', [QuestionCardController::class, 'get_step_0'])->name('question_card_step_0');
        Route::get('step-1/{id}', [QuestionCardController::class, 'get_step_1'])->name('question_card_step_1');
        Route::get('step-2', [QuestionCardController::class, 'get_step_2'])->name('question_card_step_2');
        Route::post('step-2-save', [QuestionCardController::class, 'get_step_2_save'])->name('question_card_step_2.save');
        Route::delete('step-2-delete/{i}', [QuestionCardController::class, 'get_step_2_delete'])->name('question_card_step_2.delete');
        Route::get('step-3', [QuestionCardController::class, 'get_step_3'])->name('question_card_step_3');
        Route::get('step-finish/{id}', [QuestionCardController::class, 'get_step_finish'])->name('question_card_step_finish');
        Route::get('preview/{id}', [QuestionCardController::class, 'get_preview'])->name('question_card_preview');
        Route::get('download/{id}', [QuestionCardController::class, 'get_download'])->name('question_card_download');
    });
});