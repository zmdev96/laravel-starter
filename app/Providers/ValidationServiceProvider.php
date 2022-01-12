<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $currency_code = null;
        Validator::extend('currency', function ($attribute, $value, $parameters, $validator) use (&$currency_code) {
            $status = false;

            if (!is_string($value) || (strlen($value) != 3)) {
                return $status;
            }

            $currencies = ['EUR', 'USD'];
            if (in_array($value, $currencies)) {
                $status = true;
            }

            $currency_code = $value;
            return $status;
        },
            trans('validation.custom.invalid_currency', ['attribute' => $currency_code])
        );

        $amount = null;
        Validator::extend('amount', function ($attribute, $value, $parameters, $validator) use (&$amount) {
            $status = false;

            if ($value > 0) {
                $status = true;
            }

            $amount = $value;

            return $status;
        },
            trans('validation.custom.invalid_amount', ['attribute' => $amount])
        );

        Validator::extend('extension', function ($attribute, $value, $parameters, $validator) {
            $extension = $value->getClientOriginalExtension();
            return !empty($extension) && in_array($extension, $parameters);
        },
            trans('validation.custom.invalid_extension')
        );
    }
}
