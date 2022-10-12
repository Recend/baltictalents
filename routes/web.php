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


Route::get('{name}/lectures/',[LectureController::class, 'index'])
    ->name('group.lectures');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
