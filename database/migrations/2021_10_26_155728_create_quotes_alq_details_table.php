<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesAlqDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_alq_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('quote_id')->index();
            $table->integer('branch_id')->index();
            $table->integer('family_id')->index();
            $table->integer('subfamily_id')->index();
            $table->integer('machine_model_id')->index();
            $table->integer('days');
            $table->string('period');
            $table->decimal('list_price', 10, 2)->nullable();
            $table->decimal('full_price', 10, 2)->nullable();
            $table->decimal('transport_price', 10, 2)->nullable();            
            $table->decimal('of_price', 10, 2);
            $table->decimal('of_transport_price', 10, 2);
            $table->string('VAT')->nullable();
            $table->string('delivery')->nullable();
            $table->string('warranty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_alq_details');
    }
}
