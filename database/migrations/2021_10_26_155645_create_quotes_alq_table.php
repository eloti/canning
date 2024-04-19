<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesAlqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_alq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('client_id')->index();
            $table->integer('contact_id')->index();
            $table->integer('address_id')->nullable()->index();
            $table->integer('user_id')->index();
            $table->date('date');
            $table->integer('validez'); 
            $table->integer('quote_curr'); 
            $table->string('payment_terms'); 
            $table->string('terms_desc')->nullable();
            $table->string('quote_type')->nullable();
            $table->string('status')->nullable();
            $table->string('reason')->nullable();
            $table->string('comments')->nullable();
            $table->date('def_date')->nullable();
            $table->integer('prev_quote_id')->nullable();
            $table->string('obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_alq');
    }
}
