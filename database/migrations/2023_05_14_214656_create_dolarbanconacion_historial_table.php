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
        Schema::create('dolarbanconacion_historial', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Compra', 50)->nullable();
            $table->string('Venta', 50)->nullable();
            $table->date('Fecha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dolarbanconacion_historial');
    }
};
