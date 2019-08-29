<?php

use App\Models\Configuration\Resource;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'System Administrator' => ['create', 'read', 'update', 'delete', 'void', 'unvoid', 'print'],
            'Software Administrator' => ['create', 'read', 'update', 'delete', 'void', 'unvoid', 'print'],
            'Resource Administrator' => ['create', 'read', 'update', 'delete', 'void', 'unvoid', 'print'],
            'User' => ['read', 'print'],
            'Event Administrator' => ['read', 'print'],
            'Single Event Administrator' => ['read', 'print'],
            'Single Group Administrator' => ['read', 'print'],
            'Single Group User' => ['read', 'print'],
            'Single Event User' => ['read', 'print'],
            'Single Event Item User' => ['read', 'print'],
            'Event Chief Trainer' => ['read', 'print'],
            'Event Trainer' => ['read', 'print'],
            'Gakkai Administrator' => ['read', 'print'],
            'Region User' => ['read', 'print'],
            'Zone User' => ['read', 'print'],
            'Chapter user' => ['read', 'print'],
            'District User' => ['read', 'print'],
            'SHQ User' => ['read', 'print'],
        ];
        $resources = Resource::all();
        foreach ($roles as $role => $permissions) {
            $name = str_replace(' ', '-', strtolower($role));
            $role = Role::create([
                'name' => $name,
                'description' => $role,
            ]);
            $role->givePermissionTo($permissions);
            $resource = $resources->random();
            $role->resource()->attach($resource->id);
        }
    }
}
