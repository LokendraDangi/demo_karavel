<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        view()->composer(['frontend.layouts.frontend'], function ($view) {
            $profile = Profile::first();
            $view->with('profile', $profile);
        });

        view()->composer(['frontend.layouts.frontend'], function ($view) {

            $data['menus'] = Category::where('status',1)->orderby('rank')->get();
            $view->with('data', $data);
        });
    }
}
