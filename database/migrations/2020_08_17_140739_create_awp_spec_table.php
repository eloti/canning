<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwpSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awp_spec', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('machine_model_id')->index();
            $table->decimal('machine_length', 8, 2);
            $table->decimal('machine_width', 8, 2);
            $table->decimal('machine_height', 8, 2);
            $table->decimal('machine_weight', 8, 0);
            $table->decimal('platform_height', 8, 2);
            $table->decimal('horizontal_outreach', 8, 2)->nullable();
            $table->decimal('working_height', 8, 2);
            $table->decimal('platform_capacity', 8, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awp_spec');
    }
}
