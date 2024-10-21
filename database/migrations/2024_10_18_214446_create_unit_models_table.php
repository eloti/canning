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
        Schema::create('unit_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('family_id');
            $table->integer('subfamily_id');
            $table->integer('brand_id');
            $table->string('model');
            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_models');
    }
};
