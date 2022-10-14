<?php


use App\Http\Controllers\LectureController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GroupController;
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

Route::get('groups', [GroupController::class, 'index'])->name('groups.index');
Route::middleware(['auth'])->group(function (){
    Route::resource('groups',GroupController::class)->except(['index']);

});


Route::get('/group/lectures/{lecture_id}',[LectureController::class, 'groupLectures'])
    ->name('group.lectures');

Route::get('/group/students/{user_id}',[GroupController::class, 'groupStudents'])
    ->name('group.students');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
