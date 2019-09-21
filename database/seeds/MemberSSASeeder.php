<?php

use App\Helpers\Nric;
use App\Models\Event\MemberSSA;
use App\Models\Event\MemberSSA\OrgChart;
use App\Models\Event\MemberSSA\OrgInfo;
use Faker\Generator;
use Faker\Provider\zh_CN\Person;
use Illuminate\Database\Seeder;

class MemberSSASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $chinese = Faker\Factory::create('zh_CN');

        for ($k = 0; $k < 100; $k++) {
            $gender = $faker->randomElement(['M', 'F']);
            $member = MemberSSA::create([
                'uniquecode' => $faker->uuid,
                'name' => $faker->name(($gender === 'M' ? ['YM','MD'] : ['YW','WD'])),
                'chinese_name' => $chinese->name($gender === 'M' ? 'male' : 'female'),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'nric' => Nric::generateFakeNric()->current(),
                'tel' => $faker->phoneNumber,
                'mobile' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'blood_group' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'nationality' => $faker->randomElement([
                    'Chinese',
                    'French',
                    'German',
                    'Polish',
                    'Russian',
                    'Ukrainian',
                    'British',
                    'American',
                ]),
                'birth_country' => $faker->country,
                'race' => $faker->randomElement([
                    'Hispanic',
                    'American Indian or Alaskan Native',
                    'Asian or Pacific Islander',
                    'Black, non-Hispanic',
                    'White, non-Hispanic',
                    'Non-Resident Alien',
                    'Race and Ethnicity unknown',
                ]),
                'occupation' => ucfirst($faker->randomElement([
                    'accountant',
                    'actor',
                    'actuary',
                    'bellhop',
                    'biologist',
                    'blacksmith',
                    'bookkeeper',
                    'clerk',
                    'coach',
                    'cobbler',
                    'composer',
                    'dentist',
                    'deputy',
                    'dermatologist',
                    'designer',
                ])),
                'language' => $faker->randomElement(['English', 'Chinese'])
            ]);
            $member->address()->create([
                'address' => $faker->streetAddress,
                'building' => $faker->buildingNumber,
                'unit' => $faker->numberBetween(1, 100),
                'postal_code' => $faker->postcode,
            ]);
            $orgInfo = OrgInfo::create([
                'position' => $faker->randomElement([
                    'Chief Executive Officer (CEO)',
                    'Chief Operating Officer (COO)',
                    'Marketing Manager',
                    'Chief Financial Officer (CFO)',
                    'Production Manager',
                    'Operations Manager',
                    'Accountant',
                    'Office manager',
                    'Receptionist',
                    'Professional Staff',
                ]),
                'division' => $faker->randomElement(['MD', 'WD', 'YM', 'YW', 'PD']),
                'discussion_meeting_day' => $faker->randomElement(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']),
            ]);
            $orgChart = OrgChart::all()->random(1)->first();
            $orgInfo->orgChart()->attach($orgChart);
            $member->orgInfo()->save($orgInfo);
        }
    }
}
