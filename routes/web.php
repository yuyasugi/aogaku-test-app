<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubjectTestController;
use App\Http\Controllers\SubjectPracticeController;
use App\Http\Controllers\ReferenceBookTestController;
use App\Http\Controllers\ReferenceBookPracticeController;
use App\Http\Controllers\UnitTestController;
use App\Http\Controllers\UnitPracticeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ResultController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'user']);
Route::get('/subject_test', [SubjectTestController::class, 'subject_test']);
Route::get('/subject_practice', [SubjectPracticeController::class, 'subject_practice']);
Route::get('/reference_book_test', [ReferenceBookTestController::class, 'reference_test']);
Route::get('/reference_book_practice', [ReferenceBookPracticeController::class, 'reference_practice']);
Route::get('/unit_test/{reference_book_id}', [UnitTestController::class, 'unit_test']);
Route::get('/unit_practice/{reference_book_id}', [UnitPracticeController::class, 'unit_practice']);
Route::get('/issue/{unit_id}', [IssueController::class, 'issue']);
Route::post('/result', [ResultController::class, 'result'])->name('result');
