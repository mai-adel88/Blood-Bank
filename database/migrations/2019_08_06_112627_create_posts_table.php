<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('title');
			$table->longText('content');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->string('image')->nullable();

		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}