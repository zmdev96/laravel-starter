<?php


if (! function_exists('dashboard_route')) {
    /**
     * Generate the URL to a named dashboard route.
     */
    function dashboard_route(array|string $name, mixed $parameters = [], bool $absolute = true): string
    {
        return app('url')->route(env('APP_DASHBOARD_ROUTE_NAME').$name, $parameters, $absolute);
    }
}
