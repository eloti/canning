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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('legal_name')->nullable();
            $table->string('commercial_name');
            $table->integer('cuit_type')->nullable();
            $table->string('cuit_num')->nullable();
            $table->string('vat_status')->nullable();
            $table->string('payment_terms')->nullable();
            $table->decimal('sales_tax_rate', 8, 2)->nullable();
  
            //$table->foreignId('country_id')->constrained();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
