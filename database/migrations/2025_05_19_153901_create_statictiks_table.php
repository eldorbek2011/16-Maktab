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
        Schema::create('statictiks', function (Blueprint $table) {
            $table->id();
            $table->integer('classesCount');
            $table->integer('studentsCount');
            $table->integer('teachersCount');
            $table->integer('graduatesCount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statictiks');
    }
};
