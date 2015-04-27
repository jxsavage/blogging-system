<?php

use Illuminate\Database\Seeder;

class ArticlePicturesTableSeeder extends Seeder {

    private static $count = 100;

    public static function getQuantity()
    {
        return static::$count;
    }
    public function run()
    {

        $articleCount = ArticlesTableSeeder::getQuantity();

        $faker = Faker\Factory::create();

        for( $x=0; $x<static::$count; $x++)
        {
            App\ArticlePicture::create([
            'article_id'    => $faker->numberBetween(1, $articleCount),
            'url'           => $faker->imageUrl($width = 640, $height = 480),
            'alt'           => $faker->word,
            'caption'       => $faker->word,
        ]);
        }

        $this->command->info(get_called_class().' Successful!');
    }

}
