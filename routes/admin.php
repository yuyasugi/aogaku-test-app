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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/', function () {
    return view('admin.welcome');
});

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth:admins'])->name('admin');

Route::get('/admin', [AdminUserController::class, 'user']);
Route::get('/user_result/{user_id}', [UserResultController::class, 'user_result']);
Route::post('/store', [StoreController::class, 'store'])->name('store');
Route::get('/create_issue', [CreateIssueController::class, 'create_issue'])->name('create_issue');



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
