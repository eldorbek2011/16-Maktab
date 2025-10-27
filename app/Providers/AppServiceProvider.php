<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
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
        // Tilni o‘rnatish
        App::setLocale(Session::get('lang', config('app.locale')));

        // Composer yoki Artisan jarayonlarida (Netlify buildda) query ishlamasin
        if (App::runningInConsole()) {
            return;
        }

        // Bazada jadval mavjudligini tekshiramiz
        if (Schema::hasTable('positions')) {
            // Jadval bo‘lsa – xavfsiz tarzda query bajariladi
            $positions = Position::all();
            view()->share('positions', $positions);
            view()->share('teacher', $positions);
        } else {
            // Jadval yo‘q bo‘lsa – bo‘sh kolleksiya yuboramiz
            view()->share('positions', collect());
            view()->share('teacher', collect());
        }

        // Xuddi shu kabi boshqa modellarga ham tekshiruv qo‘shamiz
        if (Schema::hasTable('useful_resources')) {
            view()->share('usefulResources', UsefulResource::all());
        } else {
            view()->share('usefulResources', collect());
        }
    }
}
