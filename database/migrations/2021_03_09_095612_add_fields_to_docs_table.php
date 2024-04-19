<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->integer('CantReg')->default(1);
            $table->integer('PtoVta');
            $table->integer('Concepto');
            $table->integer('DocTipo');
            $table->double('DocNro', 11, 0);
            $table->integer('CbteDesde')->default(1);
            $table->integer('CbteHasta')->default(1);
            $table->string('MonId');
            $table->integer('MonCotiz')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docs', function (Blueprint $table) {
            //
        });
    }
}
