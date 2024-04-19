<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->string('afip')->default('N');
            $table->string('CbteTipo')->nullable();
            $table->decimal('ImpNeto', 10, 2)->nullable();
            $table->decimal('Iva27', 10, 2)->nullable();
            $table->decimal('Iva21', 10, 2)->nullable();
            $table->decimal('Iva10', 10, 2)->nullable();
            $table->decimal('Iva5', 10, 2)->nullable();
            $table->decimal('Iva2', 10, 2)->nullable();
            $table->decimal('Iva0', 10, 2)->nullable();
            $table->decimal('ImpTrib', 10, 2)->nullable();
            $table->decimal('ImpTotal', 10, 2)->nullable();         
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
