<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		App\ArticleTag::truncate();
		App\ArticlePicture::truncate();
		App\RoleUser::truncate();
		App\Role::truncate();
        App\Tag::truncate();
        App\Article::truncate();
        App\User::truncate();

        $this->call('UsersTableSeeder');
		$this->call('ArticlesTableSeeder');
        $this->call('ArticlePicturesTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('ArticleTagsTableSeeder');
		$this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
	}

}
