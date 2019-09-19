<?php

use App\Helpers\NricHelper;
use App\Models\AttendancezStatus;
use App\Models\AttendancezType;
use App\Models\ConfigurationmBranch;
use App\Models\ConfigurationmDefault;
use App\Models\ConfigurationmLicense;
use App\Models\EventzEventType;
use App\Models\EventzLanguage;
use App\Models\EventzRegistrationStatus;
use App\Models\EventzRole;
use App\Models\GroupzGroupType;
use App\Models\GroupzMemberStatus;
use App\Models\GroupzStatus;
use App\Models\MembersmSSA;
use App\Models\MemberszOrgChart;
use App\Models\MemberszPosition;
use App\Models\MemberszStatus;
use App\Models\VehiclemVehicle;
use App\Models\VehiclezBookingStatus;
use App\Models\VehiclezMaintenanceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class OldTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigurationmBranch::create(array( // GSC
            'code' => 'GSC',
            'name' => 'Geylang Soka Centre',
            'address' => '57 Lorong 18 Geylang',
            'postalcode' => '398827',
            'country' => 'Singapore',
            'tel' => '67443119',
            'googlemap' => 'http://goo.gl/maps/da1L5'
        ));
        ConfigurationmBranch::create(array( // SPC
            'code' => 'SPC',
            'name' => 'Soka Peace Centre',
            'address' => '91 Wishart Road',
            'postalcode' => '098728',
            'country' => 'Singapore',
            'tel' => '67873255',
            'googlemap' => 'http://goo.gl/maps/in4vw'
        ));
        ConfigurationmBranch::create(array( // SYC
            'code' => 'SYC',
            'name' => 'Soka Youth Centre',
            'address' => '156 Pasir Panjang Road',
            'postalcode' => '118554',
            'country' => 'Singapore',
            'tel' => '64731711',
            'googlemap' => 'http://goo.gl/maps/0tYPj'
        ));
        ConfigurationmBranch::create(array( // SSAHQ
            'code' => 'SSAHQ',
            'name' => 'SSA Headquarter',
            'address' => '10 Tampines Street 81',
            'postalcode' => '529014',
            'country' => 'Singapore',
            'tel' => '67873255',
            'googlemap' => 'http://goo.gl/maps/JVpc6'
        ));
        ConfigurationmBranch::create(array( // SKC
            'code' => 'SKC',
            'name' => 'Soka Kindergarten',
            'address' => '7 Tampines Street 92',
            'postalcode' => '528888',
            'country' => 'Singapore',
            'tel' => '67844232',
            'googlemap' => 'http://goo.gl/maps/hkB5y'
        ));
        ConfigurationmBranch::create(array( // TSC
            'code' => 'TSC',
            'name' => 'Tampines Soka Centre',
            'address' => '5 Tampines Street 92',
            'postalcode' => '528890',
            'country' => 'Singapore',
            'tel' => '67830052',
            'googlemap' => 'http://goo.gl/maps/QIehe'
        ));
        ConfigurationmBranch::create(array( // SCC
            'code' => 'SCC',
            'name' => 'Soka Culture Centre',
            'address' => '8 Jurong West Street 76',
            'postalcode' => '648369',
            'country' => 'Singapore',
            'tel' => '67933600',
            'googlemap' => 'http://goo.gl/maps/aZz1g'
        ));
        ConfigurationmBranch::create(array( // SSC
            'code' => 'SSC',
            'name' => 'Senja Soka Centre',
            'address' => '11 Senja Road',
            'postalcode' => '677739',
            'country' => 'Singapore',
            'tel' => '67668674',
            'googlemap' => 'http://goo.gl/maps/LoyIH'
        ));
        //DB::table('Configuration_m_Default')->delete();
        ConfigurationmDefault::create(array( // Main Server (HQ)
            'description' => 'Main Server (HQ)',
            'value' => '1',
            'key' => 'SVHQ'
        ));
        ConfigurationmDefault::create(array( // Branch Server
            'description' => 'Branch Server',
            'value' => '0',
            'key' => 'SVBR'
        ));
        ConfigurationmDefault::create(array( // Default Branch Code
            'description' => 'Default Branch Code',
            'value' => 'SSAHQ',
            'key' => 'SVBC'
        ));
        ConfigurationmDefault::create(array( // Default Software Header
            'description' => 'Default Company Header',
            'value' => 'SSASoft - Office Automation',
            'key' => 'SOFT'
        ));
        //DB::table('Configuration_m_License')->delete();
        ConfigurationmLicense::create(array(
            'company' => Crypt::encrypt('Singapore Soka Association'),
            'licenseno' => Crypt::encrypt('soka 18112013'),
            'noofusers' => Crypt::encrypt('0'),
            'noofbranches' => Crypt::encrypt('0')
        ));
        //DB::table('Vehicle_z_MaintenanceType')->delete();
        VehiclezMaintenanceType::create(array('value' => 'Servicing'));
        VehiclezMaintenanceType::create(array('value' => 'Fill-up Petrol'));
        VehiclezMaintenanceType::create(array('value' => 'Others'));
        //DB::table('Vehicle_m_Vehicle')->delete();
        VehiclemVehicle::create(array('vehicleno' => 'SGK7939E', 'status' => 'Active'));
        VehiclemVehicle::create(array('vehicleno' => 'SFY9830J', 'status' => 'Active'));
        VehiclemVehicle::create(array('vehicleno' => 'GBB4915A', 'status' => 'Active'));
        //DB::table('Vehicle_z_BookingStatus')->delete();
        VehiclezBookingStatus::create(array('value' => 'Processing'));
        VehiclezBookingStatus::create(array('value' => 'Approved'));
        VehiclezBookingStatus::create(array('value' => 'Rejected'));
        //DB::table('Event_z_EventType')->delete();
        EventzEventType::create(array('value' => 'Culture'));
        EventzEventType::create(array('value' => 'Meeting'));
        EventzEventType::create(array('value' => 'Study'));
        //DB::table('Event_z_Language')->delete();
        EventzLanguage::create(array('value' => 'English'));
        EventzLanguage::create(array('value' => 'Chinese'));
        //DB::table('Event_z_RegistrationStatus')->delete();
        EventzRegistrationStatus::create(array('value' => 'Processing'));
        EventzRegistrationStatus::create(array('value' => 'Accepted'));
        EventzRegistrationStatus::create(array('value' => 'Rejected'));
        EventzRegistrationStatus::create(array('value' => 'Reserved'));
        EventzRegistrationStatus::create(array('value' => 'Pending'));
        EventzRegistrationStatus::create(array('value' => 'Withdrawn'));
        //DB::table('Event_z_Role')->delete();
        EventzRole::create(array('value' => 'Performer', 'abbv' => 'PFR')); // For Culture Performance
        EventzRole::create(array('value' => 'Trainer', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Chief Trainer', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Assistant Chief Trainer', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Cheorographer', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Assistant Cheorographer', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Display IC', 'abbv' => 'DISP'));
        EventzRole::create(array('value' => 'Admin', 'abbv' => 'ADM'));
        EventzRole::create(array('value' => 'Admin IC', 'abbv' => 'ADM'));
        EventzRole::create(array('value' => 'Staff Support', 'abbv' => 'ADM'));
        EventzRole::create(array('value' => 'Logistic', 'abbv' => 'LOG'));
        EventzRole::create(array('value' => 'Logistics IC', 'abbv' => 'LOG'));
        EventzRole::create(array('value' => 'Chairperson', 'abbv' => 'CCM'));
        EventzRole::create(array('value' => 'Assistant Chairperson', 'abbv' => 'CCM'));
        EventzRole::create(array('value' => 'Security'));
        EventzRole::create(array('value' => 'Security IC'));
        EventzRole::create(array('value' => 'Medical', 'abbv' => 'MED'));
        EventzRole::create(array('value' => 'Medical IC', 'abbv' => 'MED'));
        EventzRole::create(array('value' => 'Hospitality', 'abbv' => 'HOS'));
        EventzRole::create(array('value' => 'Hospitality IC', 'abbv' => 'HOS'));
        EventzRole::create(array('value' => 'Others'));
        EventzRole::create(array('value' => 'Participant')); // For Event Participantation other than Culture
        //DB::table('Attendance_z_Type')->delete();
        AttendancezType::create(array('value' => 'Actual', 'description' => 'Attendance for Actual Day'));
        AttendancezType::create(array('value' => 'Training', 'description' => 'Attendance for Training Day like NDP or Chingay towards the Actual Day'));
        //DB::table('Attendance_z_Status')->delete();
        AttendancezStatus::create(array('value' => 'Active'));
        AttendancezStatus::create(array('value' => 'Closed'));
        AttendancezStatus::create(array('value' => 'Void'));
        //DB::table('Members_z_Status')->delete();
        MemberszStatus::create(array('value' => 'Processing'));
        MemberszStatus::create(array('value' => 'Completed'));
        MemberszStatus::create(array('value' => 'Rejected'));
        MemberszStatus::create(array('value' => 'Void'));
        //DB::table('Members_z_OrgChart')->delete();
        MemberszOrgChart::create(array('rhq' => '-', 'rhqabbv' => '-', 'zone' => '-', 'zoneabbv' => '-', 'chapter' => '-', 'chapabbv' => '-'));
        MemberszOrgChart::create(array('zone' => 'Unknown', 'zoneabbv' => 'UNK', 'chapter' => 'Unknown', 'chapabbv' => 'UNK'));
        // RHQ 1
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Central', 'chapabbv' => 'BC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok East', 'chapabbv' => 'BE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Rise', 'chapabbv' => 'BRS', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok Vista', 'chapabbv' => 'BDV', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Bedok', 'zoneabbv' => 'BDK', 'chapter' => 'Bedok West', 'chapabbv' => 'BW', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Bedok South', 'chapabbv' => 'BS', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Katong', 'chapabbv' => 'KAT', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Marine Parade', 'chapabbv' => 'MP', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'East Coast', 'zoneabbv' => 'ECT', 'chapter' => 'Siglap', 'chapabbv' => 'SIG', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Pasir Ris', 'chapabbv' => 'PR', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines Central', 'chapabbv' => 'TPC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines East', 'chapabbv' => 'TPE', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines North', 'chapabbv' => 'TPN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tampines', 'zoneabbv' => 'TAM', 'chapter' => 'Tampines West', 'chapabbv' => 'TPW', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Central', 'chapabbv' => 'TMC', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah East', 'chapabbv' => 'TME', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ1', 'rhqabbv' => 'H1', 'zone' => 'Tanah Merah', 'zoneabbv' => 'TNM', 'chapter' => 'Tanah Merah Garden', 'chapabbv' => 'TMG', 'district' => 4));
        // RHQ 2
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio Central', 'chapabbv' => 'AMC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio East', 'chapabbv' => 'AME', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio North', 'chapabbv' => 'AMN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio South', 'chapabbv' => 'AMS', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Ang Mo Kio', 'zoneabbv' => 'AMK', 'chapter' => 'Ang Mo Kio West', 'chapabbv' => 'AMW', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San East', 'chapabbv' => 'CSE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Cheng San North', 'chapabbv' => 'CSN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Khatib', 'chapabbv' => 'KTB', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Kuo Chuan', 'chapabbv' => 'KC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Cheng San', 'zoneabbv' => 'CS', 'chapter' => 'Yio Chu Kang', 'chapabbv' => 'YCK', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang Central', 'chapabbv' => 'HGC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Hougang South', 'chapabbv' => 'HGS', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Kovan', 'chapabbv' => 'KOV', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Hougang', 'zoneabbv' => 'HG', 'chapter' => 'Teck Ghee', 'chapabbv' => 'TG', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang Central', 'chapabbv' => 'SKC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang East', 'chapabbv' => 'SKE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ2', 'rhqabbv' => 'H2', 'zone' => 'Sengkang', 'zoneabbv' => 'SK', 'chapter' => 'Sengkang South', 'chapabbv' => 'SKS', 'district' => 3));
        // RHQ 3
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Farrer', 'chapabbv' => 'FRR', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Norfolk', 'chapabbv' => 'NOR', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Bugis', 'zoneabbv' => 'BG', 'chapter' => 'Victoria', 'chapabbv' => 'VIC', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Havelock', 'chapabbv' => 'HVL', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'New Bridge', 'chapabbv' => 'NB', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'City', 'zoneabbv' => 'CIT', 'chapter' => 'Outram', 'chapabbv' => 'OT', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Buona Vista', 'chapabbv' => 'BV', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Clementi Woods', 'chapabbv' => 'CW', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Kent Ridge', 'chapabbv' => 'KR', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Clementi', 'zoneabbv' => 'CLM', 'chapter' => 'Nan Hua', 'chapabbv' => 'NH', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Bukit Purmei', 'chapabbv' => 'BPM', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Tiong Bahru', 'chapabbv' => 'TB', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Delta', 'zoneabbv' => 'DT', 'chapter' => 'Telok Blangah', 'chapabbv' => 'TLB', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Cambridge', 'chapabbv' => 'CAM', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Newton', 'chapabbv' => 'NT', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Lavender', 'zoneabbv' => 'LAV', 'chapter' => 'Owen', 'chapabbv' => 'OW', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Alexandra', 'chapabbv' => 'ALX', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Bukit Merah ', 'chapabbv' => 'BM', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ3', 'rhqabbv' => 'H3', 'zone' => 'Queenstown', 'zoneabbv' => 'QST', 'chapter' => 'Henderson', 'chapabbv' => 'HDS', 'district' => 4));
        // RHQ 4
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Jurong East', 'chapabbv' => 'JE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Pandan', 'chapabbv' => 'PAN', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Chinese Garden', 'zoneabbv' => 'CGD', 'chapter' => 'Yu Hua', 'chapabbv' => 'YH', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Hong Kah Central', 'chapabbv' => 'HKC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Lakeside', 'chapabbv' => 'LS', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Hong Kah', 'zoneabbv' => 'HK', 'chapter' => 'Nanyang', 'chapabbv' => 'NY', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Boon Lay', 'chapabbv' => 'BL', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Jurong Central', 'chapabbv' => 'JC', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'Jurong', 'zoneabbv' => 'JUR', 'chapter' => 'Toh Guan', 'chapabbv' => 'TGN', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Commonwealth', 'chapabbv' => 'CWH', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Holland', 'chapabbv' => 'HOL', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ4', 'rhqabbv' => 'H4', 'zone' => 'West Coast', 'zoneabbv' => 'WCT', 'chapter' => 'Pasir Panjang', 'chapabbv' => 'PP', 'district' => 5));
        // RHQ 5
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan Central', 'chapabbv' => 'BSC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan East', 'chapabbv' => 'BSE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan North', 'chapabbv' => 'BSN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan South', 'chapabbv' => 'BSS', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Bishan', 'zoneabbv' => 'BIS', 'chapter' => 'Bishan West', 'chapabbv' => 'BSW', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Braddell', 'chapabbv' => 'BDL', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Crawford', 'chapabbv' => 'CF', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Goldhill', 'chapabbv' => 'GHL', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Thomson', 'zoneabbv' => 'THM', 'chapter' => 'Rochor', 'chapabbv' => 'ROC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh East', 'chapabbv' => 'TYE', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh North', 'chapabbv' => 'TYN', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh South', 'chapabbv' => 'TYS', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Toa Payoh', 'zoneabbv' => 'TPY', 'chapter' => 'Toa Payoh West', 'chapabbv' => 'TYW', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon North', 'chapabbv' => 'SRN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Serangoon South', 'chapabbv' => 'SRS', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa East', 'chapabbv' => 'WPE', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ5', 'rhqabbv' => 'H5', 'zone' => 'Whampoa', 'zoneabbv' => 'WHM', 'chapter' => 'Whampoa West', 'chapabbv' => 'WPW', 'district' => 5));
        // RHQ 6
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied East', 'chapabbv' => 'AJE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied North', 'chapabbv' => 'AJN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied South', 'chapabbv' => 'AJS', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Aljunied', 'zoneabbv' => 'AJ', 'chapter' => 'Aljunied West', 'chapabbv' => 'AJW', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos Central', 'chapabbv' => 'ENC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos East', 'chapabbv' => 'ENE', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos South', 'chapabbv' => 'ENS', 'district' => 3));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Eunos', 'zoneabbv' => 'EUN', 'chapter' => 'Eunos West', 'chapabbv' => 'ENW', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang Central', 'chapabbv' => 'GYC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang North', 'chapabbv' => 'GYN', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang South', 'chapabbv' => 'GYS', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Geylang West', 'chapabbv' => 'GYW', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Geylang', 'zoneabbv' => 'GEY', 'chapter' => 'Macpherson', 'chapabbv' => 'MAC', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar East', 'chapabbv' => 'PLE', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar North', 'chapabbv' => 'PLN', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar South', 'chapabbv' => 'PLS', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ6', 'rhqabbv' => 'H6', 'zone' => 'Paya Lebar', 'zoneabbv' => 'PL', 'chapter' => 'Paya Lebar West', 'chapabbv' => 'PLW', 'district' => 5));
        // RHQ 7
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Marsiling', 'chapabbv' => 'MLG', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Woodlands', 'chapabbv' => 'WDS', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Bukit Panjang', 'zoneabbv' => 'BP', 'chapter' => 'Zheng Hua', 'chapabbv' => 'ZH', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Bukit Batok', 'chapabbv' => 'BB', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Teck Whye', 'chapabbv' => 'TW', 'district' => 6));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Choa Chu Kang', 'zoneabbv' => 'CCK', 'chapter' => 'Yew Tee', 'chapabbv' => 'YT', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Admiralty', 'chapabbv' => 'AMT', 'district' => 7));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Chong Pang', 'chapabbv' => 'CP', 'district' => 4));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Lentor', 'chapabbv' => 'LT', 'district' => 5));
        MemberszOrgChart::create(array('rhq' => 'RHQ7', 'rhqabbv' => 'H7', 'zone' => 'Sembawang', 'zoneabbv' => 'SBW', 'chapter' => 'Yishun', 'chapabbv' => 'YIS', 'district' => 4));
        //DB::table('Group_z_Status')->delete();
        GroupzStatus::create(array('value' => 'Active'));
        GroupzStatus::create(array('value' => 'Creased'));
        //DB::table('Group_z_GroupType')->delete();
        GroupzGroupType::create(array('value' => 'Culture'));
        GroupzGroupType::create(array('value' => 'Function'));
        GroupzGroupType::create(array('value' => 'Special'));
        //DB::table('Group_z_MemberStatus')->delete();
        GroupzMemberStatus::create(array('value' => 'Active'));
        GroupzMemberStatus::create(array('value' => 'Inactive'));
        GroupzMemberStatus::create(array('value' => 'Graduated'));
        GroupzMemberStatus::create(array('value' => 'Withdrawn'));
        GroupzMemberStatus::create(array('value' => 'Alumni'));

        //////////////////////////////////////////MEMBERS//////////////////////////////////////////
        $this->removeSeedEntries();
        $totalNumberToAdd = 1;

        for ($i=1;$i<=$totalNumberToAdd;++$i)
        {
            # Generate a random NRIC
            $nric = NricHelper::generateFakeNric(1)->current();
            echo "Creating " . $nric . PHP_EOL;
            # Personid is 1000000 + index, for testing data.
            $personid = 1000000 + $i;
            # Searchcode is the first three digits of the NRIC
            $searchcode = substr($nric, 1, 3);
            # Uniquecode is the date string
            # NRIC is the NRIC as blob
            # Name is TestMemberData . index
            $name = 'TestMemberData' . $i;
            # Create and save the member to database
            $post = new MembersmSSA;
            $post->personid = $personid;
            $post->nric = $nric;
            $post->name = $name;
            $post->uniquecode = date('dmY') . $i . date('His');
            $post->searchcode = $searchcode;
            $post->introducermobile = 'BLANK';
            # Add random RZCD
            $org = MemberszOrgChart::orderbyRaw("RAND()")->limit(1)->get();
            $post->rhq = $org[0]['rhqabbv'];
            $post->zone = $org[0]['zoneabbv'];
            $post->chapter = $org[0]['chapabbv'];
            $post->district = $org[0]['district'];

            # Add random position
            $position = MemberszPosition::orderbyRaw("RAND()")->limit(1)->get();
            $post->position = isset($position[0]) ? $position[0]['code'] : '';

            # Add division and gender
            $gender = ['F','M'];
            $post->gender = $gender[mt_rand(0, count($gender)-1)];
            if ($post->gender == 'F') {
                $division = ['YW','WD'];
                $post->division = $division[mt_rand(0,count($division)-1)];
            } else {
                $division = ['YM','MD'];
                $post->division = $division[mt_rand(0,count($division)-1)];
            }

            $post->dateofbirth = '1999-12-31';
            $post->tel = $this->getRandomPhoneNumber('6');
            $post->mobile = $this->getRandomPhoneNumber('9');
            $post->email = 'email@.' . str_random(10) . '.com';
            $post->address = str_random(10);
            $post->buildingname = str_random(10);
            $post->unitno = str_random(10);
            $post->postalcode = rand(100000,999999);

            $post->emergencytel = $this->getRandomPhoneNumber('6');
            $post->emergencymobile = $this->getRandomPhoneNumber('9');
            $post->introducermobile = 'NIL';
            $post->save();
        }
        Eloquent::reguard();
    }

    private function getRandomPhoneNumber($prefix) {
        return $prefix . sprintf('%07d', rand(0,9999999));
    }

    public function removeSeedEntries()
    {
        MembersmSSA::where('name','like', 'TestMemberData%')->forceDelete();
        MembersmSSA::where('name','like', 'TestMemberData%')->delete();
    }
}
