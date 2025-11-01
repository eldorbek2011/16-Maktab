<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('useful_resources', 'url')) {
            Schema::table('useful_resources', function (Blueprint $table) {
                $table->string('url')->nullable()->after('body_ru');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('useful_resources', 'url')) {
            Schema::table('useful_resources', function (Blueprint $table) {
                $table->dropColumn('url');
            });
        }
    }
};


