<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CourseManagementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::get('name', function(){
        return auth()->user()->email;
    });
    Route::get('user', function(){
        return auth()->user();
    });
    Route::get('user/course/details', [CourseManagementController::class, 'course']);
});

//for unauthorize user
Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized. Please check your token.'], 401);
})->name('login');