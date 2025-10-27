<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\Position;
use App\Models\UsefulResource;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Til sozlamasini o‘rnatish
        App::setLocale(Session::get('lang', config('app.locale')));

        // Netlify yoki Composer build vaqtida database mavjud emas,
        // shuning uchun DB query’larni to‘xtatamiz
        if (App::runningInConsole()) {
            // Bu holatda hech qanday DB so‘rovi bajarilmaydi
            view()->share('positions', collect());
            view()->share('teacher', collect());
            view()->share('usefulResources', collect());
            return;
        }

        // Endi faqat jadvallar mavjud bo‘lsa so‘rov yuboramiz
        if (Schema::hasTable('positions')) {
            $positions = Position::all();
            view()->share('positions', $positions);
            view()->share('teacher', $positions);
        } else {
            view()->share('positions', collect());
            view()->share('teacher', collect());
        }

        if (Schema::hasTable('useful_resources')) {
            $resources = UsefulResource::all();
            view()->share('usefulResources', $resources);
        } else {
            view()->share('usefulResources', collect());
        }
    }
}
