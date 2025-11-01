<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use App\Models\Position;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1️⃣ Agar composer yoki artisan ishlayotgan bo‘lsa — to‘xtatamiz
        if (App::runningInConsole()) {
            return;
        }

        // 2️⃣ Agar jadval hali mavjud bo‘lmasa — to‘xtatamiz
        if (!Schema::hasTable('positions')) {
            return;
        }

        // 3️⃣ Endi xavfsiz tarzda query yozish mumkin
        $positions = Position::all();
        view()->share('positions', $positions);
    }
}
