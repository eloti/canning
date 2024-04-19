<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('rental_type');
            $table->integer('previous_rental_id');
            $table->integer('client_id')->index();
            $table->integer('contact_id')->index();
            $table->integer('address_id')->index();
            $table->integer('branch_id')->index();
            $table->integer('unit_id')->index();
            $table->integer('days');
            $table->string('period');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('rental_price', 10, 2);
            $table->decimal('transport_price', 10, 2);
            $table->decimal('gross_price', 10, 2);
            $table->integer('discount_rental_price');
            $table->integer('discount_transport_price');
            $table->decimal('net_discount', 10, 2);
            $table->decimal('net_rental_price', 10, 2);
            $table->decimal('net_transport_price', 10, 2);
            $table->decimal('net_price', 10, 2);
            $table->string('message')->nullable();
            $table->integer('daysRented')->nullable();
            $table->decimal('correctedCharge', 10, 2)->nullable();
            $table->integer('daysPending')->nullable();
            $table->integer('canc_type')->nullable();
            $table->integer('orig_mod_id')->nullable();
            $table->decimal('price_30', 8, 2);
            $table->decimal('price_7', 8, 2);
            $table->decimal('price_1', 8, 2);
            $table->integer('machine_model_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
