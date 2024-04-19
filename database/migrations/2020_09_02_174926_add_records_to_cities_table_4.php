<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecordsToCitiesTable4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('cities')->insert(
            array(
                array('id' => 4001, 'county_id' => '509', 'value' => 'EL NARANJO'),
                array('id' => 4002, 'county_id' => '509', 'value' => 'GARMENDIA'),
                array('id' => 4003, 'county_id' => '509', 'value' => 'LA RAMADA'),
                array('id' => 4004, 'county_id' => '509', 'value' => 'MACOMITAS'),
                array('id' => 4005, 'county_id' => '509', 'value' => 'PIEDRABUENA'),
                array('id' => 4006, 'county_id' => '509', 'value' => 'VILLA BENJAMIN ARAOZ'),
                array('id' => 4007, 'county_id' => '509', 'value' => 'VILLA BURRUYACU'),
                array('id' => 4008, 'county_id' => '509', 'value' => 'VILLA PADRE MONTI'),
                array('id' => 4009, 'county_id' => '510', 'value' => 'SAN MIGUEL DE TUCUMAN'),
                array('id' => 4010, 'county_id' => '511', 'value' => 'ALPACHIRI'),
                array('id' => 4011, 'county_id' => '511', 'value' => 'ALTO VERDE'),
                array('id' => 4012, 'county_id' => '511', 'value' => 'ARCADIA'),
                array('id' => 4013, 'county_id' => '511', 'value' => 'CONCEPCION'),
                array('id' => 4014, 'county_id' => '511', 'value' => 'ILTICO'),
                array('id' => 4015, 'county_id' => '511', 'value' => 'LA TRINIDAD'),
                array('id' => 4016, 'county_id' => '511', 'value' => 'MEDINA'),
                array('id' => 4017, 'county_id' => '511', 'value' => 'SAN ROQUE'),
                array('id' => 4018, 'county_id' => '512', 'value' => 'ALDERETES'),
                array('id' => 4019, 'county_id' => '512', 'value' => 'BANDA DEL RIO SALI'),
                array('id' => 4020, 'county_id' => '512', 'value' => 'BARRIO AEROPUERTO'),
                array('id' => 4021, 'county_id' => '512', 'value' => 'COLOMBRES'),
                array('id' => 4022, 'county_id' => '512', 'value' => 'COLONIA MAYO - BARRIO LA MILAGROSA'),
                array('id' => 4023, 'county_id' => '512', 'value' => 'EL BRACHO'),
                array('id' => 4024, 'county_id' => '512', 'value' => 'EL CORTE'),
                array('id' => 4025, 'county_id' => '512', 'value' => 'EL PARAISO'),
                array('id' => 4026, 'county_id' => '512', 'value' => 'EX INGENIO ESPERANZA'),
                array('id' => 4027, 'county_id' => '512', 'value' => 'EX INGENIO LOS RALOS'),
                array('id' => 4028, 'county_id' => '512', 'value' => 'EX INGENIO LUJAN'),
                array('id' => 4029, 'county_id' => '512', 'value' => 'INGENIO LA FLORIDA'),
                array('id' => 4030, 'county_id' => '512', 'value' => 'LA FLORIDA'),
                array('id' => 4031, 'county_id' => '512', 'value' => 'LAS CEJAS'),
                array('id' => 4032, 'county_id' => '512', 'value' => 'LASTENIA'),
                array('id' => 4033, 'county_id' => '512', 'value' => 'LOS GUTIERREZ'),
                array('id' => 4034, 'county_id' => '512', 'value' => 'PACARA'),
                array('id' => 4035, 'county_id' => '512', 'value' => 'RANCHILLOS'),
                array('id' => 4036, 'county_id' => '512', 'value' => 'SAN ANDRES'),
                array('id' => 4037, 'county_id' => '512', 'value' => 'VILLA RECASTE'),
                array('id' => 4038, 'county_id' => '512', 'value' => 'VILLA TERCERA'),
                array('id' => 4039, 'county_id' => '513', 'value' => 'BARRIO CASA ROSADA'),
                array('id' => 4040, 'county_id' => '513', 'value' => 'CAMPO DE HERRERA'),
                array('id' => 4041, 'county_id' => '513', 'value' => 'EX INGENIO NUEVA BAVIERA'),
                array('id' => 4042, 'county_id' => '513', 'value' => 'FAMAILLA'),
                array('id' => 4043, 'county_id' => '513', 'value' => 'INGENIO FRONTERITA'),
                array('id' => 4044, 'county_id' => '514', 'value' => 'GRANEROS'),
                array('id' => 4045, 'county_id' => '514', 'value' => 'LAMADRID'),
                array('id' => 4046, 'county_id' => '514', 'value' => 'TACO RALO'),
                array('id' => 4047, 'county_id' => '515', 'value' => 'JUAN BAUTISTA ALBERDI'),
                array('id' => 4048, 'county_id' => '515', 'value' => 'VILLA BELGRANO'),
                array('id' => 4049, 'county_id' => '516', 'value' => 'LA COCHA'),
                array('id' => 4050, 'county_id' => '516', 'value' => 'SAN JOSE DE LA COCHA'),
                array('id' => 4051, 'county_id' => '517', 'value' => 'BELLA VISTA'),
                array('id' => 4052, 'county_id' => '517', 'value' => 'ESTACION ARAOZ'),
                array('id' => 4053, 'county_id' => '517', 'value' => 'LOS PUESTOS'),
                array('id' => 4054, 'county_id' => '517', 'value' => 'MANUEL GARCIA FERNANDEZ'),
                array('id' => 4055, 'county_id' => '517', 'value' => 'PALA PALA'),
                array('id' => 4056, 'county_id' => '517', 'value' => 'RIO COLORADO'),
                array('id' => 4057, 'county_id' => '517', 'value' => 'SANTA ROSA DE LEALES'),
                array('id' => 4058, 'county_id' => '517', 'value' => 'VILLA DE LEALES'),
                array('id' => 4059, 'county_id' => '517', 'value' => 'VILLA FIAD - INGENIO LEALES'),
                array('id' => 4060, 'county_id' => '518', 'value' => 'BARRIO ARAUJO'),
                array('id' => 4061, 'county_id' => '518', 'value' => 'BARRIO SAN FELIPE'),
                array('id' => 4062, 'county_id' => '518', 'value' => 'EL MANANTIAL'),
                array('id' => 4063, 'county_id' => '518', 'value' => 'INGENIO SAN PABLO'),
                array('id' => 4064, 'county_id' => '518', 'value' => 'LA REDUCCION'),
                array('id' => 4065, 'county_id' => '518', 'value' => 'LULES'),
                array('id' => 4066, 'county_id' => '519', 'value' => 'ACHERAL'),
                array('id' => 4067, 'county_id' => '519', 'value' => 'CAPITAN CACERES'),
                array('id' => 4068, 'county_id' => '519', 'value' => 'MONTEROS'),
                array('id' => 4069, 'county_id' => '519', 'value' => 'PUEBLO INDEPENDENCIA'),
                array('id' => 4070, 'county_id' => '519', 'value' => 'RIO SECO'),
                array('id' => 4071, 'county_id' => '519', 'value' => 'SANTA LUCIA'),
                array('id' => 4072, 'county_id' => '519', 'value' => 'SARGENTO MOYA'),
                array('id' => 4073, 'county_id' => '519', 'value' => 'SOLDADO MALDONADO'),
                array('id' => 4074, 'county_id' => '519', 'value' => 'TENIENTE BERDINA'),
                array('id' => 4075, 'county_id' => '519', 'value' => 'VILLA QUINTEROS'),
                array('id' => 4076, 'county_id' => '520', 'value' => 'AGUILARES'),
                array('id' => 4077, 'county_id' => '520', 'value' => 'INGENIO SANTA BARBARA'),
                array('id' => 4078, 'county_id' => '520', 'value' => 'LOS SARMIENTOS'),
                array('id' => 4079, 'county_id' => '520', 'value' => 'RIO CHICO'),
                array('id' => 4080, 'county_id' => '520', 'value' => 'SANTA ANA'),
                array('id' => 4081, 'county_id' => '520', 'value' => 'VILLA CLODOMIRO HILERET'),
                array('id' => 4082, 'county_id' => '521', 'value' => 'ATAHONA'),
                array('id' => 4083, 'county_id' => '521', 'value' => 'MONTEAGUDO'),
                array('id' => 4084, 'county_id' => '521', 'value' => 'NUEVA TRINIDAD'),
                array('id' => 4085, 'county_id' => '521', 'value' => 'SANTA CRUZ'),
                array('id' => 4086, 'county_id' => '521', 'value' => 'SIMOCA'),
                array('id' => 4087, 'county_id' => '521', 'value' => 'VILLA CHICLIGASTA'),
                array('id' => 4088, 'county_id' => '522', 'value' => 'AMAICHA DEL VALLE'),
                array('id' => 4089, 'county_id' => '522', 'value' => 'COLALAO DEL VALLE'),
                array('id' => 4090, 'county_id' => '522', 'value' => 'EL MOLLAR'),
                array('id' => 4091, 'county_id' => '522', 'value' => 'TAFI DEL VALLE'),
                array('id' => 4092, 'county_id' => '523', 'value' => 'BARRIO EL CRUCE'),
                array('id' => 4093, 'county_id' => '523', 'value' => 'BARRIO LOMAS DE TAFI'),
                array('id' => 4094, 'county_id' => '523', 'value' => 'BARRIO MUTUAL SAN MARTIN'),
                array('id' => 4095, 'county_id' => '523', 'value' => 'BARRIO PARADA 14'),
                array('id' => 4096, 'county_id' => '523', 'value' => 'BARRIO U.T.A. II'),
                array('id' => 4097, 'county_id' => '523', 'value' => 'DIAG. NORTE - LUZ Y FUERZA - LOS POCITOS'),
                array('id' => 4098, 'county_id' => '523', 'value' => 'EL CADILLAL'),
                array('id' => 4099, 'county_id' => '523', 'value' => 'TAFI VIEJO'),
                array('id' => 4100, 'county_id' => '523', 'value' => 'VILLA LAS FLORES'),
                array('id' => 4101, 'county_id' => '523', 'value' => 'VILLA MARIANO MORENO - EL COLMENAR'),
                array('id' => 4102, 'county_id' => '524', 'value' => 'CHOROMORO'),
                array('id' => 4103, 'county_id' => '524', 'value' => 'SAN PEDRO DE COLALAO'),
                array('id' => 4104, 'county_id' => '524', 'value' => 'VILLA DE TRANCAS'),
                array('id' => 4105, 'county_id' => '525', 'value' => 'BARRIO SAN JOSE III'),
                array('id' => 4106, 'county_id' => '525', 'value' => 'COUNTRY JOCKEY CLUB'),
                array('id' => 4107, 'county_id' => '525', 'value' => 'EX INGENIO SAN JOSE'),
                array('id' => 4108, 'county_id' => '525', 'value' => 'VILLA CARMELA'),
                array('id' => 4109, 'county_id' => '525', 'value' => 'YERBA BUENA - MARCOS PAZ')
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
        Schema::table('cities_table_4', function (Blueprint $table) {
            //
        });
    }
}
