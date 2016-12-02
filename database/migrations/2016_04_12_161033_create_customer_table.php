<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('tel')->default(NULL);
            $table->integer('id_zone')->unsigned();
            $table->foreign('id_zone')->references('id')->on('zones');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id')->on('groups');    
            $table->integer('amount')->default(0);
            $table->double('price')->default(0);
            $table->enum('status', ['0', '1','2'])->default('0');
            $table->enum('vat', ['yes', 'no'])->default('no');
            $table->enum('type', ['cash', 'credit'])->default('cash');
            $table->double('lat',15 ,8)->default(0);
            $table->double('long',15 ,8)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
