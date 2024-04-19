<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('legal_name', 100)->unique();
            $table->string('commercial_name', 100)->nullable();
            $table->integer('industry_id')->nullable()->index();
            $table->double('cuit_num', 11, 0)->unique();
            $table->string('vat_status');
            $table->string('payment_terms');
            $table->decimal('sales_tax_rate', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
