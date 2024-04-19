<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRemitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remitos', function (Blueprint $table) {
            $table->date('dispatch_date')->nullable();
            $table->time('dispatch_time')->nullable();
            $table->integer('contact_id')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remitos', function (Blueprint $table) {
            //
        });
    }
}
