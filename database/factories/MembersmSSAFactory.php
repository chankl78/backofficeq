<?php

use App\Models\MembersmSSA;
use App\Models\MemberszOrgChart;
use App\Models\MemberszPosition;
use Faker\Generator as Faker;

$factory->define(MembersmSSA::class, function (Faker $faker) {
    $rhq = MemberszOrgChart::RhqAbbv()->pluck('rhqabbv');
    $zone = MemberszOrgChart::ZoneAbbv()->pluck('zoneabbv');
    $chapter = MemberszOrgChart::ChapAbbv()->pluck('chapabbv');
    $position = MemberszPosition::PositionFaker()->pluck('code');

    return [
        'uniquecode' => Str::uuid(),
        'mmsuuid' => Str::uuid(),
        'personid' => $faker->unique()->randomNumber(5, true),
        'name' => $faker->name,
        'searchcode' => $faker->randomNumber(3, true),
        'rhq' => $faker->randomElement($rhq),
        'zone' => $faker->randomElement($zone),
        'chapter' => $faker->randomElement($chapter),
        'district' => $faker->randomDigit(),
        'position' => $faker->randomElement($position),
        'division' => $faker->randomElement(array('MD', 'WD', 'YM', 'YW', 'PD', 'YC')),
        'dateofbirth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
