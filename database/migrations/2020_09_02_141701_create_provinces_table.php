<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
        });

        //Insertar datos
        DB::table('provinces')->insert(
            array(
                array('id' => 1, 'value' => 'Buenos Aires'),
                array('id' => 2, 'value' => 'Catamarca'),
                array('id' => 3, 'value' => 'Chaco'),
                array('id' => 4, 'value' => 'Chubut'),
                array('id' => 5, 'value' => 'Ciudad Autónoma de Buenos Aires'),
                array('id' => 6, 'value' => 'Córdoba'),
                array('id' => 7, 'value' => 'Corrientes'),
                array('id' => 8, 'value' => 'Entre Ríos'),
                array('id' => 9, 'value' => 'Formosa'),
                array('id' => 10, 'value' => 'Jujuy'),
                array('id' => 11, 'value' => 'La Pampa'),
                array('id' => 12, 'value' => 'La Rioja'),
                array('id' => 13, 'value' => 'Mendoza'),
                array('id' => 14, 'value' => 'Misiones'),
                array('id' => 15, 'value' => 'Neuquén'),
                array('id' => 16, 'value' => 'Río Negro'),
                array('id' => 17, 'value' => 'Salta'),
                array('id' => 18, 'value' => 'San Juan'),
                array('id' => 19, 'value' => 'San Luis'),
                array('id' => 20, 'value' => 'Santa Cruz'),
                array('id' => 21, 'value' => 'Santa Fe'),
                array('id' => 22, 'value' => 'Santiago del Estero'),
                array('id' => 23, 'value' => 'Tierra del Fuego, Antártida e Islas del Atlántico Sur'),
                array('id' => 24, 'value' => 'Tucumán')
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
        Schema::dropIfExists('provinces');
    }
}
