<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coti_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('coti_id')->unsigned()->index();
            $table->integer('item');
            $table->string('description', 382);
            $table->string('power')->nullable();
            $table->string('regime')->nullable();
            $table->string('units');
            $table->integer('cant');
            $table->string('frequency')->nullable();
            $table->decimal('list_price', 10, 2)->nullable();
            $table->decimal('of_price', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coti_det');
    }
};
