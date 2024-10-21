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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('rental_type');
            $table->integer('previous_rental_id');
            $table->integer('user_id');
            $table->integer('client_id')->index();
            $table->integer('contact_id')->index();
            $table->integer('address_id')->index();
            $table->longText('aux')->nullable();

            $table->integer('unit_model_id')->index();
            $table->integer('quantity');
            $table->integer('days');
            $table->string('period');
            $table->date('start_date');
            $table->date('end_date');

            $table->decimal('price_1', 8, 2)->nullable();
            $table->decimal('price_7', 8, 2)->nullable();
            $table->decimal('price_30', 8, 2)->nullable();            

            $table->decimal('rental_list_price', 10, 2);

            $table->decimal('rental_offered_price', 10, 2);
            $table->integer('discount_offered_price');
            $table->decimal('net_rental_price', 10, 2);

            $table->decimal('transport_offered_price', 10, 2);
            $table->integer('discount_transport_price');
            $table->decimal('net_transport_price', 10, 2);

            $table->decimal('gross_offered_price', 10, 2);            
            $table->decimal('net_discount', 10, 2);           
            $table->decimal('net_offered_price', 10, 2);

            $table->string('message')->nullable();
            $table->integer('daysRented')->nullable();
            $table->decimal('correctedCharge', 10, 2)->nullable();
            $table->integer('daysPending')->nullable();
            $table->integer('canc_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
