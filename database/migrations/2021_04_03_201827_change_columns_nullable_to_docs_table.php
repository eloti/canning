<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsNullableToDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->string('CantReg')->nullable()->change();
            $table->string('PtoVta')->nullable()->change();
            $table->string('Concepto')->nullable()->change();
            $table->string('DocTipo')->nullable()->change();
            $table->string('DocNro')->nullable()->change();
            $table->string('CbteDesde')->nullable()->change();
            $table->string('CbteHasta')->nullable()->change();
            $table->string('MonId')->nullable()->change();
            $table->string('MonCotiz')->nullable()->change();
            $table->string('afip')->nullable()->change();
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
