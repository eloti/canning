<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesVtaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_vta_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('family_id')->index();
            $table->integer('subfamily_id')->index();
            $table->integer('machine_model_id')->index();
            $table->decimal('list_price', 10, 2)->nullable();       
            $table->decimal('of_price', 10, 2);  
            $table->integer('quote_id')->index();
            $table->string('VAT')->nullable();
            $table->string('delivery')->nullable();
            $table->string('warranty')->nullable();
            $table->string('condition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_vta_details');
    }
}
