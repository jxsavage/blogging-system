<?php

use Illuminate\Database\Seeder;



class TagsTableSeeder extends Seeder {

    private static $tags = ['wow', 'much', 'seeding', 'great', 'tube', 'baloons', 'awesome', 'bubbly', 'moons', 'squishy', 'red', 'orange', 'green', 'black', 'purple', 'blue', 'yellow'];

    public static function getQuantity()
    {
        return count(static::$tags);
    }

    public function run()
    {

        for ($i=0; $i < count(static::$tags); $i++)
        {
            App\Tag::create(['tag' => static::$tags[$i]]);
        }

        $this->command->info(get_called_class().' Successful!');
    }

}
