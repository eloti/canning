<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('family_id')->index();
            $table->integer('subfamily_id')->index();
            $table->integer('brand_id')->index();
            $table->string('value');
            $table->integer('mod_alt_1')->nullable();
            $table->integer('mod_alt_2')->nullable();
            $table->integer('mod_alt_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_models');
    }
}
