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
        Schema::create('tb_sites', function (Blueprint $table) {
            $table->id();
            $table->string('site1')->nullable();
            $table->string('site2')->nullable();
            $table->string('site3')->nullable();
            $table->string('site4')->nullable();
            $table->string('site5')->nullable();
            $table->string('site6')->nullable();
            $table->string('site7')->nullable();
            $table->string('site8')->nullable();
            $table->string('site9')->nullable();
            $table->string('site10')->nullable();
            $table->string('site11')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sites');
    }
};
