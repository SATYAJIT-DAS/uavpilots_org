<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Industry;

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
        

        $industry_names = Industry::get()->pluck('industry_name')->toArray();;
        view()->share('industry_names', $industry_names);
    }
}
