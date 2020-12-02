<?php

namespace App\Providers;

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
        // =[]
        $industries_key = [
            "car" => "Car Racing",
            "agriculture" => "Agriculture",
            "film" => "Film",
            "automobile" => "Auto Mobile",
            "photography" => "Photography",
        ];
        view()->share('industries_select', $industries_key);
    }
}
