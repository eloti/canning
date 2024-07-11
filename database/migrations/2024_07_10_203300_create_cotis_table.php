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
        Schema::create('cotis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->index();
            $table->integer('client_id')->index();
            $table->integer('contact_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->date('date');
            $table->integer('validez');
            $table->date('delivery_date');
            $table->integer('quote_curr');
            $table->string('payment_terms');
            $table->string('terms_desc')->nullable();
            $table->longText('obs')->nullable();
            $table->integer('op1')->nullable();
            $table->integer('op2')->nullable();
            $table->integer('op3')->nullable();
            $table->integer('op4')->nullable();
            $table->integer('op5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotis');
    }
};
