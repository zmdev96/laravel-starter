<?php


use App\Http\Controllers\Dashboard\{Home\HomeController,
    HumanResources\EmployeesController,
    HumanResources\PermissionsController,
    HumanResources\RolesController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\{AuthenticatedSessionController,
    ConfirmablePasswordController,
    ConfirmedPasswordStatusController,
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    NewPasswordController,
    PasswordResetLinkController,
    VerifyEmailController
};


if (config('fortify.multi_auth')) {
    Route::group(['prefix' => '/'.env('APP_DASHBOARD_PREFIX'), 'as' => env('APP_DASHBOARD_ROUTE_NAME')], function () {
        $limiter = config('fortify.limiters.login');
        $verificationLimiter = config('fortify.limiters.verification', '6,1');

        // Authentication...
        Route::get('/login', fn() => view('dashboard.auth.login'))
            ->middleware(['guest:admin'])
            ->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:admin',
                $limiter ? 'throttle:'.$limiter : null,
            ]));
        Route::any('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout')
            ->middleware(['auth:admin']);

        // Email Verification...
        Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
            ->middleware(['auth:admin'])
            ->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['auth:admin', 'signed', 'throttle:'.$verificationLimiter])
            ->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth:admin', 'throttle:'.$verificationLimiter])
            ->name('verification.send');

        // Password Reset...
        Route::get('/forgot-password', fn() => view('dashboard.auth.passwords.email'))
            ->middleware(['guest:admin'])
            ->name('password.request');
        Route::get('/reset-password/{token}', fn() => view('dashboard.auth.passwords.reset'))
            ->middleware(['guest:admin'])
            ->name('password.reset');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->middleware(['guest:admin'])
            ->name('password.email');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->middleware(['guest:admin'])
            ->name('password.update');

        // Password Confirmation...
        Route::get('/admin/confirm-password', fn() => view('dashboard.auth.passwords.confirm'))
            ->middleware(['auth:admin'])
            ->name('password.confirm');
        Route::get('/admin/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
            ->middleware(['auth:admin'])
            ->name('password.confirmation');
        Route::get('/logout/all/{pass}', fn($pass) => Auth::logoutOtherDevices($pass))
            ->middleware(['auth:admin'])
            ->name('logout.all');
        Route::post('/admin/confirm-password', [ConfirmablePasswordController::class, 'store'])
            ->middleware(['auth:admin']);

        // Employee Dashboard routes
        Route::group([
            'middleware' => ['auth:admin', 'verified:'.env('APP_DASHBOARD_ROUTE_NAME').'verification.notice'],
        ], function () {
            Route::get('/', [HomeController::class, '__invoke'])->name('home');
            Route::get('/home', [HomeController::class, '__invoke']);


            Route::get('test', function () {
                return dashboard_route('login');
            });

            // HumanResources Module Routes
            Route::group(['prefix' => '/human-resources', 'as' => 'hr.'], function () {
                Route::resource('/employees', EmployeesController::class);
                Route::resource('/roles', RolesController::class);
                Route::resource('/permissions', PermissionsController::class);
            });

        });


    });
}
