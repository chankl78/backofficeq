<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // DefaultValueTableSeeder::class,
            ConfigurationResource::class,
            AccessTypeTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
