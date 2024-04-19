<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReceptionDataAndTimeToRemitodevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remitodevs', function (Blueprint $table) {
                $table->date('reception_date')->nullable();
                $table->time('reception_time')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remitodevs', function (Blueprint $table) {
            //
        });
    }
}
