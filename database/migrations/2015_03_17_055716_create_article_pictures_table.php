<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_pictures', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->string('url');
			$table->string('alt');
			$table->string('caption');
		});
        Schema::table('article_pictures', function(Blueprint $table)
		{
			$table->foreign('article_id')->references('id')->on('articles');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_pictures');
	}

}
