<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('doc_id')->index();
            $table->integer('IDTRIB'); //nac, prov, etc
            $table->string('DESC'); //IIGG, IIBB, IVA, etc
            $table->string('detalle'); //descripción para la factura
            $table->decimal('BaseImp', 10, 2);
            $table->decimal('Alic', 10, 2);
            $table->decimal('Importe', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tributos');
    }
}
