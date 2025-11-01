<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Convert work_time from TIME to STRING to allow ranges like "8:00-20:00"
        Schema::table('employees', function (Blueprint $table) {
            $table->string('work_time')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->time('work_time')->nullable()->change();
        });
    }
};


