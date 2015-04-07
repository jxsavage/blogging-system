<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy


class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        
        $count = UsersTableSeeder::getQuantity();
        
        App\RoleUser::create([
                'user_id' => 1,
                'role_id' => 1,
            ]);
        
        $faker = Faker\Factory::create();
        
        for( $x=0; $x<$count; $x++)
        {
            
            App\RoleUser::create([
                'user_id' => $faker->unique()->numberBetween(2, $count+1),
                'role_id' => 2,
            ]);
        }
        
        $this->command->info(get_called_class().' Successful!');
    }

}