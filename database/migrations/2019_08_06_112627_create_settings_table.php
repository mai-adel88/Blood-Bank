<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('facebook_social'); 
			$table->string('twitter_social');
			$table->string('google_plus');
			$table->string('instagram');
			$table->string('whatsapp');
			$table->string('youtupe');
			$table->longText('about_app');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}