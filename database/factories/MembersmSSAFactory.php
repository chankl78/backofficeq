<?php

use App\Models\MembersmSSA;
use App\Models\MemberszOrgChart;
use App\Models\MemberszPosition;
use Faker\Generator as Faker;

$factory->define(MembersmSSA::class, function (Faker $faker) {
    $rhq = MemberszOrgChart::RhqAbbv()->whereNotIn('rhqabbv', array("0", "-"))->pluck('rhqabbv');
    $rhqfaker = $faker->randomElement($rhq);
    $zone = MemberszOrgChart::ZoneAbbv()->where('rhqabbv', $rhqfaker)->pluck('zoneabbv');
    $zonefaker = $faker->randomElement($zone);
    $chapter = MemberszOrgChart::ChapAbbv()->where('zoneabbv', $zonefaker)->pluck('chapabbv');
    $chapterfaker = $faker->randomElement($chapter);
    $position = MemberszPosition::PositionFaker()->pluck('code');

    return [
        'uniquecode' => $faker->uuid,
        'mmsuuid' => $faker->uuid,
        'personid' => $faker->unique()->randomNumber(5, true),
        'name' => $faker->name,
        'searchcode' => $faker->randomNumber(3, true),
        'rhq' => $rhqfaker,
        'zone' => $zonefaker,
        'chapter' => $chapterfaker,
        'district' => $faker->randomDigit(),
        'position' => $faker->randomElement($position),
        'division' => $faker->randomElement(array('MD', 'WD', 'YM', 'YW', 'PD', 'YC')),
        'dateofbirth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
