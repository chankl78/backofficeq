<?php

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Active', 'Inactive', 'Banned'];

        foreach ($statuses as $status) {
            $name = str_replace(' ', '-', strtolower($status));
            Status::create([
                'name' => $name,
                'description' => $status,
            ]);
        }

        Log::info("[Migration - Seeding] Access Types seeded!");
    }
}
