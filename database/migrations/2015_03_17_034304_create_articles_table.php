<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('meta_keywords');
                        $table->string('meta_description');
                        $table->string('title');
                        $table->text('content');
                        $table->integer('user_id')->unsigned();
                        $table->dateTime('publish_on');
			$table->timestamps();
		});

                Schema::table('articles', function(Blueprint $table){
                    $table->foreign('user_id')->references('id')->on('users');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
