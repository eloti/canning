<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('unit_id')->index();
            $table->integer('service_id')->index();
            $table->longText('description');
            $table->decimal('amount_ARS', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_expenses');
    }
}
