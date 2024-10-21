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
        Schema::table('unit_models', function (Blueprint $table) {
            $table->decimal('price_30', 8, 2)->nullable();
            $table->decimal('price_7', 8, 2)->nullable();
            $table->decimal('price_1', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unit_models', function (Blueprint $table) {
            //
        });
    }
};
