<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Position;
use App\Models\UsefulResource;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale(Session::get('lang', config('app.locale')));


        view()->share('positions', Position::all());
        view()->share('teacher', Position::all());


        view()->share('usefulResources', UsefulResource::all());

    }
}
