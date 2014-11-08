<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGig extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('gigs', function($table){
            $table->increments('id');
            $table->string('gig_name',128);
            $table->string('client_name', 128);
            $table->string('phone', 128);
            $table->string('email', 128);
            $table->string('gig_date', 128);
            $table->string('employee1', 128);
            $table->string('employee2', 128);
            $table->string('employee3', 128);
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
        Schema::drop('gigs');
    }

}
