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
                App\Role::truncate();
                App\RoleUser::truncate();
                App\Tag::truncate();
                App\ArticleTag::truncate();
                App\ArticlePicture::truncate();
                App\Article::truncate();
                App\User::truncate();
                
                $this->call('UsersTableSeeder');
		$this->call('ArticlesTableSeeder');
                $this->call('ArticlePicturesTableSeeder');
                $this->call('ArticleTagsTableSeeder');
                $this->call('TagsTableSeeder');
                $this->call('RoleUserTableSeeder');
                $this->call('RolesTableSeeder');
                
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                
                
	}

}
