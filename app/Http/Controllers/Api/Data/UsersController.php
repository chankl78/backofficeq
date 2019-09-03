<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccessType;
use App\Models\Configuration\Resource;
use App\Models\Status;
use App\Models\User;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $users = User::with(['roles', 'accessTypes', 'status'])
            ->orderBy('created_at', 'DESC')
            ->get();
        $users = $users->reject(function ($user) {
            return $user->hasAnyRole(['system-administrator', 'software-administrator']);
        });

        return response()->json($users, 200);
    }

    public function info(Request $request)
    {
        try {
            $roles = Role::with('permissions', 'resources', 'resources.permissions')->get();
            $accessTypes = AccessType::all();
            $statusesList = Status::all();
            $user = User::with(['roles', 'accessTypes', 'status'])
                ->where(['uniquecode' => $request->get('id')])
                ->first();
            $modules = Role::with(['resources', 'resources.permissions'])
                ->whereIn('id', $user->roles()->pluck('id'))
                ->first();
            if ($user) {
                return response()->json([
                    'user' => $user,
                    'roles' => $roles,
                    'modules' => $modules->resources,
                    'accessTypeList' => $accessTypes,
                    'statusesList' => $statusesList,
                ]);
            } else {
                return response()->json([
                    'error' => 'User not found'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() //'Error when load user info'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $_user = $request->get('user');
            $_role = $request->get('role');
            $_accessType = $request->get('access_type');
            $_status = $request->get('status');
            $user = User::with(['roles', 'accessTypes', 'status'])
                ->where(['uniquecode' => $_user['uniquecode']])
                ->first();
            $user->update([
                'username' => $_user['username'],
                'email' => $_user['email'],
                'name' => $_user['name']
            ]);
            $role = Role::whereIn('id', collect($_role)->pluck('id'))->get()->pluck('name');
            if ($role) {
                $user->syncRoles($role);
            }
            $status = Status::where(['id' => $_status['id']])->first();
            if ($status) {
                $user->status()->detach();
                $user->status()->attach($status->id);
            }
            if (isset($_accessType['id'])) {
                $accessType = AccessType::where(['id' => $_accessType['id']])->first();
                if ($accessType) {
                    $user->accessTypes()->detach();
                    $user->accessTypes()->attach($accessType->id);
                }
            }
            $user->save();

            $this->logger->info('[User update] User updated successfully');
            return response()->json([
                'message' => 'User updated'
            ], 200);
        } catch (\Exception $e) {
            $this->logger->error('[User update] ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage(), //'Error when user update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            User::where(['uniquecode' => $id])->delete();

            $this->logger->info('[User delete] Role deleted successfully.');
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            $this->logger->info('[User delete] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when user delete',
            ], 409);
        }
    }

}
