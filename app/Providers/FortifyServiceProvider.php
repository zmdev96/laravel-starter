<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Responses\LogoutResponse;
use App\Http\Responses\VerifyEmailViewResponse as VerifyEmailView;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{

    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        \Laravel\Fortify\Contracts\LogoutResponse::class => LogoutResponse::class,
        // TODO implement VerifyEmailView::class instant of VerifyEmailViewResponse
        VerifyEmailViewResponse::class => VerifyEmailView::class,

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (request()->isAdmin()) {
            config()->set('fortify.guard', 'admin');
            config()->set('fortify.passwords', 'admins');
            config()->set('fortify.home', '/'.env('APP_DASHBOARD_PREFIX'));
            config()->set('fortify.redirects.email-verification', '/'.env('APP_DASHBOARD_PREFIX'));
            config()->set('fortify.redirects.verification-notice', '/'.env('APP_DASHBOARD_PREFIX'));
            config()->set('fortify.redirects.password-reset', '/'.env('APP_DASHBOARD_PREFIX'));
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Actions
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Views
        Fortify::loginView(fn() => view('frontend.auth.login'));
        Fortify::registerView(fn() => view('frontend.auth.register'));
        Fortify::requestPasswordResetLinkView(fn() => view('frontend.auth.passwords.email'));
        Fortify::resetPasswordView(fn() => view('frontend.auth.passwords.reset'));
        Fortify::confirmPasswordView(fn() => view('frontend.auth.passwords.confirm'));
        Fortify::verifyEmailView(fn() => view('frontend.auth.verify'));

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(30)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(30)->by($request->session()->get('login.id'));
        });

    }
}
