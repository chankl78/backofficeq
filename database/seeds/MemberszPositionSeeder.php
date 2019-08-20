<?php

use Illuminate\Database\Seeder;
use App\Models\MemberszPosition;

class MemberszPositionSeeder extends Seeder
{
    public function run()
    {
        // Blank
        MemberszPosition::create(array('code' => '-', 'name' => '-', 'level' => '-'));

        // SHQ
        MemberszPosition::create(array('code' => 'S1', 'name' => 'Division Chief', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S11', 'name' => 'Hon. Div Chief', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S2', 'name' => 'Division Vice Chief', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S2N', 'name' => 'SHQ Nightingale', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S3', 'name' => 'Hon. Div Leader', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S32', 'name' => 'Vice Hon. Div Leader', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S3A', 'name' => 'Guidance Advisor', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S5', 'name' => 'Div Advisor', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_1', 'name' => 'Youth Chief', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_2', 'name' => 'Vice Youth Chief', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_D1', 'name' => 'General Director', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_D1A', 'name' => 'Senior Advisor', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_D1H', 'name' => 'Hon. Gen Director', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_D2', 'name' => 'Vice Gen Director', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_E1', 'name' => 'Executive Advisor', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_E2', 'name' => 'Vice Exec Advisor', 'level' => 'shq'));
        MemberszPosition::create(array('code' => 'S_G', 'name' => 'General Division Chief', 'level' => 'shq'));

        // RHQ
        MemberszPosition::create(array('code' => 'H1', 'name' => 'Region HQ Chief', 'level' => 'rhq'));
        MemberszPosition::create(array('code' => 'H1+', 'name' => 'Headquarter Chief {Sec}', 'level' => 'rhq'));
        MemberszPosition::create(array('code' => 'H2', 'name' => 'Vice Region HQ Chief', 'level' => 'rhq'));
        MemberszPosition::create(array('code' => 'H3', 'name' => 'Hon. Region HQ Ldr', 'level' => 'rhq'));
        MemberszPosition::create(array('code' => 'H5', 'name' => 'Region HQ Advisor', 'level' => 'rhq'));
        MemberszPosition::create(array('code' => 'H_E1', 'name' => 'Executive Advisor', 'level' => 'rhq'));

        // Zone
        MemberszPosition::create(array('code' => 'Z1', 'name' => 'Zone HQ Chief', 'level' => 'zone'));
        MemberszPosition::create(array('code' => 'Z2', 'name' => 'Vice Zone HQ Chief', 'level' => 'zone'));
        MemberszPosition::create(array('code' => 'Z3', 'name' => 'Hon. Zone HQ Ldr', 'level' => 'zone'));
        MemberszPosition::create(array('code' => 'Z5', 'name' => 'Zone HQ Advisor', 'level' => 'zone'));
        MemberszPosition::create(array('code' => 'Z_E1', 'name' => 'Executive Advisor', 'level' => 'zone'));

        // Chapter
        MemberszPosition::create(array('code' => 'C1', 'name' => 'Chapter Chief', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C1V', 'name' => 'Visiting Chapter Chief', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C2', 'name' => 'Vice Chapter Chief', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C2V', 'name' => 'Vice Visiting Chapter Chief', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C3', 'name' => 'Hon. Chapter Ldr', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C5', 'name' => 'Chapter Advisor', 'level' => 'chapter'));
        MemberszPosition::create(array('code' => 'C6', 'name' => 'Chapter Glory Member', 'level' => 'chapter'));

        // District
        MemberszPosition::create(array('code' => 'D1', 'name' => 'District Chief', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D1V', 'name' => 'Visiting District Chief', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D2', 'name' => 'Vice District Chief', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D2V', 'name' => 'Vice Visiting District Chief', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D3', 'name' => 'Hon. District Ldr', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D5', 'name' => 'District Advisor', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'D6', 'name' => 'District Glory Member', 'level' => 'district'));
        MemberszPosition::create(array('code' => 'DA', 'name' => 'Soka Ambassador', 'level' => 'district'));

        // Member, Believer, New Friend
        MemberszPosition::create(array('code' => 'MEM', 'name' => 'Member', 'level' => 'mem'));
        MemberszPosition::create(array('code' => 'BEL', 'name' => 'Believer', 'level' => 'bel'));
        MemberszPosition::create(array('code' => 'NF', 'name' => 'New Friend', 'level' => 'nf'));

        // Dormont Leadership
        MemberszPosition::create(array('code' => 'NA?', 'name' => 'Non Active Mem/Bel', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XC', 'name' => 'Chapter Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XD', 'name' => 'District Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XG', 'name' => 'Group Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XH', 'name' => 'HQ Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XR', 'name' => 'Region Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XS', 'name' => 'SHQ Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XX', 'name' => 'Dormant', 'level' => NULL));
        MemberszPosition::create(array('code' => 'XZ', 'name' => 'Zone Dormant', 'level' => NULL));

        // Region (Not Using anymore but still need records)
        MemberszPosition::create(array('code' => 'R1', 'name' => 'Region Chief', 'level' => 'region', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'R2', 'name' => 'Vice Region Chief', 'level' => 'region', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'R3', 'name' => 'Hon. Region Ldr', 'level' => 'region', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'R5', 'name' => 'Region Advisor', 'level' => 'region', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'R_E1', 'name' => 'Executive Advisor', 'level' => 'region', 'notinuse' => 1));

        // Group (Not Using anymore but still need records)
        MemberszPosition::create(array('code' => 'G', 'name' => 'Group Chief', 'level' => 'group', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'G1', 'name' => 'Group (Old)', 'level' => 'group', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'G2', 'name' => 'Asst Group (Old)', 'level' => 'group', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'G3', 'name' => 'Hon. Group Leader', 'level' => 'group', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'G5', 'name' => 'Group Advisor', 'level' => 'group', 'notinuse' => 1));
        MemberszPosition::create(array('code' => 'G6', 'name' => 'Group Glory Member', 'level' => 'group', 'notinuse' => 1));

        Log::notice("[Migration - Seeding] Members Position successfully seeded!");
    }
}
