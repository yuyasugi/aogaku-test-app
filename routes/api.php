<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\SubjectTestController;
use App\Http\Controllers\ReferenceBookTestController;
use App\Http\Controllers\UnitTestController;
use App\Http\Controllers\IssueTestController;
use App\Http\Controllers\SubjectPracticeController;
use App\Http\Controllers\ReferenceBookPracticeController;
use App\Http\Controllers\UnitPracticeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ResultTestController;


use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CreateIssueController;
use App\Http\Controllers\UserResultController;
use App\Http\Controllers\EditSubjectController;
use App\Http\Controllers\EditReferenceBookController;
use App\Http\Controllers\EditUnitController;
use App\Http\Controllers\EditIssueController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UpdateController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('/subject_test', [SubjectTestController::class, 'subject_test'])->name('subject_test');
Route::get('/reference_book_test/{subject_id}', [ReferenceBookTestController::class, 'reference_test'])->name('reference_book_test');
Route::get('/unit_test/{reference_book_id}', [UnitTestController::class, 'unit_test'])->name('unit_test');
Route::get('/issue_test/{unit_id}', [IssueTestController::class, 'issue_test'])->name('issue_test');

Route::group(['middleware' => ['api', 'cors']], function(){
    Route::options('subject_practice', function() {
        return response()->json();
    });
    Route::get('/subject_practice', [SubjectPracticeController::class, 'subject_practice'])->name('subject_practice');
});
Route::get('/reference_book_practice/{subject_id}', [ReferenceBookPracticeController::class, 'reference_practice'])->name('reference_book_practice');
Route::get('/unit_practice/{reference_book_id}', [UnitPracticeController::class, 'unit_practice'])->name('unit_practice');
Route::get('/issue/{unit_id}', [IssueController::class, 'issue'])->name('issue');
Route::post('/result', [ResultController::class, 'result'])->name('result');
Route::post('/result_test', [ResultTestController::class, 'result_test'])->name('result_test');


Route::get('/admin', [AdminUserController::class, 'user'])->name('admin');
Route::get('/user_result/{user_id}', [UserResultController::class, 'user_result'])->name('user_result');
Route::get('/create_issue', [CreateIssueController::class, 'create_issue'])->name('create_issue');
Route::post('/store', [StoreController::class, 'store'])->name('store');
Route::get('/edit_subject', [EditSubjectController::class, 'edit_subject'])->name('edit_subject');
Route::get('/edit_reference_book/{subject_id}', [EditReferenceBookController::class, 'edit_reference'])->name('edit_reference_book');
Route::get('/edit_unit/{reference_book_id}', [EditUnitController::class, 'edit_unit'])->name('edit_unit');
Route::get('/edit_issue/{unit_id}', [EditIssueController::class, 'edit_issue'])->name('edit_issue');
Route::get('/edit/{id}', [EditController::class, 'edit'])->name('edit');
Route::post('/update', [UpdateController::class, 'update'])->name('update');
Route::post('/destroy', [UpdateController::class, 'destroy'])->name('destroy');




