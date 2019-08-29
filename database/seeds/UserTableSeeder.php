<?php

use App\Models\AccessType;
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
    }
}
