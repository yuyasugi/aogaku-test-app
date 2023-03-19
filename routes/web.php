<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



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

// Route::get('/{any}', function () {
//     return view('index');
// })->where('any', '.*');

// Auth::routes();
// Route::get('/login','Auth\LoginController@showLoginForm')->name('login.get');
// Route::post('login', 'Auth\LoginController@login')->name('login.post');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register')->name('register');
// // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/subject_test', [SubjectTestController::class, 'subject_test'])->name('subject_test');
// Route::get('/subject_practice', [SubjectPracticeController::class, 'subject_practice'])->name('subject_practice');
// Route::get('/reference_book_test/{subject_id}', [ReferenceBookTestController::class, 'reference_test'])->name('reference_book_test');
// Route::get('/reference_book_practice/{subject_id}', [ReferenceBookPracticeController::class, 'reference_practice'])->name('reference_book_practice');
// Route::get('/unit_test/{reference_book_id}', [UnitTestController::class, 'unit_test'])->name('unit_test');
// Route::get('/unit_practice/{reference_book_id}', [UnitPracticeController::class, 'unit_practice'])->name('unit_practice');
// Route::get('/issue/{unit_id}', [IssueController::class, 'issue'])->name('issue');
// Route::get('/issue_test/{unit_id}', [IssueTestController::class, 'issue_test'])->name('issue_test');
// Route::post('/result', [ResultController::class, 'result'])->name('result');
// Route::post('/result_test', [ResultTestController::class, 'result_test'])->name('result_test');

Route::fallback(function () {
    # public/index.htmlにはCRAのビルド結果がおいてある
    return file_get_contents(public_path('index.html'));
});
