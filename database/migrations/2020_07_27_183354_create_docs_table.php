<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->integer('type_doc');
            $table->string('num_doc')->nullable();
            $table->integer('client_id')->index();
            $table->decimal('total', 10, 2);
            $table->decimal('x_rate', 10, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->integer('rental_id')->nullable()->index();
            $table->integer('unit_id')->nullable()->index();
            $table->integer('remito_id')->nullable()->index();
            $table->integer('op_id')->nullable()->index();
            $table->integer('application')->nullable();
            $table->string('receipt')->nullable();
            $table->date('cred_date')->nullable();
            $table->integer('cred')->nullable();
            $table->decimal('saldo', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs');
    }
}
