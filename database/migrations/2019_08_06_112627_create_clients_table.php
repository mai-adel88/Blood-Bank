<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email');
			$table->string('name');
			$table->date('d_o_b');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned()->nullable();
			$table->string('password');
			$table->string('phone');
			$table->string('api_token', 60)->unique()->nullable();
			$table->integer('pin_code')->nullable();
			$table->boolean('is_active')->default(1);
            $table->string('remember_token', 100)->nullable();

		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
