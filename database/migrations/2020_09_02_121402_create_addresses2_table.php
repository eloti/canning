<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddresses2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('client_id')->index();
            $table->string('line1', 100)->nullable();
            $table->string('line2',  100)->nullable();
            $table->integer('city_id')->index()->nullable();
            $table->integer('county_id')->index()->nullable();
            $table->integer('province_id')->index();
            $table->string('zip_code', 8)->nullable();
            $table->string('country', 50)->nullable();
            $table->integer('billing_address')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses2');
    }
}
