<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserResultController;
use App\Http\Controllers\CreateIssueController;
use App\Http\Controllers\StoreController;

use App\Http\Controllers\SubjectTestController;
use App\Http\Controllers\SubjectPracticeController;
use App\Http\Controllers\ReferenceBookTestController;
use App\Http\Controllers\ReferenceBookPracticeController;
use App\Http\Controllers\UnitTestController;
use App\Http\Controllers\UnitPracticeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueTestController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ResultTestController;

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

Route::get('/login', function () {
    return view('login');
})->middleware(['auth:users'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminUserController::class, 'user']);
Route::get('/user_result/{user_id}', [UserResultController::class, 'user_result']);
Route::post('/store', [StoreController::class, 'store'])->name('store');
Route::get('/create_issue', [CreateIssueController::class, 'create_issue']);

Route::get('/subject_test', [SubjectTestController::class, 'subject_test']);
Route::get('/subject_practice', [SubjectPracticeController::class, 'subject_practice']);
Route::get('/reference_book_test/{subject_id}', [ReferenceBookTestController::class, 'reference_test']);
Route::get('/reference_book_practice/{subject_id}', [ReferenceBookPracticeController::class, 'reference_practice']);
Route::get('/unit_test/{reference_book_id}', [UnitTestController::class, 'unit_test']);
Route::get('/unit_practice/{reference_book_id}', [UnitPracticeController::class, 'unit_practice']);
Route::get('/issue/{unit_id}', [IssueController::class, 'issue']);
Route::get('/issue_test/{unit_id}', [IssueTestController::class, 'issue_test']);
Route::post('/result', [ResultController::class, 'result'])->name('result');
Route::post('/result_test', [ResultTestController::class, 'result_test'])->name('result_test');
