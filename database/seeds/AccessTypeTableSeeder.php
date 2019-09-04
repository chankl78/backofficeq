<?php

use App\Models\AccessType;
use Illuminate\Database\Seeder;

class AccessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessTypes = ['Admin', 'Module', 'Temporary', 'Time-Based'];

        foreach ($accessTypes as $type => $name) {
            AccessType::create([
                'name' => str_replace(' ', '-', strtolower($name)),
                'description' => $name,
            ]);
        }
    }
}
