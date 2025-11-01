<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('employees', 'lesson_id')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->unsignedBigInteger('lesson_id')->nullable()->after('position_id');
                $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('employees', 'lesson_id')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropForeign(['lesson_id']);
                $table->dropColumn('lesson_id');
            });
        }
    }
};


