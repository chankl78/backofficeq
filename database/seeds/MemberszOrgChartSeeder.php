<?php

use Illuminate\Database\Seeder;
use App\Models\MemberszOrgChart;

class MemberszOrgChartSeeder extends Seeder
{
    public function run()
    {
        // RHQ 0
        MemberszOrgChart::create(array('rhq' => 'SHQ', 'rhqabbv' => '0', 'zone' => '-', 'zoneabbv' => '-', 'chapter' => '-', 'chapabbv' => '-', 'district' => 0, 'day' => '-', 'language' => '-', 'time' => '-'));
        MemberszOrgChart::create(array('rhq' => '-', 'rhqabbv' => '-', 'zone' => 'Unknown', 'zoneabbv' => 'UNK', 'chapter' => 'Unknown', 'chapabbv' => 'UNK', 'district' => 0, 'day' => '-', 'language' => '-', 'time' => '-'));
        
        // RHQ 1
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Central', 'chapabbv' => 'BC', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Central', 'chapabbv' => 'BC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Central', 'chapabbv' => 'BC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Central', 'chapabbv' => 'BC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Vista', 'chapabbv' => 'BDV', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Vista', 'chapabbv' => 'BDV', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Vista', 'chapabbv' => 'BDV', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Vista', 'chapabbv' => 'BDV', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok East', 'chapabbv' => 'BE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok East', 'chapabbv' => 'BE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok East', 'chapabbv' => 'BE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok East', 'chapabbv' => 'BE', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Central', 'chapabbv' => 'CGC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Central', 'chapabbv' => 'CGC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Central', 'chapabbv' => 'CGC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Central', 'chapabbv' => 'CGC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Rise', 'chapabbv' => 'CGR', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Rise', 'chapabbv' => 'CGR', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Rise', 'chapabbv' => 'CGR', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi Rise', 'chapabbv' => 'CGR', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi West', 'chapabbv' => 'CGW', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi West', 'chapabbv' => 'CGW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi West', 'chapabbv' => 'CGW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Changi', 'zoneabbv' => 'CG', 'chapter' => 'Changi West', 'chapabbv' => 'CGW', 'district' => 4, 'day' => 'Fri', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Bedok South', 'chapabbv' => 'BS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Bedok South', 'chapabbv' => 'BS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Bedok South', 'chapabbv' => 'BS', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Bedok South', 'chapabbv' => 'BS', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1500'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Marine Parade', 'chapabbv' => 'MP', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Marine Parade', 'chapabbv' => 'MP', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Marine Parade', 'chapabbv' => 'MP', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Marine Parade', 'chapabbv' => 'MP', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah East', 'chapabbv' => 'TME', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah East', 'chapabbv' => 'TME', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah East', 'chapabbv' => 'TME', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah East', 'chapabbv' => 'TME', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMG', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMG', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMG', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMG', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMC', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah West', 'chapabbv' => 'TMW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah West', 'chapabbv' => 'TMW', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah West', 'chapabbv' => 'TMW', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah West', 'chapabbv' => 'TMW', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        // RHQ 2
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio Central', 'chapabbv' => 'AMC', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio Central', 'chapabbv' => 'AMC', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio Central', 'chapabbv' => 'AMC', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio Central', 'chapabbv' => 'AMC', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio North', 'chapabbv' => 'AMN', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio North', 'chapabbv' => 'AMN', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio North', 'chapabbv' => 'AMN', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio North', 'chapabbv' => 'AMN', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio West', 'chapabbv' => 'AMW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio West', 'chapabbv' => 'AMW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio West', 'chapabbv' => 'AMW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio West', 'chapabbv' => 'AMW', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San East', 'chapabbv' => 'CSE', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San East', 'chapabbv' => 'CSE', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San East', 'chapabbv' => 'CSE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San East', 'chapabbv' => 'CSE', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San North', 'chapabbv' => 'CSN', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San North', 'chapabbv' => 'CSN', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San North', 'chapabbv' => 'CSN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San North', 'chapabbv' => 'CSN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Khatib', 'chapabbv' => 'KTB', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Khatib', 'chapabbv' => 'KTB', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Khatib', 'chapabbv' => 'KTB', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Khatib', 'chapabbv' => 'KTB', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Yio Chu Kang', 'chapabbv' => 'YCK', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Yio Chu Kang', 'chapabbv' => 'YCK', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Yio Chu Kang', 'chapabbv' => 'YCK', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Yio Chu Kang', 'chapabbv' => 'YCK', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang South', 'chapabbv' => 'HGS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang South', 'chapabbv' => 'HGS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang South', 'chapabbv' => 'HGS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang South', 'chapabbv' => 'HGS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Kovan', 'chapabbv' => 'KOV', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Kovan', 'chapabbv' => 'KOV', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Kovan', 'chapabbv' => 'KOV', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Kovan', 'chapabbv' => 'KOV', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        // RHQ 3
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Havelock', 'chapabbv' => 'HVL', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Havelock', 'chapabbv' => 'HVL', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Havelock', 'chapabbv' => 'HVL', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Havelock', 'chapabbv' => 'HVL', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'New Bridge', 'chapabbv' => 'NB', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'New Bridge', 'chapabbv' => 'NB', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'New Bridge', 'chapabbv' => 'NB', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'New Bridge', 'chapabbv' => 'NB', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'NB', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'NB', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'NB', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'NB', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'NB', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '1530'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Buona Vista', 'chapabbv' => 'BV', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Buona Vista', 'chapabbv' => 'BV', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Buona Vista', 'chapabbv' => 'BV', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Buona Vista', 'chapabbv' => 'BV', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Clementi Woods', 'chapabbv' => 'CW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Clementi Woods', 'chapabbv' => 'CW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Clementi Woods', 'chapabbv' => 'CW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Clementi Woods', 'chapabbv' => 'CW', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1500'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Anson', 'chapabbv' => 'ANS', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1030'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Anson', 'chapabbv' => 'ANS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Anson', 'chapabbv' => 'ANS', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Bukit Merah', 'chapabbv' => 'BM', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Bukit Merah', 'chapabbv' => 'BM', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Bukit Merah', 'chapabbv' => 'BM', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Bukit Merah', 'chapabbv' => 'BM', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Henderson', 'chapabbv' => 'HDS', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Henderson', 'chapabbv' => 'HDS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Henderson', 'chapabbv' => 'HDS', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Henderson', 'chapabbv' => 'HDS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        // RHQ 4
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Jurong East', 'chapabbv' => 'JE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Jurong East', 'chapabbv' => 'JE', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Jurong East', 'chapabbv' => 'JE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Jurong East', 'chapabbv' => 'JE', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Yu Hua', 'chapabbv' => 'YH', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Yu Hua', 'chapabbv' => 'YH', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Yu Hua', 'chapabbv' => 'YH', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Yu Hua', 'chapabbv' => 'YH', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Hong Kah Central', 'chapabbv' => 'KHC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Hong Kah Central', 'chapabbv' => 'KHC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Hong Kah Central', 'chapabbv' => 'KHC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Hong Kah Central', 'chapabbv' => 'KHC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 6, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 3, 'day' => 'Fri', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 5, 'day' => 'Fri', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 6, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Holland', 'chapabbv' => 'HOL', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1430'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Holland', 'chapabbv' => 'HOL', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Holland', 'chapabbv' => 'HOL', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Holland', 'chapabbv' => 'HOL', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Tanglin Halt', 'chapabbv' => 'TLH', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Tanglin Halt', 'chapabbv' => 'TLH', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Tanglin Halt', 'chapabbv' => 'TLH', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Tanglin Halt', 'chapabbv' => 'TLH', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        // RHQ 5
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan Central', 'chapabbv' => 'BSC', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan Central', 'chapabbv' => 'BSC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan Central', 'chapabbv' => 'BSC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan Central', 'chapabbv' => 'BSC', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan East', 'chapabbv' => 'BSE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan East', 'chapabbv' => 'BSE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan East', 'chapabbv' => 'BSE', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan East', 'chapabbv' => 'BSE', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan North', 'chapabbv' => 'BSN', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan North', 'chapabbv' => 'BSN', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan North', 'chapabbv' => 'BSN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan North', 'chapabbv' => 'BSN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan South', 'chapabbv' => 'BSS', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan South', 'chapabbv' => 'BSS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan South', 'chapabbv' => 'BSS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan South', 'chapabbv' => 'BSS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan West', 'chapabbv' => 'BSW', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan West', 'chapabbv' => 'BSW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan West', 'chapabbv' => 'BSW', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan West', 'chapabbv' => 'BSW', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 5, 'day' => 'Fri', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon North', 'chapabbv' => 'SRN', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon North', 'chapabbv' => 'SRN', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1100'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon North', 'chapabbv' => 'SRN', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon North', 'chapabbv' => 'SRN', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon South', 'chapabbv' => 'SRS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon South', 'chapabbv' => 'SRS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon South', 'chapabbv' => 'SRS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon South', 'chapabbv' => 'SRS', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 6, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '1630'));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        // RHQ 6
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos Central', 'chapabbv' => 'ENC', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos Central', 'chapabbv' => 'ENC', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos Central', 'chapabbv' => 'ENC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos Central', 'chapabbv' => 'ENC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos East', 'chapabbv' => 'ENE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos East', 'chapabbv' => 'ENE', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos East', 'chapabbv' => 'ENE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos East', 'chapabbv' => 'ENE', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos South', 'chapabbv' => 'ENS', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos South', 'chapabbv' => 'ENS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos South', 'chapabbv' => 'ENS', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos South', 'chapabbv' => 'ENS', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos West', 'chapabbv' => 'ENW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos West', 'chapabbv' => 'ENW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '1930'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos West', 'chapabbv' => 'ENW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos West', 'chapabbv' => 'ENW', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang Central', 'chapabbv' => 'GYC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang Central', 'chapabbv' => 'GYC', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang Central', 'chapabbv' => 'GYC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang Central', 'chapabbv' => 'GYC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang North', 'chapabbv' => 'GYN', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang North', 'chapabbv' => 'GYN', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang North', 'chapabbv' => 'GYN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang North', 'chapabbv' => 'GYN', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang South', 'chapabbv' => 'GYS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang South', 'chapabbv' => 'GYS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang South', 'chapabbv' => 'GYS', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang South', 'chapabbv' => 'GYS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Macpherson', 'chapabbv' => 'MAC', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Macpherson', 'chapabbv' => 'MAC', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Macpherson', 'chapabbv' => 'MAC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Macpherson', 'chapabbv' => 'MAC', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 6, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        // RHQ 7
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 6, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 7, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 6, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 7, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 6, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 7, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 6, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 5, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        //RHQ 8
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Farrer', 'chapabbv' => 'FRR', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Farrer', 'chapabbv' => 'FRR', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Farrer', 'chapabbv' => 'FRR', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Norfolk', 'chapabbv' => 'NOR', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Norfolk', 'chapabbv' => 'NOR', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Norfolk', 'chapabbv' => 'NOR', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Norfolk', 'chapabbv' => 'NOR', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Victoria', 'chapabbv' => 'VIC', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1430'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Victoria', 'chapabbv' => 'VIC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Victoria', 'chapabbv' => 'VIC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 5, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Tiong Bahru', 'chapabbv' => 'TB', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Tiong Bahru', 'chapabbv' => 'TB', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Tiong Bahru', 'chapabbv' => 'TB', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Tiong Bahru', 'chapabbv' => 'TB', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Telok Blangah', 'chapabbv' => 'TLB', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Telok Blangah', 'chapabbv' => 'TLB', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Telok Blangah', 'chapabbv' => 'TLB', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Telok Blangah', 'chapabbv' => 'TLB', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Cambridge', 'chapabbv' => 'CAM', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Cambridge', 'chapabbv' => 'CAM', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Cambridge', 'chapabbv' => 'CAM', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 6, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Newton', 'chapabbv' => 'NEW', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Newton', 'chapabbv' => 'NEW', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Newton', 'chapabbv' => 'NEW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Owen', 'chapabbv' => 'OW', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Owen', 'chapabbv' => 'OW', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Owen', 'chapabbv' => 'OW', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Braddell', 'chapabbv' => 'BDL', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Braddell', 'chapabbv' => 'BDL', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Braddell', 'chapabbv' => 'BDL', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Braddell', 'chapabbv' => 'BDL', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Goldhill', 'chapabbv' => 'GHL', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Goldhill', 'chapabbv' => 'GHL', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Goldhill', 'chapabbv' => 'GHL', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Goldhill', 'chapabbv' => 'GHL', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 5, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ8', 'rhqabbv' => 'H8', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 6, 'day' => 'Sun', 'language' => 'E', 'time' => '1000'));

        // RHQ 9
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied East', 'chapabbv' => 'AJE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied East', 'chapabbv' => 'AJE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied East', 'chapabbv' => 'AJE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied East', 'chapabbv' => 'AJE', 'district' => 4, 'day' => 'Fri', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied North', 'chapabbv' => 'AJN', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied North', 'chapabbv' => 'AJN', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied North', 'chapabbv' => 'AJN', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied North', 'chapabbv' => 'AJN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied South', 'chapabbv' => 'AJS', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied South', 'chapabbv' => 'AJS', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied South', 'chapabbv' => 'AJS', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied South', 'chapabbv' => 'AJS', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied West', 'chapabbv' => 'AJW', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied West', 'chapabbv' => 'AJW', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied West', 'chapabbv' => 'AJW', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied West', 'chapabbv' => 'AJW', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Central', 'chapabbv' => 'PRC', 'district' => 1, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Central', 'chapabbv' => 'PRC', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Central', 'chapabbv' => 'PRC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Central', 'chapabbv' => 'PRC', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris East', 'chapabbv' => 'PRE', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris East', 'chapabbv' => 'PRE', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris East', 'chapabbv' => 'PRE', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris East', 'chapabbv' => 'PRE', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Rise', 'chapabbv' => 'PRR', 'district' => 1, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Rise', 'chapabbv' => 'PRR', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Rise', 'chapabbv' => 'PRR', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Pasir Ris', 'zoneabbv' => 'PR', 'chapter' => 'Pasir Ris Rise', 'chapabbv' => 'PRR', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 2, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 4, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 5, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 6, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang East', 'chapabbv' => 'SKE', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang East', 'chapabbv' => 'SKE', 'district' => 2, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang East', 'chapabbv' => 'SKE', 'district' => 3, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang East', 'chapabbv' => 'SKE', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang South', 'chapabbv' => 'SKS', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang South', 'chapabbv' => 'SKS', 'district' => 2, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang South', 'chapabbv' => 'SKS', 'district' => 3, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang South', 'chapabbv' => 'SKS', 'district' => 4, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines Central', 'chapabbv' => 'TPC', 'district' => 1, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines Central', 'chapabbv' => 'TPC', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines Central', 'chapabbv' => 'TPC', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines Central', 'chapabbv' => 'TPC', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines East', 'chapabbv' => 'TPE', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines East', 'chapabbv' => 'TPE', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines East', 'chapabbv' => 'TPE', 'district' => 3, 'day' => 'Sun', 'language' => 'M', 'time' => '1430'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines East', 'chapabbv' => 'TPE', 'district' => 4, 'day' => 'Sat', 'language' => 'M', 'time' => '2000'));

        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines North', 'chapabbv' => 'TPN', 'district' => 1, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines North', 'chapabbv' => 'TPN', 'district' => 2, 'day' => 'Sun', 'language' => 'E', 'time' => '1400'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines North', 'chapabbv' => 'TPN', 'district' => 3, 'day' => 'Sat', 'language' => 'E', 'time' => '2000'));
        MemberszOrgChart::create(array('rhq' => 'RHQ9', 'rhqabbv' => 'H9', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines North', 'chapabbv' => 'TPN', 'district' => 4, 'day' => 'Sun', 'language' => 'M', 'time' => '1400'));

        Log::notice("[Migration - Seeding] Organisation Chart for Districts successfully seeded!");
    }
}
