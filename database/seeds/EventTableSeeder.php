<?php

use App\Helpers\Nric;
use App\Models\Event\Event;
use App\Models\Event\EventType;
use App\Models\Event\Participant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypeNames = ['Culture', 'Meeting', 'Study'];
        $eventTypes = [];
        $participantStatus = [];

        foreach ($eventTypeNames as $type) {
            $eventTypes[] = EventType::create([
                'code' => strtolower($type),
                'value' => $type,
            ]);
        }

        $faker = Faker\Factory::create();
        $types = collect($eventTypes);

        for ($i = 0; $i < 100; $i++) {
            $date = $faker->dateTimeBetween('-2 months', '+6 months');
            $event = Event::create([
                'uniquecode' => $faker->uuid,
                'eventdate' => $date,
                'name' => $faker->catchPhrase,
                'description' => $faker->realText(100),
                'status' => strtotime($date->format('c')) < strtotime('today') ? 'Closed' : $faker->randomElement(['Active', 'Void']),
                'pdpanric' => $faker->boolean(50),
                'pdpatelmobileemail' => $faker->boolean(50),
                'pdpaaddress' => $faker->boolean(50),
                'memregistration' => $faker->boolean(50),

                // TEMPORARY
                'location' => '',
                'createby' => '',
            ]);
            $participants = [];
            for ($k = 0; $k < $faker->numberBetween(5, 10); $k++) {
                $gender = $faker->randomElement(['m', 'f']);
                $participant = Participant::create([
                    'uniquecode' => $faker->uuid,
                    'name' => $faker->name($gender === 'm' ? 'male' : 'female' ),
                    'gender' => $gender,
                    'division' => $faker->randomElement(($gender === 'm' ? ['YM','MD'] : ['YW','WD'])),
                    'age' => $faker->numberBetween(18, 40),
                    'nric' => Nric::generateFakeNric()->current(),
                ]);
                $participants[] = $participant->id;
            }
            $event->eventType()->attach($types->random()->id);
            $event->participants()->sync($participants);
        }

        Log::info("[Migration - Seeding] Event table seeded!");
    }
}
