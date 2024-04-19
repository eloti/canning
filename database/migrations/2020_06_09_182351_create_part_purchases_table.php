<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('part_id')->index();
            $table->integer('supplier_id')->index();
            $table->integer('quantity');
            $table->decimal('unit_price_ARS', 8, 2);
            $table->integer('acum_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_purchases');
    }
}
