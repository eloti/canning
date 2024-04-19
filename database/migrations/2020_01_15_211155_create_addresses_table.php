<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('client_id')->index();
            $table->string('line1', 100)->nullable();
            $table->string('line2',  100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('county', 50)->nullable();
            $table->string('province', 50)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
