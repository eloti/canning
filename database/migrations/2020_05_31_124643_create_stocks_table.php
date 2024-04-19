<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('part_id')->index();
            $table->string('ident');
            $table->string('type');
            $table->date('date');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('x_rate', 8, 2);
            $table->decimal('unit_price_usd', 8, 2);
            $table->decimal('total_purchase', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
