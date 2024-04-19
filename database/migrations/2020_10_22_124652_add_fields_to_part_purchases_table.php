<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPartPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('part_purchases', function (Blueprint $table) {
            $table->integer('part_brand_id')->index()->nullable();
            $table->integer('cat_code_1_id')->index()->nullable();
            $table->integer('cat_code_2_id')->index()->nullable();
            $table->integer('cat_code_3_id')->index()->nullable();
            $table->string('ident');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('part_purchases', function (Blueprint $table) {
            $table->dropColumn('part_brand_id');
            $table->dropColumn('cat_code_1_id');
            $table->dropColumn('cat_code_2_id');
            $table->dropColumn('cat_code_3_id');
            $table->dropColumn('ident');
        });
    }
}
