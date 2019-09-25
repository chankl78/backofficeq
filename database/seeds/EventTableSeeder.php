<?php

use App\Helpers\Nric;
use App\Models\Event\Event;
use App\Models\Event\EventType;
use App\Models\Event\MemberSSA;
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
        $members = [];

        foreach ($eventTypeNames as $type) {
            $eventTypes[] = EventType::create([
                'code' => strtolower($type),
                'value' => $type,
            ]);
        }

        $faker = Faker\Factory::create();
        $types = collect($eventTypes);
        $members = MemberSSA::all();

        foreach ($members as $member) {
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
            $_members = $members->random($faker->numberBetween(10, 15));
            foreach ($_members as $_member) {
                $participant = $_member->participant()->create([
                    'uniquecode' => $faker->uuid,
                ]);
                $participants[] = $participant->id;
            }
            $event->eventType()->attach($types->random()->id);
            $event->participants()->sync($participants);
        }

        Log::info("[Migration - Seeding] Event table seeded!");
    }
}
