<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('client_id')->index();
            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('email')->unique();
            $table->string('cell_phone')->unique();
            $table->string('phone');
            $table->string('extension');
            $table->longText('comment')->nullable();
            $table->integer('deactivate')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
