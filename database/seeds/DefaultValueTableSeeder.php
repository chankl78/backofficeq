<?php

use Illuminate\Database\Seeder;
use App\Models\AccesszAccessTypes;
use App\Models\AccesszRoles;
use App\Models\AccesszStatus;
use App\Models\AccessmUser;
use App\Models\AccessmAccessRights;
use App\Models\StaffzDepartment;
use App\Models\StaffzPosition;
use App\Models\StaffzType;
use App\Models\StaffzStatus;
use App\Models\ConfigurationmCompany;
use App\Models\ConfigurationmBranch;
use App\Models\ConfigurationmDefault;
use App\Models\ConfigurationmLicense;
use App\Models\ConfigurationmResource;
use App\Models\ConfigurationmResourceGroup;
use App\Models\LogszLogType;
use App\Models\LogszStatus;
use App\Models\VehiclemVehicle;
use App\Models\VehiclezBookingStatus;
use App\Models\VehiclezMaintenanceType;

class DefaultValueTableSeeder extends Seeder
{
    public function run()
    {
        // Access Rights
        AccesszAccessTypes::create(array('value' => 'Module'));
        AccesszAccessTypes::create(array('value' => 'Temporany'));
        AccesszAccessTypes::create(array('value' => 'Time-Based'));

        Log::info("[Migration - Seeding] Access Types seeded!");

        AccesszRoles::create(array('value' => 'Resource Administrator'));
        AccesszRoles::create(array('value' => 'User'));
        AccesszRoles::create(array('value' => 'Event Administrator'));
        AccesszRoles::create(array('value' => 'Single Event Administrator'));
        AccesszRoles::create(array('value' => 'Single Group Administrator'));
        AccesszRoles::create(array('value' => 'Single Group User'));
        AccesszRoles::create(array('value' => 'Single Event User'));
        AccesszRoles::create(array('value' => 'Single Event Item User'));
        AccesszRoles::create(array('value' => 'Event Chief Trainer'));
        AccesszRoles::create(array('value' => 'Event Trainer'));
        AccesszRoles::create(array('value' => 'Gakkai Administrator'));
        AccesszRoles::create(array('value' => 'Region User'));
        AccesszRoles::create(array('value' => 'Zone User'));
        AccesszRoles::create(array('value' => 'Chapter user'));
        AccesszRoles::create(array('value' => 'District User'));
        AccesszRoles::create(array('value' => 'SHQ User'));

        Log::info("[Migration - Seeding] Access Roles seeded!");

        AccesszStatus::create(array('value' => 'Active'));
        AccesszStatus::create(array('value' => 'Inactive'));
        AccesszStatus::create(array('value' => 'Banned'));

        Log::info("[Migration - Seeding] Access Status seeded!");

        AccessmUser::create(array(
            'name' => env('LH_NAME'), 'username' => 'ssasoft', 'uniquecode' => Str::uuid(), 'email_verified_at' => now(),
            'password' => Hash::make(env('LH_PASSWORD')), 'roleid' => env('LH_ROLEID'), 'email' => env('LH_EMAIL')
        ));

        AccessmUser::create(array(
            'name' => env('LHG_NAME'), 'username' => env('LHG_USERNAME'), 'uniquecode' => Str::uuid(), 'email_verified_at' => now(),
            'password' => Hash::make(env('LH_PASSWORD')), 'roleid' => env('LHG_ROLEID'), 'email' => env('LHG_EMAIL')
        ));

        AccessmAccessRights::create(array(
            'userid' => 1, 'resourcegroup' => 'SYSA', 'resourcecode' => 'SYSA',
            'accesstypeid' => 0, 'startdate' => '0000-00-00', 'enddate' => '0000-00-00', 'starttime' => '00:00:00',
            'endtime' => '00:00:00', 'create' => true, 'read' => true, 'update' => true, 'delete' => true, 'void' => true,
            'unvoid' => true, 'print' => true, 'uniquecode' => Str::uuid()
        ));

        AccessmAccessRights::create(array(
            'userid' => 2, 'resourcegroup' => 'SOFA', 'resourcecode' => 'SYSA',
            'accesstypeid' => 0, 'startdate' => '0000-00-00', 'enddate' => '0000-00-00', 'starttime' => '00:00:00',
            'endtime' => '00:00:00', 'create' => true, 'read' => true, 'update' => true, 'delete' => true, 'void' => true,
            'unvoid' => true, 'print' => true, 'uniquecode' => Str::uuid()
        ));

        StaffzDepartment::create(array('value' => 'Secretariat Office'));
        StaffzDepartment::create(array('value' => 'Accounts'));
        StaffzDepartment::create(array('value' => 'Organisation'));
        StaffzDepartment::create(array('value' => 'Corporate Affairs'));
        StaffzDepartment::create(array('value' => 'Community Relations'));
        StaffzDepartment::create(array('value' => 'General Admin'));
        StaffzDepartment::create(array('value' => 'Human Resource'));
        StaffzDepartment::create(array('value' => 'Publication'));
        StaffzDepartment::create(array('value' => 'Sales'));
        StaffzDepartment::create(array('value' => 'Soka Kindergarten'));

        Log::info("[Migration - Seeding] Staff Department seeded!");

        StaffzPosition::create(array('value' => 'General Director'));
        StaffzPosition::create(array('value' => 'Director'));
        StaffzPosition::create(array('value' => 'Senior Manager'));
        StaffzPosition::create(array('value' => 'Manager'));
        StaffzPosition::create(array('value' => 'Executive'));

        Log::info("[Migration - Seeding] Staff Position seeded!");

        StaffzType::create(array('value' => 'Full-Time'));
        StaffzType::create(array('value' => 'Part-Time'));
        StaffzType::create(array('value' => 'Vendor'));

        Log::info("[Migration - Seeding] Staff Type seeded!");

        StaffzStatus::create(array('value' => 'Active'));
        StaffzStatus::create(array('value' => 'Resigned'));
        StaffzStatus::create(array('value' => 'Suspend'));

        Log::info("[Migration - Seeding] Staff Status seeded!");

        ConfigurationmCompany::create(array(
            'name' => 'Singapore Soka Association',
            'address' => '10 Tampines Street 81',
            'postalcode' => '529014',
            'country' => 'Singapore',
            'tel' => '65518900',
            'website' => 'www.ssabuddhist.org',
            'uenno' => 'S72SS0009K',
            'gstno' => 'M4-0006007-0',
            'googlemap' => 'http://goo.gl/maps/JVpc6'
        ));

        Log::info("[Migration - Seeding] Company Profile seeded!");

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
            'tel' => '65518908',
            'googlemap' => 'http://goo.gl/maps/in4vw'
        ));
        ConfigurationmBranch::create(array( // SYC
            'code' => 'SYC',
            'name' => 'Soka Youth Centre',
            'address' => '156 Pasir Panjang Road',
            'postalcode' => '118554',
            'country' => 'Singapore',
            'tel' => '65518906',
            'googlemap' => 'http://goo.gl/maps/0tYPj'
        ));
        ConfigurationmBranch::create(array( // SSAHQ
            'code' => 'SSAHQ',
            'name' => 'SSA Headquarter',
            'address' => '10 Tampines Street 81',
            'postalcode' => '529014',
            'country' => 'Singapore',
            'tel' => '65518900',
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
            'tel' => '65518905',
            'googlemap' => 'http://goo.gl/maps/QIehe'
        ));
        ConfigurationmBranch::create(array( // SCC
            'code' => 'SCC',
            'name' => 'Soka Culture Centre',
            'address' => '8 Jurong West Street 76',
            'postalcode' => '648369',
            'country' => 'Singapore',
            'tel' => '65518909',
            'googlemap' => 'http://goo.gl/maps/aZz1g'
        ));
        ConfigurationmBranch::create(array( // SSC
            'code' => 'SSC',
            'name' => 'Senja Soka Centre',
            'address' => '11 Senja Road',
            'postalcode' => '677739',
            'country' => 'Singapore',
            'tel' => '65518903',
            'googlemap' => 'http://goo.gl/maps/LoyIH'
        ));

        Log::info("[Migration - Seeding] Company Branches seeded!");

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
        ConfigurationmDefault::create(array( // Friendship Meeting
            'description' => 'Friendship Meeting',
            'value' => '59e6f9323861b3.74842050',
            'key' => 'NFM'
        ));
        ConfigurationmDefault::create(array( // Student Division Registration Platform
            'description' => 'Student Division Registration Platform',
            'value' => '5cde637f8e7d01.68104577',
            'key' => 'SDRP'
        ));
        ConfigurationmDefault::create(array( // Homevisit Campaign
            'description' => 'Homevisit Campaign',
            'value' => '5cb41cec9444e0.65901300',
            'key' => 'HOME'
        ));
        ConfigurationmDefault::create(array( // Default User Role 
            'description' => 'Default User Role for New User',
            'value' => 'User',
            'key' => 'DURN'
        ));

        Log::info("[Migration - Seeding] Default Values seeded!");

        ConfigurationmLicense::create(array(
            'company' => env('COMPANY_NAME'),
            'licenseno' => env('COMPANY_LICENSE_NO'),
            'noofusers' => env('COMPANY_NO_OF_USERS'),
            'noofbranches' => env('COMPANY_NO_OF_BRANCHES')
        ));

        ConfigurationmResourceGroup::create(array( // Access Rights (ACRI)
            'resourcegroup' => 'Access Rights',
            'code' => 'ACRI',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Common Tables (CMTA)
            'resourcegroup' => 'Common Tables',
            'code' => 'CMTA',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Configuration (CNFI)
            'resourcegroup' => 'Configuration',
            'code' => 'CNFI',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Logs (LOGS)
            'resourcegroup' => 'Logs',
            'code' => 'LOGS',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Vehicle (VEHI)
            'resourcegroup' => 'Vehicle',
            'code' => 'VEHI',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Event (EVEN)
            'resourcegroup' => 'Event',
            'code' => 'EVEN',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Attendance (ATTE)
            'resourcegroup' => 'Attendance',
            'code' => 'ATTE',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // SSA Members (SSAM)
            'resourcegroup' => 'SSA Members',
            'code' => 'SSAM',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Groups (GRPS)
            'resourcegroup' => 'Groups',
            'code' => 'GRPS',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));
        ConfigurationmResourceGroup::create(array( // Users (USER)
            'resourcegroup' => 'Users',
            'code' => 'USER',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));

        ConfigurationmResourceGroup::create(array( // Certificate / Gifts / Award (CERT)
            'resourcegroup' => 'Certificate / Gift / Award',
            'code' => 'CERT',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));

        ConfigurationmResourceGroup::create(array( // Security Sokamen
            'resourcegroup' => 'Security',
            'code' => 'SECU',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));

        ConfigurationmResourceGroup::create(array( // Campaign
            'resourcegroup' => 'Campaign',
            'code' => 'CAMP',
            'enabled' => env('RESOURCE_ENABLED'),
            'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
            'databaseversion' => '2.00.0000'
        ));

        Log::info("[Migration - Seeding] Modules Grouping seeded!");

        ConfigurationmResource::create(array( // Users (Dashboard - US01)
            'resource' => 'Users\Dashboard',
            'code' => 'US01',
            'resourcegroupcode' => 'USER'
        ));
        ConfigurationmResource::create(array( // Users (Profile - US02)
            'resource' => 'Users\Profile',
            'code' => 'US02',
            'resourcegroupcode' => 'USER'
        ));
        ConfigurationmResource::create(array( // Users (Login - US03)
            'resource' => 'Users\Login',
            'code' => 'US03',
            'resourcegroupcode' => 'USER'
        ));
        ConfigurationmResource::create(array( // Users (Logout - US04)
            'resource' => 'Users\Logout',
            'code' => 'US04',
            'resourcegroupcode' => 'USER'
        ));

        ConfigurationmResource::create(array( // Access Rights (Admin - AR01)
            'resource' => 'Access Rights\Admin',
            'code' => 'AR01',
            'resourcegroupcode' => 'ACRI'
        ));
        ConfigurationmResource::create(array( // Access Rights (Default Table - AR02)
            'resource' => 'Access Rights\Default Tables',
            'code' => 'AR02',
            'resourcegroupcode' => 'ACRI'
        ));
        ConfigurationmResource::create(array( // Access Rights (Listing - AR03)
            'resource' => 'Access Rights\Listing',
            'code' => 'AR03',
            'resourcegroupcode' => 'ACRI'
        ));
        ConfigurationmResource::create(array( // Access Rights (Record - AR04)
            'resource' => 'Access Rights\Record',
            'code' => 'AR04',
            'resourcegroupcode' => 'ACRI'
        ));
        ConfigurationmResource::create(array( // Access Rights (Report - AR04)
            'resource' => 'Access Rights\Report',
            'code' => 'AR05',
            'resourcegroupcode' => 'ACRI'
        ));

        ConfigurationmResource::create(array( // Common Tables (Default Table - CT01)
            'resource' => 'Common Tables\Default Tables',
            'code' => 'CT01',
            'resourcegroupcode' => 'CMTA'
        ));

        ConfigurationmResource::create(array( // Common Tables (Default Table - CT02)
            'resource' => 'Common Tables\Record',
            'code' => 'CT02',
            'resourcegroupcode' => 'CMTA'
        ));

        ConfigurationmResource::create(array( // Configuration (Admin - CO01)
            'resource' => 'Configuration\Admin',
            'code' => 'CO01',
            'resourcegroupcode' => 'CNFI'
        ));

        ConfigurationmResource::create(array( // Logs (Logs - LO01)
            'resource' => 'Logs\Default Tables',
            'code' => 'LO01',
            'resourcegroupcode' => 'LOGS'
        ));
        ConfigurationmResource::create(array( // Logs (Listing - LO02)
            'resource' => 'Logs\Listing',
            'code' => 'LO02',
            'resourcegroupcode' => 'LOGS'
        ));
        ConfigurationmResource::create(array( // Logs (Report - LO03)
            'resource' => 'Logs\Report',
            'code' => 'LO03',
            'resourcegroupcode' => 'LOGS'
        ));

        ConfigurationmResource::create(array( // Vehicle (Admin - VE01)
            'resource' => 'Vehicle\Admin',
            'code' => 'VE01',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Default Table - VE02)
            'resource' => 'Vehicle\Default Tables',
            'code' => 'VE02',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Listing - VE03)
            'resource' => 'Vehicle\Listing',
            'code' => 'VE03',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Record - VE04)
            'resource' => 'Vehicle\Record',
            'code' => 'VE04',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Booking Listing - VE05)
            'resource' => 'Vehicle\Booking Listing',
            'code' => 'VE05',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Booking Record - VE06)
            'resource' => 'Vehicle\Booking Record',
            'code' => 'VE06',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Cashcard - VE07)
            'resource' => 'Vehicle\Cashcard',
            'code' => 'VE07',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Maintenance - VE08)
            'resource' => 'Vehicle\Maintenance',
            'code' => 'VE08',
            'resourcegroupcode' => 'VEHI'
        ));
        ConfigurationmResource::create(array( // Vehicle (Report - VE09)
            'resource' => 'Vehicle\Report',
            'code' => 'VE09',
            'resourcegroupcode' => 'VEHI'
        ));

        ConfigurationmResource::create(array( // Event (Admin - EV01)
            'resource' => 'Event\Admin',
            'code' => 'EV01',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Default Table - EV02)
            'resource' => 'Event\Default Table',
            'code' => 'EV02',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Listing - EV03)
            'resource' => 'Event\Listing',
            'code' => 'EV03',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Record - EV04)
            'resource' => 'Event\Record',
            'code' => 'EV04',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Report - EV05)
            'resource' => 'Event\Report',
            'code' => 'EV05',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Registration - EV06)
            'resource' => 'Event\Registration',
            'code' => 'EV06',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Attendance Listing - EV07)
            'resource' => 'Event\Attendance\Listing',
            'code' => 'EV07',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Attendance Detail - EV08)
            'resource' => 'Event\Attendance\Detail',
            'code' => 'EV08',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (Card Listing - EV09)
            'resource' => 'Event\Card\Detail',
            'code' => 'EV09',
            'resourcegroupcode' => 'EVEN'
        ));
        ConfigurationmResource::create(array( // Event (New Friend Subscription - EV10)
            'resource' => 'Event\New Friend Subscription',
            'code' => 'EV10',
            'resourcegroupcode' => 'EVEN'
        ));

        ConfigurationmResource::create(array( // Attendance (Admin - AT01)
            'resource' => 'Attendance\Admin',
            'code' => 'AT01',
            'resourcegroupcode' => 'ATTE'
        ));
        ConfigurationmResource::create(array( // Attendance (Default Table - AT02)
            'resource' => 'Attendance\Default Table',
            'code' => 'AT02',
            'resourcegroupcode' => 'ATTE'
        ));
        ConfigurationmResource::create(array( // Attendance (Attendance - AT03)
            'resource' => 'Attendance\Listing',
            'code' => 'AT03',
            'resourcegroupcode' => 'ATTE'
        ));
        ConfigurationmResource::create(array( // Attendance (Record - AT04)
            'resource' => 'Attendance\Record',
            'code' => 'AT04',
            'resourcegroupcode' => 'ATTE'
        ));
        ConfigurationmResource::create(array( // Attendance (Report - AT05)
            'resource' => 'Attendance\Report',
            'code' => 'AT05',
            'resourcegroupcode' => 'ATTE'
        ));

        ConfigurationmResource::create(array( // Members (Admin - ME01)
            'resource' => 'Members\Admin',
            'code' => 'ME01',
            'resourcegroupcode' => 'SSAM'
        ));
        ConfigurationmResource::create(array( // Members (Default Table - ME02)
            'resource' => 'Members\Default Table',
            'code' => 'ME02',
            'resourcegroupcode' => 'SSAM'
        ));
        ConfigurationmResource::create(array( // Members (Listing - ME03)
            'resource' => 'Members\Listing',
            'code' => 'ME03',
            'resourcegroupcode' => 'SSAM'
        ));
        ConfigurationmResource::create(array( // Members (Record - ME04)
            'resource' => 'Members\Record',
            'code' => 'ME04',
            'resourcegroupcode' => 'SSAM'
        ));
        ConfigurationmResource::create(array( // Members (Report - ME05)
            'resource' => 'Members\Report',
            'code' => 'ME05',
            'resourcegroupcode' => 'SSAM'
        ));
        ConfigurationmResource::create(array( // Members (Request - ME06)
            'resource' => 'Members\Request',
            'code' => 'ME06',
            'resourcegroupcode' => 'SSAM'
        ));

        ConfigurationmResource::create(array( // Groups (Admin - GP01)
            'resource' => 'Groups\Admin',
            'code' => 'GP01',
            'resourcegroupcode' => 'GRPS'
        ));
        ConfigurationmResource::create(array( // Groups (Default Table - GP02)
            'resource' => 'Groups\Default Table',
            'code' => 'GP02',
            'resourcegroupcode' => 'GRPS'
        ));
        ConfigurationmResource::create(array( // Groups (Listing - GP03)
            'resource' => 'Groups\Listing',
            'code' => 'GP03',
            'resourcegroupcode' => 'GRPS'
        ));
        ConfigurationmResource::create(array( // Groups (Record - GP04)
            'resource' => 'Groups\Record',
            'code' => 'GP04',
            'resourcegroupcode' => 'GRPS'
        ));
        ConfigurationmResource::create(array( // Groups (Report - GP05)
            'resource' => 'Groups\Report',
            'code' => 'GP05',
            'resourcegroupcode' => 'GRPS'
        ));

        ConfigurationmResource::create(array( // Certificate / Gift / Award (Admin - CE01)
            'resource' => 'Certificate\Admin',
            'code' => 'CE01',
            'resourcegroupcode' => 'CERT'
        ));
        ConfigurationmResource::create(array( // Certificate / Gift / Award (Default Table - CE02)
            'resource' => 'Certificate\Default Table',
            'code' => 'CE02',
            'resourcegroupcode' => 'CERT'
        ));
        ConfigurationmResource::create(array( // Certificate / Gift / Award (Listing - CE03)
            'resource' => 'Certificate\Listing',
            'code' => 'CE03',
            'resourcegroupcode' => 'CERT'
        ));
        ConfigurationmResource::create(array( // Certificate / Gift / Award (Record - CE04)
            'resource' => 'Certificate\Record',
            'code' => 'CE04',
            'resourcegroupcode' => 'CERT'
        ));
        ConfigurationmResource::create(array( // Certificate / Gift / Award (Report - CE05)
            'resource' => 'Certificate\Report',
            'code' => 'CE05',
            'resourcegroupcode' => 'CERT'
        ));
        ConfigurationmResource::create(array( // Access Card (Admin - CA01)
            'resource' => 'Access Card\Admin',
            'code' => 'CA01',
            'resourcegroupcode' => 'CARD'
        ));
        ConfigurationmResource::create(array( // Access Card (Default Table - CA02)
            'resource' => 'Access Card\Default Table',
            'code' => 'CA02',
            'resourcegroupcode' => 'CARD'
        ));
        ConfigurationmResource::create(array( // Access Card (Listing - CA03)
            'resource' => 'Access Card\Listing',
            'code' => 'CA03',
            'resourcegroupcode' => 'CARD'
        ));
        ConfigurationmResource::create(array( // Access Card (Record - CA04)
            'resource' => 'Access Card\Record',
            'code' => 'CA04',
            'resourcegroupcode' => 'CARD'
        ));
        ConfigurationmResource::create(array( // Access Card (Report - CA05)
            'resource' => 'Access Card\Report',
            'code' => 'CA05',
            'resourcegroupcode' => 'CARD'
        ));

        ConfigurationmResource::create(array( // Security (Admin - SC01)
            'resource' => 'Security\Admin',
            'code' => 'SC01',
            'resourcegroupcode' => 'SECU'
        ));
        ConfigurationmResource::create(array( // Security (Default Table - SC02)
            'resource' => 'Security\Default Table',
            'code' => 'SC02',
            'resourcegroupcode' => 'SECU'
        ));
        ConfigurationmResource::create(array( // Security (Listing - SC03)
            'resource' => 'Security\Listing',
            'code' => 'SC03',
            'resourcegroupcode' => 'SECU'
        ));
        ConfigurationmResource::create(array( // Security (Record - SC04)
            'resource' => 'Security\Record',
            'code' => 'SC04',
            'resourcegroupcode' => 'SECU'
        ));
        ConfigurationmResource::create(array( // Security (Report - SC05)
            'resource' => 'Security\Report',
            'code' => 'SC05',
            'resourcegroupcode' => 'SECU'
        ));

        ConfigurationmResource::create(array( // Campaign (Admin - CP01)
            'resource' => 'Campaign\Admin',
            'code' => 'CP01',
            'resourcegroupcode' => 'CAMP'
        ));
        ConfigurationmResource::create(array( // Campaign (Default Table - CP02)
            'resource' => 'Campaign\Default Table',
            'code' => 'CP02',
            'resourcegroupcode' => 'CAMP'
        ));
        ConfigurationmResource::create(array( // Campaign (Listing - CP03)
            'resource' => 'Campaign\Listing',
            'code' => 'CP03',
            'resourcegroupcode' => 'CAMP'
        ));
        ConfigurationmResource::create(array( // Campaign (Record - CP04)
            'resource' => 'Campaign\Record',
            'code' => 'CP04',
            'resourcegroupcode' => 'CAMP'
        ));
        ConfigurationmResource::create(array( // Campaign (Report - CP05)
            'resource' => 'Campaign\Report',
            'code' => 'CP05',
            'resourcegroupcode' => 'CAMP'
        ));

        Log::info("[Migration - Seeding] Modules seeded!");

        LogszLogType::create(array('value' => 'Login'));
        LogszLogType::create(array('value' => 'Logout'));
        LogszLogType::create(array('value' => 'Create'));
        LogszLogType::create(array('value' => 'Read'));
        LogszLogType::create(array('value' => 'Update'));
        LogszLogType::create(array('value' => 'Delete'));
        LogszLogType::create(array('value' => 'Void'));
        LogszLogType::create(array('value' => 'Unvoid'));
        LogszLogType::create(array('value' => 'Print'));
        LogszLogType::create(array('value' => 'Error'));
        LogszLogType::create(array('value' => 'Unknown'));

        Log::info("[Migration - Seeding] Logs Type seeded!");

        LogszStatus::create(array('value' => 'Success'));
        LogszStatus::create(array('value' => 'Failed'));

        Log::info("[Migration - Seeding] Logs Status seeded!");

        VehiclezMaintenanceType::create(array('value' => 'Servicing'));
        VehiclezMaintenanceType::create(array('value' => 'Fill-up Petrol'));
        VehiclezMaintenanceType::create(array('value' => 'Others'));

        Log::info("[Migration - Seeding] Vehicle Maintenance Type seeded!");

        VehiclemVehicle::create(array('vehicleno' => 'SLE8302H', 'status' => 'Active', 'uniquecode' => Str::uuid()));
        VehiclemVehicle::create(array('vehicleno' => 'SML2827B', 'status' => 'Active', 'uniquecode' => Str::uuid()));
        VehiclemVehicle::create(array('vehicleno' => 'GBJ774Z', 'status' => 'Active', 'uniquecode' => Str::uuid()));

        Log::info("[Migration - Seeding] Vehicles seeded!");

        VehiclezBookingStatus::create(array('value' => 'Processing'));
        VehiclezBookingStatus::create(array('value' => 'Approved'));
        VehiclezBookingStatus::create(array('value' => 'Rejected'));

        Log::info("[Migration - Seeding] Vehicle Booking Status seeded!");

        
        Log::notice("[Migration - Seeding] Default Value successfully seeded!");
    }
}
