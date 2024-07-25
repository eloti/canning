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
        Schema::create('coti_dets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('coti_id')->unsigned()->index();
            $table->integer('item');
            $table->string('description', 382);
            $table->string('power')->nullable();
            $table->string('regime')->nullable();
            $table->string('units');
            $table->integer('cant');
            $table->string('frequency')->nullable();
            $table->decimal('list_price', 10, 2)->nullable();
            $table->decimal('of_price', 10, 2);
            $table->decimal('vat_rate', 10, 2)->nullable();
            $table->decimal('of_price_plus_IVA', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coti_dets');
    }
};
