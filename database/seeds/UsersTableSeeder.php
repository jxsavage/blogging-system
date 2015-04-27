<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

    static private $count = 75;
    public static function getQuantity()
    {
        return static::$count;
    }
    public function run()
    {

        $faker = Faker\Factory::create();

        App\User::create([
            'first_name'    => 'blog',
            'last_name'     => 'owner',
            'user_name'     => 'owner',
            'email'         => 'owner@blog.com',
            'password'      => Hash::make('secret'),
        ]);

        for( $x=0; $x < static::$count; $x++ )
        {
            App\User::create([
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'user_name'     => $faker->unique()->userName,
            'email'         => $faker->unique()->email,
            'password'      => Hash::make('secret'),
            ]);
        }
        //TestDummy::times(static::$quantity)->create('user');
    }

}
