<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('app_developer') ? true : null;
        });

        VerifyEmail::createUrlUsing(function ($notifiable) {
            $url = request()->isAdmin() ? env('APP_DASHBOARD_ROUTE_NAME'). 'verification.verify' : 'verification.verify';
            return URL::temporarySignedRoute(
                $url,
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            $route = request()->isAdmin() ? env('APP_DASHBOARD_ROUTE_NAME'). 'password.reset' : 'password.reset';
            return url(route($route, [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        });


    }
}
