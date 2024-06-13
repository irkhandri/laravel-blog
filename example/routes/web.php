<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::redirect('/', 'posts');

// Route::put('posts/{post}/upd', [PostController::class, 'upd'])->name('posts.upd');

Route::resource('posts', PostController::class);
Route::resource('interests', InterestController::class);
// Route::resource('messages', MessageController::class);



Route::get('/{user}/posts', [ProfileController::class, 'userPosts'])->name('posts.user');

Route::get('/profiles', [ProfileController::class, 'profiles'])->name('profiles');


Route::middleware('guest')->group(function () {
    Route::get('/register', function() {
        return view('auth.register');
    })->name('register') ;
    
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::view('/login', 'auth.login')->name('login');
    
    Route::post('/login', [AuthController::class, 'login']);


    Route::view('/forgot-password', 'auth.forgot-password')
    ->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])
        ->name('password.email');

    Route::get('/reset-password/{token}',[ResetPasswordController::class, 'passwordReset'] )
        ->name('password.reset');


    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate']  )
        ->name('password.update');

});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'profile'])
        ->middleware('verified')
        ->name('profile');

    Route::get('/create-message/{user}', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/create-message/{user}', [MessageController::class, 'store'])->name('messages.store');

    Route::get('/messages-input', [MessageController::class, 'indexIn'])->name('messages.indexIn');
    Route::get('/messages-output', [MessageController::class, 'indexOut'])->name('messages.indexOut');

    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    
    // email verification notice route
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])
        ->name('verification.notice');

    // email verification handler route
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware(['signed'])
        ->name('verification.verify');


    Route::post('/email/verification-notification',[AuthController::class, 'verifyHandler'] )
        ->middleware(['throttle:6,1'])
        ->name('verification.send');

});



