<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_stats', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('log_date');
        });
    }

    public function down(): void
    {
        Schema::table('landing_stats', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
};
