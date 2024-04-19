<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuoteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('quote_id')->index();
            $table->integer('machine_model_id')->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days');
            $table->string('currency');
            $table->decimal('list_fee', 10, 2);
            $table->decimal('offer_fee', 10, 2);
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
