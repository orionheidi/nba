<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Team;
use App\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar',function($view){
            $teams = Team::all();
            $view->with(compact('teams'));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
