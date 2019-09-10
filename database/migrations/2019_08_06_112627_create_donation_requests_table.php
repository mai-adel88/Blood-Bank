<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('full_name');
			$table->string('phone');
			$table->integer('blood_type_id')->unsigned();
			$table->tinyInteger('age');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->integer('num_of_bag');
			$table->text('notes');
			$table->decimal('latitude')->nullable();
			$table->decimal('longitude')->nullable();
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}