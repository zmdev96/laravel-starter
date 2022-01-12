<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('isAdmin', function () {
            return config('fortify.multi_auth') && (Request::segment(1) == env('APP_DASHBOARD_PREFIX'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //config()->set('app.timezone', Request::visitor()->timezone_name);
        Request::macro('visitor', function () {
            return Http::get('https://json.geoiplookup.io/')->object();
        });

        /**
         * Create a new redirect response to a named dashboard route.
         */
        Redirector::macro('dashboard_route', function (
            string $route,
            mixed $parameters = [],
            int $status = 302,
            array $headers = []
        ): RedirectResponse {
            return redirect()->route(env('APP_DASHBOARD_ROUTE_NAME').$route, $parameters, $status, $headers);
        });



    }
}
