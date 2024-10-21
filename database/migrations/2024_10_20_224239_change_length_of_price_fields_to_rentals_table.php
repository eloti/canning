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
        Schema::table('rentals', function (Blueprint $table) {
            $table->decimal('price_1', 16, 2)->nullable()->change();
            $table->decimal('price_7', 16, 2)->nullable()->change();
            $table->decimal('price_30', 16, 2)->nullable()->change();
            $table->decimal('rental_list_price', 16, 2)->change();
            $table->decimal('rental_offered_price', 16, 2)->change();
            $table->integer('discount_offered_price')->change();
            $table->decimal('net_rental_price', 16, 2)->change();
            $table->decimal('transport_offered_price', 16, 2)->change();
            $table->integer('discount_transport_price')->change();
            $table->decimal('net_transport_price', 16, 2)->change();
            $table->decimal('gross_offered_price', 16, 2)->change();            
            $table->decimal('net_discount', 16, 2)->change();           
            $table->decimal('net_offered_price', 16, 2)->change();
            $table->decimal('other_price', 16, 2)->nullable()->change();            
            $table->decimal('correctedCharge', 16, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            //
        });
    }
};
