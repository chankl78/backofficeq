<?php

use App\Models\Configuration\ResourceGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ConfigurationResourceGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [// Access Rights (ACRI)
                'resourcegroup' => 'Access Rights',
                'code' => 'ACRI',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Common Tables (CMTA)
                'resourcegroup' => 'Common Tables',
                'code' => 'CMTA',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Configuration (CNFI)
                'resourcegroup' => 'Configuration',
                'code' => 'CNFI',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Logs (LOGS)
                'resourcegroup' => 'Logs',
                'code' => 'LOGS',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Vehicle (VEHI)
                'resourcegroup' => 'Vehicle',
                'code' => 'VEHI',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Event (EVEN)
                'resourcegroup' => 'Event',
                'code' => 'EVEN',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Attendance (ATTE)
                'resourcegroup' => 'Attendance',
                'code' => 'ATTE',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// SSA Members (SSAM)
                'resourcegroup' => 'SSA Members',
                'code' => 'SSAM',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Groups (GRPS)
                'resourcegroup' => 'Groups',
                'code' => 'GRPS',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Users (USER)
                'resourcegroup' => 'Users',
                'code' => 'USER',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Certificate / Gifts / Award (CERT)
                'resourcegroup' => 'Certificate / Gift / Award',
                'code' => 'CERT',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Security Sokamen
                'resourcegroup' => 'Security',
                'code' => 'SECU',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ],
            [// Campaign
                'resourcegroup' => 'Campaign',
                'code' => 'CAMP',
                'enabled' => env('RESOURCE_ENABLED'),
                'applicationversion' => '2.00.0000', // version, minor enhancement, bugs
                'databaseversion' => '2.00.0000'
            ]
        ];
        foreach ($groups as $group) {
            ResourceGroup::create($group);
        }
        Log::info("[Migration - Seeding] Modules Grouping seeded!");
    }
}
