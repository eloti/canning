<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ident');
            $table->string('cat_code_1')->nullable();
            $table->string('cat_code_2')->nullable();
            $table->string('cat_code_3')->nullable();
            $table->integer('part_brand_id')->index();
            $table->longText('description')->nullable();
            $table->string('dimension')->nullable();
            $table->integer('inv_received')->nullable();
            $table->integer('inv_shipped')->nullable();
            $table->integer('inv_on_hand')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
