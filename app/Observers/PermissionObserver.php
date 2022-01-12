<?php

namespace App\Observers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionObserver
{
    public function __construct()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }

    public function created(): void
    {
        //
    }


    public function updated(): void
    {
        //
    }


    public function deleted(): void
    {
        //
    }

    public function forceDeleted(): void
    {
        //
    }}
