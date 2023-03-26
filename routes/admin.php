<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserResultController;
use App\Http\Controllers\CreateIssueController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EditSubjectController;
use App\Http\Controllers\EditReferenceBookController;
use App\Http\Controllers\EditUnitController;
use App\Http\Controllers\EditIssueController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UpdateController;


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

// Route::get('/login','Admin\Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Admin\Auth\LoginController@login')->name('login.post');
// Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/', function () {
    return view('admin.welcome');
});

// Route::get('/admin', function () {
//     return view('admin');
// })->middleware(['auth:admins'])->name('admin');

Route::get('/admin', [AdminUserController::class, 'user'])->middleware(['auth:admins'])->name('admin');
Route::get('/user_result/{user_id}', [UserResultController::class, 'user_result'])->middleware(['auth:admins'])->name('user_result');
Route::post('/store', [StoreController::class, 'store'])->middleware(['auth:admins'])->name('store');
Route::get('/create_issue', [CreateIssueController::class, 'create_issue'])->middleware(['auth:admins'])->name('create_issue');
Route::get('/edit_subject', [EditSubjectController::class, 'edit_subject'])->middleware(['auth:admins'])->name('edit_subject');
Route::get('/edit_reference_book/{subject_id}', [EditReferenceBookController::class, 'edit_reference'])->middleware(['auth:admins'])->name('edit_reference_book');
Route::get('/edit_unit/{reference_book_id}', [EditUnitController::class, 'edit_unit'])->middleware(['auth:admins'])->name('edit_unit');
Route::get('/edit_issue/{unit_id}', [EditIssueController::class, 'edit_issue'])->middleware(['auth:admins'])->name('edit_issue');
Route::get('/edit/{id}', [EditController::class, 'edit'])->middleware(['auth:admins'])->name('edit');
Route::post('/update/{unit_id}', [UpdateController::class, 'update'])->middleware(['auth:admins'])->name('update');
Route::post('/destroy/{unit_id}', [UpdateController::class, 'destroy'])->middleware(['auth:admins'])->name('destroy');



Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('password.request');

// Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.email');

// Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('password.reset');

// Route::post('/reset-password', [NewPasswordController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.update');

// Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                 ->middleware('auth:admins')
//                 ->name('verification.notice');

// Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                 ->middleware(['auth:admins', 'signed', 'throttle:6,1'])
//                 ->name('verification.verify');

// Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware(['auth:admins', 'throttle:6,1'])
//                 ->name('verification.send');

// Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
//                 ->middleware('auth:admins')
//                 ->name('password.confirm');

// Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
//                 ->middleware('auth:admins');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:admins')
                ->name('logout');
