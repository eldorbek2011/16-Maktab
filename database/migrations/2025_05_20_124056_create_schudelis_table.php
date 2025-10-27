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
        Schema::create('schudelis', function (Blueprint $table) {
            $table->id();
            $table->integer('smena_id');
            $table->integer('lesson_id');
            $table->string('week_day');
            $table->string('room');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schudelis', function (Blueprint $table) {
            $table->integer('room')->change();
        });
    }
};
