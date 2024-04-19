<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_rates', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->integer('month');
            $table->integer('year');
            $table->string('mmyyyy');
            $table->decimal('avg', 10, 2);
            $table->decimal('cierre_comp', 10, 2);
            $table->decimal('cierre_vend', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('x_rates');
    }
}


