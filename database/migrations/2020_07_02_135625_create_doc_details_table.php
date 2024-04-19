<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('doc_id')->unsigned()->index();
            $table->integer('item');
            $table->string('currency');
            $table->decimal('gross_curr', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('discount_curr', 10, 2);
            $table->decimal('net_curr', 10, 2);
            $table->decimal('x_rate', 10, 2);
            $table->decimal('gross_ARS', 10, 2);
            $table->decimal('discount_ARS', 10, 2);
            $table->decimal('net_ARS', 10, 2);
            $table->decimal('vat_rate', 10, 2);
            $table->decimal('vat_ARS', 10, 2);
            $table->decimal('ret_IIBB_rate', 10, 2);
            $table->decimal('ret_IIBB_ARS', 10, 2);
            $table->decimal('total_ARS', 10, 2);       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_details');
    }
}
