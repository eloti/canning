<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('machine_model_id')->index();
            $table->integer('branch_id')->index();
            $table->decimal('price_30', 8, 0);
            $table->decimal('price_7', 8, 0);
            $table->decimal('price_1', 8, 0);
            $table->decimal('price_transport', 8, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
