<?php 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$faker = Faker\Generator();

$faker->generator()->addProvider(new Faker\Provider\Lorem($faker->generator()));
//$faker->generator()->addProvider(new Faker\Provider\Image($faker->generator()));
//$faker->generator()->addProvider(new Faker\Provider\Person($faker->generator()));
//$faker->generator()->addProvider(new Faker\Provider\Company($faker->generator()));
//$faker->generator()->addProvider(new Faker\Provider\Internet($faker->generator()));
//$faker->generator()->addProvider(new Faker\Provider\DateTime($faker->generator()));
//$faker->addProvider(new Faker\Provider\Lorem($faker));
//$faker->addProvider(new Faker\Provider\Image($faker));
//$faker->addProvider(new Faker\Provider\Person($faker));
//$faker->addProvider(new Faker\Provider\Company($faker));
//$faker->addProvider(new Faker\Provider\Internet($faker));
//$faker->addProvider(new Faker\Provider\DateTime($faker));

$numArticles    = ArticlesTableSeeder::getQuantity();
$numUsers       = UsersTableSeeder::getQuantity();
$numRoles       = RolesTableSeeder::getQuantity();
$numTags        = TagsTableSeeder::getQuantity();

$factory('App\Article', [
    'meta_keywords'     => implode(' ', $faker->words($nb = dd($faker->numberBetween(3, 10)))),
    'meta_description'  => $faker->sentence,
    'title'             => $faker->sentence,
    'content'           => $faker->paragraph,
    'status'            => $faker->generator()->numberBetween(1,2),
    'user_id'           => $faker->generator()->numberBetween(1, $numUsers),
    'published_on'      => $faker->generator()->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
    'publish_on'        => $faker->generator()->dateTimeBetween($startDate = '-5 years', $endDate = '+2 years'),
]);

$factory('App\BlogPicture', [
    'article_id'    => $faker->generator()->numberBetween(1, $numArticles),
    'url'           => $faker->generator()->imageUrl($width = 640, $height = 480),
]);

$factory('App\BlogTag', [
    'article_id'    => $faker->generator()->numberBetween(1, $numArticles),
    'tag_id'        => $faker->generator()->numberBetween(1, $numTags),
]);

$factory('App\User', 'user', [
    'first_name'    => $faker->generator()->firstName,
    'last_name'     => $faker->generator()->lastName,
    //'user_name'     => $faker->generator()->unique()->userName . $faker->generator()->unique()->numberBetween($min = 1, $max=$numUsers*100),
    //'email'         => $faker->generator()->unique()->email,
    'password'      => Hash::make('secret'),
]);

$factory('App\User', 'owner', [
    'first_name'    => 'blog',
    'last_name'     => 'owner',
    'user_name'     => 'owner',
    'email'         => 'owner@blog.com',
    'password'      => Hash::make('secret'),
]);

$factory('App\UserRole', 'user_role', [
    'user_id' => $faker->generator()->unique()->numberBetween(2, $numUsers),
    'role_id' => 2,
]);

$factory('App\UserRole', 'owner_role', [
    'user_id' => 1,
    'role_id' => 2,
]);

$factory('App\Role', [
    //See RolesTableSeeder
]);

$factory('App\Tag', [
    //See TagsTableSeeder
]);

