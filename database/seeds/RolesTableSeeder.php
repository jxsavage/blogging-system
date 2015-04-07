<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder {

    static $roles = ['owner', 'user'];
    
    public static function getQuantity()
    {
        return count(static::$roles);
    }

    public function run()
    {
        
        for ($i=0; $i < count(static::$roles); $i++)
        {
            App\Role::create(['role' => static::$roles[$i]]);
        }
        
        $this->command->info(get_called_class().' Successful!');
    }

}