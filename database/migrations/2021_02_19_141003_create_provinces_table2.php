<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable2 extends Migration
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
            $table->integer('country_id')->index();
            $table->string('value');
        });

        //Insertar datos
        DB::table('provinces')->insert(
            array(
                array('id' => 1,'country_id'=> 1,'value' => 'Buenos Aires'),
                array('id' => 2,'country_id'=> 1,'value' => 'Catamarca'),
                array('id' => 3,'country_id'=> 1,'value' => 'Chaco'),
                array('id' => 4,'country_id'=> 1,'value' => 'Chubut'),
                array('id' => 5,'country_id'=> 1,'value' => 'Ciudad Autónoma de Buenos Aires'),
                array('id' => 6,'country_id'=> 1,'value' => 'Córdoba'),
                array('id' => 7,'country_id'=> 1,'value' => 'Corrientes'),
                array('id' => 8,'country_id'=> 1,'value' => 'Entre Ríos'),
                array('id' => 9,'country_id'=> 1,'value' => 'Formosa'),
                array('id' => 10,'country_id'=> 1,'value' => 'Jujuy'),
                array('id' => 11,'country_id'=> 1,'value' => 'La Pampa'),
                array('id' => 12,'country_id'=> 1,'value' => 'La Rioja'),
                array('id' => 13,'country_id'=> 1,'value' => 'Mendoza'),
                array('id' => 14,'country_id'=> 1,'value' => 'Misiones'),
                array('id' => 15,'country_id'=> 1,'value' => 'Neuquén'),
                array('id' => 16,'country_id'=> 1,'value' => 'Río Negro'),
                array('id' => 17,'country_id'=> 1,'value' => 'Salta'),
                array('id' => 18,'country_id'=> 1,'value' => 'San Juan'),
                array('id' => 19,'country_id'=> 1,'value' => 'San Luis'),
                array('id' => 20,'country_id'=> 1,'value' => 'Santa Cruz'),
                array('id' => 21,'country_id'=> 1,'value' => 'Santa Fe'),
                array('id' => 22,'country_id'=> 1,'value' => 'Santiago del Estero'),
                array('id' => 23,'country_id'=> 1,'value' => 'Tierra del Fuego, Antártida e Islas del Atlántico Sur'),
                array('id' => 24,'country_id'=> 1,'value' => 'Tucumán'),
                array('id' => 25,'country_id'=> 2,'value' => '')
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
        Schema::dropIfExists('provinces_table2');
    }
}
