<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;



class ArticlesTableSeeder extends Seeder {

    private static $count = 100;

    public static function getQuantity()
    {
        return static::$count;
    }

    public function run()
     {

         $faker = Faker\Factory::create();

         $userCount = UsersTableSeeder::getQuantity();

         for( $x=0; $x<static::$count; $x++)
         {
             App\Article::create([
                'meta_description'  => $faker->sentence,
                'title'             => $faker->sentence,
                'title_slug'        => $faker->unique()->word,
                'content'           => $faker->paragraph,
                'user_id'           => $faker->numberBetween(1, $userCount),
                'publish_on'        => $faker->dateTimeBetween
                                                ($startDate = '-5 years',
                                                   $endDate = '+2 years')
                                                    ->format('m/d/Y h:i A'),
            ]);
         }
         //TestDummy::times(static::$quantity)->create('user');
     }

}
