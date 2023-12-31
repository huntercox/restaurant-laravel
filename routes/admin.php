<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CustomerController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->as('admin.')->group(function () {


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


        Route::group(['middleware' => ['role:admin']], function () {

            Route::get('/dashboard', DashboardController::class)
                ->name('dashboard');
        });

        Route::resource('/customers', CustomerController::class)
            ->except(['create', 'store', 'show']);

        Route::resource('/coupons', CouponController::class)
            ->except(['show']);

        Route::resource('/menus', MenuController::class)
            ->except(['show']);

        Route::resource('/items', ItemController::class, [
            'names' => 'items',
        ]);

      Route::resource('/options', OptionController::class);

        Route::resource('/menu-items', MenuItemController::class, [
            'names' => 'menu_items',
        ])->except(['show']);

        Route::resource('/profile', ProfileController::class)
            ->only(['edit', 'update', 'destroy']);

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile', [ProfileController::class, 'update']);

        Route::delete('/profile', [ProfileController::class, 'destroy']);

        Route::resource('/orders', OrderController::class)
            ->except(['create', 'store']);
    });
});
