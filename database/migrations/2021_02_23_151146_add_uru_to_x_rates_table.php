<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUruToXRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_rates', function (Blueprint $table) {
            $table->decimal('avg_uy', 10, 2);
            $table->decimal('cierre_comp_uy', 10, 2);
            $table->decimal('cierre_vend_uy', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_rates', function (Blueprint $table) {
            //
        });
    }
}
