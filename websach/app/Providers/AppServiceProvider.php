<?php

namespace App\Providers;
use Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Validator::extend('check_old_password', function ($attribute, $value, $parameters, $validator) {

            return \Hash::check($value, Auth::user()->password);

        });

        \Validator::extend('check_old_pass_cus', function ($attribute, $value, $parameters, $validator) {

            return \Hash::check($value, Auth::guard('cus')->user()->password);

        });
    }
}
