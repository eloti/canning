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
        Schema::create('opcionales', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Desc')->nullable();
        });

        //Insertar datos
        DB::table('opcionales')->insert(
            array(
                array('Id' => 2101, 'Desc' => 'Factura de Crédito Electrónica MiPyMEs (FCE) - CBU del Emisor'),
                array('Id' => 27, 'Desc' => 'Factura de Crédito Electrónica MiPyMEs (FCE) - Transferencia'),
                array('Id' => 22, 'Desc' => 'Factura de Crédito Electrónica MiPyMEs (FCE) - Anulación'),
                array('Id' => 23, 'Desc' => 'Factura de Crédito Electrónica MiPyMEs (FCE) - Referencia Comercial'),
                array('Id' => 2102, 'Desc' => 'Factura de Crédito Electrónica MiPyMEs (FCE) - Alias del Emisor')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcionales');
    }
};
