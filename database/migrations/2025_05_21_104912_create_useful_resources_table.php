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
        Schema::create('useful_resources', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('body_uz');
            $table->string('body_ru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useful_resources');
    }
};
