<?php

use App\Models\Configuration\Resource;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ConfigurationResource extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            [// Users (Dashboard - US01)
                'resource' => 'Users\Dashboard',
                'code' => 'US01',
                'resourcegroupcode' => 'USER'
            ],
            [// Users (Profile - US02)
                'resource' => 'Users\Profile',
                'code' => 'US02',
                'resourcegroupcode' => 'USER'
            ],
            [// Users (Login - US03)
                'resource' => 'Users\Login',
                'code' => 'US03',
                'resourcegroupcode' => 'USER'
            ],
            [// Users (Logout - US04)
                'resource' => 'Users\Logout',
                'code' => 'US04',
                'resourcegroupcode' => 'USER'
            ],
            [// Access Rights (Admin - AR01)
                'resource' => 'Access Rights\Admin',
                'code' => 'AR01',
                'resourcegroupcode' => 'ACRI'
            ],
            [// Access Rights (Default Table - AR02)
                'resource' => 'Access Rights\Default Tables',
                'code' => 'AR02',
                'resourcegroupcode' => 'ACRI'
            ],
            [// Access Rights (Listing - AR03)
                'resource' => 'Access Rights\Listing',
                'code' => 'AR03',
                'resourcegroupcode' => 'ACRI'
            ],
            [// Access Rights (Record - AR04)
                'resource' => 'Access Rights\Record',
                'code' => 'AR04',
                'resourcegroupcode' => 'ACRI'
            ],
            [// Access Rights (Report - AR04)
                'resource' => 'Access Rights\Report',
                'code' => 'AR05',
                'resourcegroupcode' => 'ACRI'
            ],
            [// Common Tables (Default Table - CT01)
                'resource' => 'Common Tables\Default Tables',
                'code' => 'CT01',
                'resourcegroupcode' => 'CMTA'
            ],
            [// Common Tables (Default Table - CT02)
                'resource' => 'Common Tables\Record',
                'code' => 'CT02',
                'resourcegroupcode' => 'CMTA'
            ],
            [// Configuration (Admin - CO01)
                'resource' => 'Configuration\Admin',
                'code' => 'CO01',
                'resourcegroupcode' => 'CNFI'
            ],
            [// Logs (Logs - LO01)
                'resource' => 'Logs\Default Tables',
                'code' => 'LO01',
                'resourcegroupcode' => 'LOGS'
            ],
            [// Logs (Listing - LO02)
                'resource' => 'Logs\Listing',
                'code' => 'LO02',
                'resourcegroupcode' => 'LOGS'
            ],
            [// Logs (Report - LO03)
                'resource' => 'Logs\Report',
                'code' => 'LO03',
                'resourcegroupcode' => 'LOGS'
            ],
            [// Vehicle (Admin - VE01)
                'resource' => 'Vehicle\Admin',
                'code' => 'VE01',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Default Table - VE02)
                'resource' => 'Vehicle\Default Tables',
                'code' => 'VE02',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Listing - VE03)
                'resource' => 'Vehicle\Listing',
                'code' => 'VE03',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Record - VE04)
                'resource' => 'Vehicle\Record',
                'code' => 'VE04',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Booking Listing - VE05)
                'resource' => 'Vehicle\Booking Listing',
                'code' => 'VE05',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Booking Record - VE06)
                'resource' => 'Vehicle\Booking Record',
                'code' => 'VE06',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Cashcard - VE07)
                'resource' => 'Vehicle\Cashcard',
                'code' => 'VE07',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Maintenance - VE08)
                'resource' => 'Vehicle\Maintenance',
                'code' => 'VE08',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Vehicle (Report - VE09)
                'resource' => 'Vehicle\Report',
                'code' => 'VE09',
                'resourcegroupcode' => 'VEHI'
            ],
            [// Event (Admin - EV01)
                'resource' => 'Event\Admin',
                'code' => 'EV01',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Default Table - EV02)
                'resource' => 'Event\Default Table',
                'code' => 'EV02',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Listing - EV03)
                'resource' => 'Event\Listing',
                'code' => 'EV03',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Record - EV04)
                'resource' => 'Event\Record',
                'code' => 'EV04',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Report - EV05)
                'resource' => 'Event\Report',
                'code' => 'EV05',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Registration - EV06)
                'resource' => 'Event\Registration',
                'code' => 'EV06',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Attendance Listing - EV07)
                'resource' => 'Event\Attendance\Listing',
                'code' => 'EV07',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Attendance Detail - EV08)
                'resource' => 'Event\Attendance\Detail',
                'code' => 'EV08',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (Card Listing - EV09)
                'resource' => 'Event\Card\Detail',
                'code' => 'EV09',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Event (New Friend Subscription - EV10)
                'resource' => 'Event\New Friend Subscription',
                'code' => 'EV10',
                'resourcegroupcode' => 'EVEN'
            ],
            [// Attendance (Admin - AT01)
                'resource' => 'Attendance\Admin',
                'code' => 'AT01',
                'resourcegroupcode' => 'ATTE'
            ],
            [// Attendance (Default Table - AT02)
                'resource' => 'Attendance\Default Table',
                'code' => 'AT02',
                'resourcegroupcode' => 'ATTE'
            ],
            [// Attendance (Attendance - AT03)
                'resource' => 'Attendance\Listing',
                'code' => 'AT03',
                'resourcegroupcode' => 'ATTE'
            ],
            [// Attendance (Record - AT04)
                'resource' => 'Attendance\Record',
                'code' => 'AT04',
                'resourcegroupcode' => 'ATTE'
            ],
            [// Attendance (Report - AT05)
                'resource' => 'Attendance\Report',
                'code' => 'AT05',
                'resourcegroupcode' => 'ATTE'
            ],
            [// Members (Admin - ME01)
                'resource' => 'Members\Admin',
                'code' => 'ME01',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Members (Default Table - ME02)
                'resource' => 'Members\Default Table',
                'code' => 'ME02',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Members (Listing - ME03)
                'resource' => 'Members\Listing',
                'code' => 'ME03',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Members (Record - ME04)
                'resource' => 'Members\Record',
                'code' => 'ME04',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Members (Report - ME05)
                'resource' => 'Members\Report',
                'code' => 'ME05',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Members (Request - ME06)
                'resource' => 'Members\Request',
                'code' => 'ME06',
                'resourcegroupcode' => 'SSAM'
            ],
            [// Groups (Admin - GP01)
                'resource' => 'Groups\Admin',
                'code' => 'GP01',
                'resourcegroupcode' => 'GRPS'
            ],
            [// Groups (Default Table - GP02)
                'resource' => 'Groups\Default Table',
                'code' => 'GP02',
                'resourcegroupcode' => 'GRPS'
            ],
            [// Groups (Listing - GP03)
                'resource' => 'Groups\Listing',
                'code' => 'GP03',
                'resourcegroupcode' => 'GRPS'
            ],
            [// Groups (Record - GP04)
                'resource' => 'Groups\Record',
                'code' => 'GP04',
                'resourcegroupcode' => 'GRPS'
            ],
            [// Groups (Report - GP05)
                'resource' => 'Groups\Report',
                'code' => 'GP05',
                'resourcegroupcode' => 'GRPS'
            ],
            [// Certificate / Gift / Award (Admin - CE01)
                'resource' => 'Certificate\Admin',
                'code' => 'CE01',
                'resourcegroupcode' => 'CERT'
            ],
            [// Certificate / Gift / Award (Default Table - CE02)
                'resource' => 'Certificate\Default Table',
                'code' => 'CE02',
                'resourcegroupcode' => 'CERT'
            ],
            [// Certificate / Gift / Award (Listing - CE03)
                'resource' => 'Certificate\Listing',
                'code' => 'CE03',
                'resourcegroupcode' => 'CERT'
            ],
            [// Certificate / Gift / Award (Record - CE04)
                'resource' => 'Certificate\Record',
                'code' => 'CE04',
                'resourcegroupcode' => 'CERT'
            ],
            [// Certificate / Gift / Award (Report - CE05)
                'resource' => 'Certificate\Report',
                'code' => 'CE05',
                'resourcegroupcode' => 'CERT'
            ],
            [// Access Card (Admin - CA01)
                'resource' => 'Access Card\Admin',
                'code' => 'CA01',
                'resourcegroupcode' => 'CARD'
            ],
            [// Access Card (Default Table - CA02)
                'resource' => 'Access Card\Default Table',
                'code' => 'CA02',
                'resourcegroupcode' => 'CARD'
            ],
            [// Access Card (Listing - CA03)
                'resource' => 'Access Card\Listing',
                'code' => 'CA03',
                'resourcegroupcode' => 'CARD'
            ],
            [// Access Card (Record - CA04)
                'resource' => 'Access Card\Record',
                'code' => 'CA04',
                'resourcegroupcode' => 'CARD'
            ],
            [// Access Card (Report - CA05)
                'resource' => 'Access Card\Report',
                'code' => 'CA05',
                'resourcegroupcode' => 'CARD'
            ],
            [// Security (Admin - SC01)
                'resource' => 'Security\Admin',
                'code' => 'SC01',
                'resourcegroupcode' => 'SECU'
            ],
            [// Security (Default Table - SC02)
                'resource' => 'Security\Default Table',
                'code' => 'SC02',
                'resourcegroupcode' => 'SECU'
            ],
            [// Security (Listing - SC03)
                'resource' => 'Security\Listing',
                'code' => 'SC03',
                'resourcegroupcode' => 'SECU'
            ],
            [// Security (Record - SC04)
                'resource' => 'Security\Record',
                'code' => 'SC04',
                'resourcegroupcode' => 'SECU'
            ],
            [// Security (Report - SC05)
                'resource' => 'Security\Report',
                'code' => 'SC05',
                'resourcegroupcode' => 'SECU'
            ],
            [// Campaign (Admin - CP01)
                'resource' => 'Campaign\Admin',
                'code' => 'CP01',
                'resourcegroupcode' => 'CAMP'
            ],
            [// Campaign (Default Table - CP02)
                'resource' => 'Campaign\Default Table',
                'code' => 'CP02',
                'resourcegroupcode' => 'CAMP'
            ],
            [// Campaign (Listing - CP03)
                'resource' => 'Campaign\Listing',
                'code' => 'CP03',
                'resourcegroupcode' => 'CAMP'
            ],
            [// Campaign (Record - CP04)
                'resource' => 'Campaign\Record',
                'code' => 'CP04',
                'resourcegroupcode' => 'CAMP'
            ],
            [// Campaign (Report - CP05)
                'resource' => 'Campaign\Report',
                'code' => 'CP05',
                'resourcegroupcode' => 'CAMP'
            ],
        ];

        $permissions = Permission::all();

        foreach ($resources as $resource) {
            $_permissions = [];
            $resource = Resource::create($resource);
            foreach ($permissions as $i => $permission) {
                if ($i % random_int(1, 5) === 0) {
                    $_permissions[] = $permission->id;
                }
            }
            $resource->permissions()->sync($_permissions);
        }

        Log::info("[Migration - Seeding] Modules seeded!");
    }
}
