<?php

use Illuminate\Database\Seeder;

class ArticleTagsTableSeeder extends Seeder {

    private static $count = 200;

    public static function getQuantity()
    {
        return static::$count;
    }
    public function run()
    {

        $articleCount = ArticlesTableSeeder::getQuantity();
        $tagCount = TagsTableSeeder::getQuantity();

        $faker = Faker\Factory::create();

        for( $x=0; $x<static::$count; $x++)
        {
            App\ArticleTag::create([
                'article_id'    => $faker->numberBetween(1, $articleCount),
                'tag_id'        => $faker->numberBetween(1, $tagCount),
            ]);
        }

        $this->command->info(get_called_class().' Successful!');
    }

}
