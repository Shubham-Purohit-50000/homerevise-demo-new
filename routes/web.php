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

    Route::resource('states', StateController::class);
    Route::resource('boards', BoardController::class);
    Route::resource('mediums', MediumController::class);
    Route::resource('standards', StandardController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('chapters', ChapterController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('subtopics', SubtopicController::class);
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
    Route::post('setting/update/announcement', [AdminController::class, 'announcement']);
    Route::post('setting/update/base_url', [AdminController::class, 'base_url']);

    Route::get('logout', [AdminController::class, 'logout']);
});

Route::get('privacy-policy', [WebsiteController::class, 'privacy']);
Route::get('term-condition', [WebsiteController::class, 'term_condition']);
Route::get('support', [WebsiteController::class, 'support']);


