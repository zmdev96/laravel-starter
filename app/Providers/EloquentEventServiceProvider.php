<?php

namespace App\Providers;

use App\Observers\PermissionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Model::preventLazyLoading(! app()->isProduction());

        Permission::observe(PermissionObserver::class);
        Role::observe(PermissionObserver::class);

    }
}
