<?php

use App\Http\Controllers\Customer\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Customer\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Customer\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Customer\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Customer\CouponController;
use App\Http\Controllers\Customer\Auth\NewPasswordController;
use App\Http\Controllers\Customer\Auth\PasswordController;
use App\Http\Controllers\Customer\Auth\PasswordResetLinkController;
use App\Http\Controllers\Customer\Auth\RegisteredUserController;
use App\Http\Controllers\Customer\Auth\VerifyEmailController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Support\Inertia;

Route::middleware('guest')->group(function () {
  Route::as('auth.')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
      ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
      ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
      ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
      ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
      ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
      ->name('password.store');
  });
});

Route::middleware('auth')->group(function () {
  Route::as('auth.')->group(function () {
    Route::get('/verify-email', EmailVerificationPromptController::class)
      ->name('verification.notice');

    Route::middleware(['throttle:6,1'])->group(function () {
      Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed'])
        ->name('verification.verify');

      Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->name('verification.send');
    });

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
      ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('/password', [PasswordController::class, 'update'])
      ->name('password.update');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
      ->name('logout');
  });


  Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

  Route::put('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

  Route::delete('/profile', [ProfileController::class, 'destroy']);

  Route::get('/orders', OrderController::class)
    ->name('orders');
});


Route::get('/cart', [CartController::class, 'edit'])
  ->name('cart');
Route::post('/cart', [CartController::class, 'update']);
Route::delete('/cart', [CartController::class, 'destroy']);



Route::post('/apply-coupon', [CouponController::class, 'apply']);


Route::get('/checkout', function () {
  return Inertia::render('Checkout');
})->name('checkout');


Route::get('/menu', MenuController::class)
  ->name('menu');

Route::get('/', HomeController::class)
  ->name('home');
