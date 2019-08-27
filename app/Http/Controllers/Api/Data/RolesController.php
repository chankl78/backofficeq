<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccesszRoles;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $roles = AccesszRoles::select(['id', 'value'])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($roles, 200);
    }

    public function role(Request $request)
    {
        if ($role = AccesszRoles::find($request->get('id'))) {
            return response()->json($role);
        } else {
            return response()->json([
                'error' => 'Role not found'
            ]);
        }
    }

    public function create(Request $request)
    {
        $roleName = $request->get('value');

        if (!AccesszRoles::where('value', $roleName)->first()) {
            try {
                AccesszRoles::create(['value' => $roleName]);

                $this->logger->info('[Role create] Role created successfully.');
                return response()->json([
                    'message' => 'Role created successfully',
                ], 201);
            } catch (\Exception $e) {
                $this->logger->error('[Role create] ' . $e->getMessage());
                return response()->json([
                    'error' => 'Error when create role',
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
            $newRoleName = $request->get('value');
            $role = AccesszRoles::where(['id' => $id])->update(['value' => $newRoleName]);

            $this->logger->info('[Role update] Role updated successfully.');
            return response()->json($role, 200);
        } catch (\Exception $e) {
            $this->logger->error('[Role update] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when role update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            AccesszRoles::find($id)->delete();

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
