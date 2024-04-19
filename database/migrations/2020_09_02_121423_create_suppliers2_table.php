<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('legal_name', 100)->unique();
            $table->string('commercial_name', 100)->nullable();
            $table->double('cuit_num', 11, 0)->unique();
            $table->string('vat_status');
            $table->string('payment_terms');
            $table->decimal('sales_tax_rate', 10, 2);
            $table->string('line1', 100)->nullable();
            $table->string('line2',  100)->nullable();
            $table->integer('city_id')->index()->nullable();
            $table->integer('county_id')->index()->nullable();
            $table->integer('province_id')->index();
            $table->string('zip_code', 8)->nullable();
            $table->string('country', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers2');
    }
}
