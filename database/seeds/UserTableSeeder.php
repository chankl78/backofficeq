<?php

use App\Models\AccessType;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemAdminRole = Role::where(['name' => 'system-administrator'])->first();
        $softwareAdminRole = Role::where(['name' => 'software-administrator'])->first();
        $userRole = Role::where(['name' => 'user'])->first();
        $adminAccessType = AccessType::where(['name' => 'admin'])->first();
        $temporaryAccessType = AccessType::where(['name' => 'temporary'])->first();
        $status = Status::find(1);

        $systemAdmin = User::create([
            'name' => env('LH_NAME'),
            'email' => env('LH_EMAIL'),
            'username' => 'ssasoft',
            'uniquecode' => Str::uuid(),
            'email_verified_at' => now(),
            'password' => Hash::make(env('LH_PASSWORD')),
        ]);
        $systemAdmin->assignRole($systemAdminRole);
        $systemAdmin->accessTypes()->attach($adminAccessType->id);
        $systemAdmin->status()->attach($status->id);

        $softwareAdmin = User::create([
            'name' => env('LHG_NAME'),
            'email' => env('LHG_EMAIL'),
            'username' => env('LHG_USERNAME'),
            'uniquecode' => Str::uuid(),
            'email_verified_at' => now(),
            'password' => Hash::make(env('LH_PASSWORD')),
        ]);
        $softwareAdmin->assignRole($softwareAdminRole);
        $softwareAdmin->accessTypes()->attach($adminAccessType->id);
        $softwareAdmin->status()->attach($status->id);

        for ($i = 1; $i < 12; $i++) {
            $email = sprintf('user%s@user%s.loc', $i, $i);
            $user = User::create([
                'name' => $email,
                'email' => $email,
                'username' => $email,
                'uniquecode' => Str::uuid(),
                'email_verified_at' => now(),
                'password' => Hash::make('qweqweqwe'),
            ]);
            $user->assignRole($userRole);
            $user->accessTypes()->attach(AccessType::find(random_int(2, 4))->id);
            $user->status()->attach(Status::find(random_int(1, 3))->id);
        }
        $user = User::create([
            'name' => 'user@user.loc',
            'email' => 'user@user.loc',
            'username' => 'user@user.loc',
            'uniquecode' => Str::uuid(),
            'email_verified_at' => now(),
            'password' => Hash::make('qweqweqwe'),
        ]);
        $user->assignRole($userRole);
        $user->accessTypes()->attach($temporaryAccessType->id);
        $user->status()->attach($status->id);
    }
}
