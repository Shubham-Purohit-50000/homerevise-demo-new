<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\MediumController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\SubtopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'login'])->name('home');
Route::post('admin/login', [AdminController::class, 'postLogin']);
Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('backend.dashboard');
    });

    // Route::resource('states', StateController::class);
    // Route::resource('boards', BoardController::class);
    // Route::resource('mediums', MediumController::class);
    // Route::resource('standards', StandardController::class);
    // Route::resource('subjects', SubjectController::class);
    // Route::resource('chapters', ChapterController::class);
    // Route::resource('topics', TopicController::class);
    // Route::resource('subtopics', SubtopicController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('users', UserController::class);
    Route::get('add/user/key/{user}', [UserController::class, 'addKey']);
    Route::post('add/user/key/{user}', [UserController::class, 'submitKey']);
    Route::get('courses/create/{type}/{id}', [CourseController::class, 'create']);
    Route::get('course/activation/{course}', [CourseController::class, 'showActivation']);
    Route::delete('activation/key/delete/{id}', [CourseController::class, 'deleteActivation']);
    Route::get('setting', [AdminController::class, 'setting']);
    Route::post('setting/update/maintainance/mode', [AdminController::class, 'maintainanceMode']);
    Route::post('setting/update/app/version', [AdminController::class, 'appVerion']);
    Route::post('setting/update/pages', [AdminController::class, 'pages']);
    // Route::post('setting/update/announcement', [AdminController::class, 'announcement']);
    // Route::post('setting/update/base_url', [AdminController::class, 'base_url']);
    // Route::post('setting/update/apk', [AdminController::class, 'updateApk']);
    // Route::post('setting/update/window/apk', [AdminController::class, 'updateWinApk']);
    Route::post('setting/update/tv/apk', [AdminController::class, 'updateTvApk']);
    Route::post('update/user/course/duration/{activation}', [UserController::class, 'updateCourseDuration']);
    Route::get('user/deregister/device/{user}', [UserController::class, 'deRegisterDevice']);

    // Route::resource('questions', QuestionController::class);
    // Route::resource('quizes', QuizController::class);
    // Route::get('quizes/add-questions/{id}', [QuizController::class, 'addQuestions'])->name('quizes.add-questions');
    // Route::get('quizes/store-questions', [QuizController::class, 'storeQuestions'])->name('quizes.store-questions');
    // Route::get('get-subjects/{id}',[QuestionController::class, 'getSubjects']);
    // Route::get('get-chapters/{id}',[QuestionController::class, 'getChapters']);
    // Route::get('get-topics/{id}',[QuestionController::class, 'getTopics']);
    // Route::post('fetch-question',[QuestionController::class, 'fetchQuestions']);
    Route::post('view-question',[QuestionController::class, 'viewQuestions']);
    Route::post('quiz/add-question',[QuestionController::class, 'addQuizQuestions']);
    Route::post('quiz/remove-question',[QuestionController::class, 'removeQuizQuestions']);

    Route::post('questions/import-questions', [QuestionController::class, 'show']);    
    Route::post('questions/bulk-upload', [QuestionController::class, 'bulkUpload']);  

    Route::post('subjects/import-subject', [SubjectController::class, 'show']);    
    Route::post('subjects/bulk-upload', [SubjectController::class, 'subjectBulkUpload']); 

    Route::get('subject/add-courses', [SubjectController::class, 'subjectAddCourses']);    

    Route::get('course/view/{id}', [CourseController::class, 'viewCourse'])->name('course.viewCourse');    

    Route::post('chapters/import-chapter', [ChapterController::class, 'show']);    
    Route::post('chapters/bulk-upload', [ChapterController::class, 'chaptersBulkUpload']); 
 
    Route::get('logout', [AdminController::class, 'logout']);
    Route::get('tools', [AdminController::class, 'tools']);

    Route::post('setting/upload/image', [AdminController::class, 'uploadImage']);

    Route::get('get-chapters', [ChapterController::class, 'getChapters']);     

});

Route::get('privacy-policy', [WebsiteController::class, 'privacy']);
Route::get('term-condition', [WebsiteController::class, 'term_condition']);
Route::get('support', [WebsiteController::class, 'support']);
