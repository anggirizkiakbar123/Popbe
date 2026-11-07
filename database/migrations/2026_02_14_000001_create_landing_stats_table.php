<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_stats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('value')->nullable();
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->date('log_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_stats');
    }
};
