<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('machine_model_id')->index();
            $table->decimal('awp_machine_length_m', 8, 2)->nullable();
            $table->decimal('awp_machine_width_m', 8, 2)->nullable();
            $table->decimal('awp_machine_height_m', 8, 2)->nullable();
            $table->decimal('awp_machine_weight_kg', 8, 0)->nullable();
            $table->decimal('awp_platform_height_m', 8, 2)->nullable();
            $table->decimal('awp_horizontal_outreach_m', 8, 2)->nullable();
            $table->decimal('awp_working_height_m', 8, 2)->nullable();
            $table->decimal('awp_platform_capacity_kg', 8, 0)->nullable();
            $table->decimal('gen_power_kVA', 8, 1)->nullable();
            $table->decimal('lt_height_m', 8, 2)->nullable();
            $table->string('lt_lamps')->nullable();
            $table->decimal('lt_tank_capacity_liters', 8, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specs');
    }
}
