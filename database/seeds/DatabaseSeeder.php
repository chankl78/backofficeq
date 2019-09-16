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
            OrgChartSeeder::class,
            MemberSSASeeder::class,
            EventTableSeeder::class,

            PermissionTableSeeder::class,
            StatusTableSeeder::class,
            ConfigurationResource::class,
            AccessTypeTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
