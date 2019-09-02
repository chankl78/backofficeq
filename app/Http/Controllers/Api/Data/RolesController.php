<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\Configuration\Resource;
use App\Models\Role;
use App\Models\Permission;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $roles = Role::with('resource')->orderBy('created_at', 'DESC')->get();

        return response()->json($roles, 200);
    }

    public function role(Request $request)
    {
        $permissions = Permission::all();
        $resources = Resource::select('id', 'resourcegroupcode', 'code', 'resource')->get();

        if ($request->get('id') === 'new') {
            return response()->json([
                'role' => false,
                'permissions' => $permissions,
                'resources' => $resources,
            ]);
        } elseif ($role = Role::with(['permissions', 'resource'])->find($request->get('id'))) {
            return response()->json([
                'role' => $role,
                'permissions' => $permissions,
                'resources' => $resources,
            ]);
        } else {
            return response()->json([
                'error' => 'Role not found'
            ]);
        }
    }

    public function create(Request $request)
    {
        $roleName = $request->get('value');
        $permissions = $request->get('permissions');
        $resource = $request->get('resource');
        $allRoles = Role::all()->pluck('name')->toArray();

        if (!in_array($roleName, $allRoles) && is_array($permissions) && count($permissions) > 0) {
            try {
                $role = Role::create([
                    'name' => str_replace(' ', '-', strtolower($roleName)),
                    'description' => $roleName,
                    'guard_name' => 'api',
                ]);
                $permissions = $request->get('permissions');
                if (is_array($permissions) && count($permissions) > 0) {
                    foreach ($request->get('permissions') as $permission) {
                        $permissions[] = Permission::findByName($permission);
                    }
                    $role->syncPermissions($permissions);
                }

                if (isset($resource['id'])) {
                    $_resource = Resource::where(['id' => $resource['id']])->first();
                    if ($_resource) {
                        $role->resource()->detach();
                        $role->resource()->attach($_resource->id);
                    }
                }

                $this->logger->info('[Role create] Role created successfully.');
                return response()->json([
                    'message' => 'Role created successfully',
                ], 201);
            } catch (\Exception $e) {
                $this->logger->error('[Role create] ' . $e->getMessage());
                return response()->json([
                    'error' => $e->getMessage() , //'Error when create role',
                ], 500);
            }
        }
        $message = sprintf('Role "%s" already exists.', $roleName);

        $this->logger->warning('[Role create] ' . $message);
        return response()->json([
            'error' => $message
        ], 409);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->get('id');
            $resource = $request->get('resource');
            $newRoleName = $request->get('value');
            $permissions = [];
            foreach ($request->get('permissions') as $permission) {
                $permissions[] = Permission::findByName($permission);
            }
            $role = Role::with(['permissions', 'resource'])->where(['id' => $id])->first();
            $role->description = $newRoleName;
            $role->syncPermissions($permissions);

            if (isset($resource['id'])) {
                $_resource = Resource::where(['id' => $resource['id']])->first();
                if ($_resource) {
                    $role->resource()->detach();
                    $role->resource()->attach($_resource->id);
                }
            }

            $role->save();

            $this->logger->info('[Role update] Role updated successfully.');
            return response()->json($role, 200);
        } catch (\Exception $e) {
            $this->logger->error('[Role update] ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage() //'Error when role update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            Role::find($id)->delete();

            $this->logger->info('[Role delete] Role deleted successfully.');
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            $this->logger->info('[Role delete] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when role delete',
            ], 409);
        }
    }

}
