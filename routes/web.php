<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;

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

Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'postLogin']);
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin', function () {
        return view('backend.dashboard');
    });
    
    Route::get('admin/user', [AdminController::class, 'userList']);
    Route::get('admin/create/user', [AdminController::class, 'createUser']);
    Route::get('admin/plans', [AdminController::class, 'plans']);
    Route::get('admin/create/plan', [AdminController::class, 'createPlan']);
    Route::get('admin/states', [AdminController::class, 'states']);
    Route::get('admin/create/state', [AdminController::class, 'createState']);
    Route::get('admin/boards', [AdminController::class, 'boards']);
    Route::get('admin/create/boards', [AdminController::class, 'createBoard']);
    Route::get('admin/medium', [AdminController::class, 'medium']);
    Route::get('admin/create/medium', [AdminController::class, 'createMedium']);
    Route::get('admin/request_session', [AdminController::class, 'requestSession']);
    Route::get('admin/quizes', [AdminController::class, 'quizedList']);
    Route::get('admin/create/quiz', [AdminController::class, 'quizCreate']);
    Route::get('admin/journels', [AdminController::class, 'journelsList']);
    Route::get('admin/create/journel', [AdminController::class, 'createJournel']);
    Route::get('admin/request_counselling', [AdminController::class, 'requestCounselling']);
    Route::get('admin/therapy_intake', [AdminController::class, 'therapyIntake']);
    Route::get('admin/counsellors', [AdminController::class, 'counsellorList']);
    Route::get('admin/transactions', [AdminController::class, 'transactions']);

    Route::get('admin/logout', [AdminController::class, 'logout']);
});





