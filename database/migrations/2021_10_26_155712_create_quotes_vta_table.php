<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesVtaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_vta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('client_id')->index();
            $table->integer('contact_id')->index();
            $table->integer('address_id')->index();
            $table->integer('user_id')->index();
            $table->date('date');
            $table->integer('validez'); 
            $table->integer('quote_curr'); 
            $table->string('payment_terms'); 
            $table->string('terms_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_vta');
    }
}
