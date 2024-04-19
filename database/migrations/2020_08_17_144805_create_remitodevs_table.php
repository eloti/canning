<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemitodevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remitodevs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('remito_num')->unique();
            $table->integer('rental_id')->index();
            $table->string('remito_type');
            $table->dateTime('date_time_dispatch', 0)->nullable();
            $table->string('hourmeter')->nullable();
            $table->integer('unit_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remitodevs');
    }
}
