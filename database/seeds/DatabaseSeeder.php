<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DefaultValueTableSeeder::class,
            MemberszOrgChartSeeder::class,
            MemberszPositionSeeder::class,
        ]);
    }
}
