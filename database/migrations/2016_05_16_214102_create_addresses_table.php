<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //TODO cannot migrate addressess
        Schema::create('addresses', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 20);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address_1', 100);
            $table->string('address_2', 100)->nullable();
            $table->string('city', 50);
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('zip', 10);
            $table->string('phone', 20);
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
        Schema::drop('addresses');
    }
}
