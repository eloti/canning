<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecordsToCountiesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('counties')->insert(
            array(
                array('id' => 526, 'province_id' => '25', 'value' => 'MONTEVIDEO'),
                array('id' => 527, 'province_id' => '25', 'value' => 'ARTIGAS'),
                array('id' => 528, 'province_id' => '25', 'value' => 'CANELONES'),
                array('id' => 529, 'province_id' => '25', 'value' => 'CERRO LARGO'),
                array('id' => 530, 'province_id' => '25', 'value' => 'COLONIA'),
                array('id' => 531, 'province_id' => '25', 'value' => 'DURAZNO'),
                array('id' => 532, 'province_id' => '25', 'value' => 'FLORES'),
                array('id' => 533, 'province_id' => '25', 'value' => 'FLORIDA'),
                array('id' => 534, 'province_id' => '25', 'value' => 'LAVALLEJA'),
                array('id' => 535, 'province_id' => '25', 'value' => 'MALDONADO'),
                array('id' => 536, 'province_id' => '25', 'value' => 'PAYSANDU'),
                array('id' => 537, 'province_id' => '25', 'value' => 'RIO NEGRO'),
                array('id' => 538, 'province_id' => '25', 'value' => 'RIVERA'),
                array('id' => 539, 'province_id' => '25', 'value' => 'ROCHA'),
                array('id' => 540, 'province_id' => '25', 'value' => 'SALTO'),
                array('id' => 541, 'province_id' => '25', 'value' => 'SAN JOSE'),
                array('id' => 542, 'province_id' => '25', 'value' => 'SORIANO'),
                array('id' => 543, 'province_id' => '25', 'value' => 'TACUAREMBO'),
                array('id' => 544, 'province_id' => '25', 'value' => 'TREINTA Y TRES')
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
        Schema::table('counties_table_1', function (Blueprint $table) {
            //
        });
    }
}
