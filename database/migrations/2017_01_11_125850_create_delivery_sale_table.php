<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverySaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_salses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned();
            $table->integer('status');
            $table->text('remark')->nullable();
            $table->date('transaction_date')->nullable();
            $table->dateTime('transaction_complete_datetime')->nullable();
            $table->integer('count_print')->nullable();
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_salses');
    }
}
