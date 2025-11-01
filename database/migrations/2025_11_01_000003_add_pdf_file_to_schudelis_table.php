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
        Schema::table('schudelis', function (Blueprint $table) {
            if (!Schema::hasColumn('schudelis', 'pdf_file')) {
                $table->string('pdf_file')->nullable()->after('time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schudelis', function (Blueprint $table) {
            if (Schema::hasColumn('schudelis', 'pdf_file')) {
                $table->dropColumn('pdf_file');
            }
        });
    }
};

