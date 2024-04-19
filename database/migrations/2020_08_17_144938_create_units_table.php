<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('machine_model_id')->index();
            $table->string('unit_number')->unique();
            $table->string('series_number');
            $table->decimal('purchase_value', 8, 0);
            $table->year('model_year');
            $table->date('purchase_date');
            $table->date('discharged_at')->nullable();
            $table->integer('branch_id')->index();
            $table->date('incorp_date');
            $table->integer('initial_hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
